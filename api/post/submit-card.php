<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST')
    die("\nERROR: request method not allowed");

$mime_to_extension = [
    // 'image/gif' => 'gif',
    'image/jpeg' => 'jpg',
    'image/png' => 'png',
    'image/webp' => 'webp',
    'image/bmp' => 'bmp'
];

$img_data = "";

if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {

    $img_data = file_get_contents($_FILES["image"]["tmp_name"]);
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime_type = $finfo->buffer($img_data);

    if (!isset($mime_to_extension[$mime_type])) {
        die("\nERROR: Unsupported MIME type: $mime_type");
    }

} 
elseif (isset($_POST["image_url"])) {

    $img_data = file_get_contents($_POST["image_url"]);
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime_type = $finfo->buffer($img_data);

    if (!isset($mime_to_extension[$mime_type])) {
        die("\nERROR: Unsupported MIME type: $mime_type");
    }
    
}
else {
    die("\nERROR: No uploaded image found.");
}

// DATA VALIDATION
// validate year
if (!preg_match('/^\d{1,4}$/', $_POST["year"])) {
    die("\nERROR: The year is not in a valid format.");
}
// validate color one, two and three
if (!preg_match('/^#[0-9A-Fa-f]{6}$/', $_POST["color_one"]) ||
    !preg_match('/^#[0-9A-Fa-f]{6}$/', $_POST["color_two"]) || 
    !preg_match('/^#[0-9A-Fa-f]{6}$/', $_POST["color_three"])) {
    die("\nERROR: The colors are not in a valid format.");
}

// ADD DATA TO DB
require __DIR__ . "/../db/init-db-connection.php";

try {
    $pdo->beginTransaction();

    $sql = "INSERT INTO media (m_title, m_year, m_rating, m_type, m_img_data, m_color_one, m_color_two, m_color_three, m_active) 
            VALUES (:m_title, :m_year, :m_rating, :m_type, :m_img_data, :m_color_one, :m_color_two, :m_color_three, :m_active);";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'm_title' => htmlspecialchars($_POST["title"]),
        'm_year' => $_POST["year"],
        'm_rating' => 5,                    //TODO: add to form
        'm_type' => 'Movie',                //TODO: add to form
        'm_img_data' => $img_data,
        'm_color_one' => $_POST["color_one"],
        'm_color_two' => $_POST["color_two"],
        'm_color_three' => $_POST["color_three"],
        'm_active' => 1
    ]);

    $sql = "UPDATE media SET m_active = 0 WHERE m_title != :m_title";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'm_title' => htmlspecialchars($_POST["title"])
    ]);

    $pdo->commit();

} catch (PDOException $e) {
    echo "\nERROR: media table insert failed: " . $e->getMessage();
    $pdo->rollBack();
    die();
}