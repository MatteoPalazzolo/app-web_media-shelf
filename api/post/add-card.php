<?php
define("IMAGE_DIR_GLOBAL", "uploads/cover-images/");
define("IMAGE_DIR_LOCAL", __DIR__ . "/../../uploads/cover-images/");

if ($_SERVER['REQUEST_METHOD'] !== 'POST')
    die("\nERROR: request method not allowed");

/*
print_r($_POST);
echo "<br>";
print_r($_FILES);
echo "<br>";
*/

require_once __DIR__ . "/../../utils/utils.php";

$mime_to_extension = [
    'image/jpeg' => 'jpg',
    'image/png' => 'png',
    // 'image/gif' => 'gif',
    'image/webp' => 'webp',
    'image/bmp' => 'bmp'
];

$target_filename = generateRandomString(16);

// IMAGE DOWNLOAD // ChatGPT
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $target_filename .= "." . strtolower(end(explode('.', $_FILES["image"]["name"])));

    // Check if file is an image
    $check = getimagesize($_FILES["image"]["tmp_name"]);

    if($check !== false) {
        // Attempt to move the uploaded file to the target directory // GPT
        if (move_uploaded_file($_FILES["image"]["tmp_name"], IMAGE_DIR_LOCAL . $target_filename)) {
            // echo "The file " . htmlspecialchars( basename( $_FILES["image"]["name"])) . " has been uploaded." . "<br>";
        } else {
            die("\nERROR: Sorry, there was an error uploading your file.");
        }
    } else {
        die("\nERROR: File is not an image.");
    }

    $target_filename = IMAGE_DIR_GLOBAL . $target_filename;
} 
// ChatGPT
elseif (isset($_POST["image_url"])) {
    /*
    // Fetch headers to determine MIME type
    $headers = get_headers($_POST["image_url"], 1);
    $mime_type = $headers['Content-Type'] ?? 'unknown';

    // Map MIME type to file extension
    $file_extension = $mime_to_extension[$mime_type] ?? 'unknown';

    // Handle cases where the MIME type is unknown
    if ($file_extension === 'unknown') {
        die("\nERROR: Unsupported MIME type: $mime_type" . "<br>");
    }

    // Determine the save path
    $target_filename .= ".$file_extension";

    // Fetch the image data
    $image_data = file_get_contents($_POST["image_url"]);

    if ($image_data !== false) {
        // Save the image data to a file
        if (file_put_contents(IMAGE_DIR_LOCAL . $target_filename, $image_data)) {
            // echo "Image downloaded successfully as $target_file.";
        } else {
            die("\nERROR: Failed to save the image.");
        }
    } else {
        die("\nERROR: Failed to download the image.");
    }
    */

    $target_filename = $_POST["image_url"];
}
else {
    die("\nERROR: No uploaded image found.");
}

// PERFORM CHECKS ON DATA
// check year
if (!preg_match('/^\d{1,4}$/', $_POST["year"])) {
    die("\nERROR: The year is not in a valid format.");
}
// check color_two and color_three
if (!preg_match('/^#[0-9A-Fa-f]{6}$/', $_POST["color_two"]) || !preg_match('/^#[0-9A-Fa-f]{6}$/', $_POST["color_three"])) {
    die("\nERROR: The colors are not in a valid format.");
}

// ADD DATA TO DB
require __DIR__ . "/../db/init-db-connection.php";

try {
    $sql = "INSERT INTO media (m_title, m_year, m_rating, m_type, m_img_data, m_color_two, m_color_three) 
            VALUES (:m_title, :m_year, :m_rating, :m_type, :m_img_data, :m_color_two, :m_color_three)";
    $stmt = $pdo->prepare($sql);

    // Insert Citizen Kane
    $stmt->execute([
        'm_title' => htmlspecialchars($_POST["title"]),
        'm_year' => $_POST["year"],
        'm_rating' => 5,                    //TODO: add to form
        'm_type' => 'Movie',                //TODO: add to form
        'm_img_data' => file_get_contents(__DIR__ . "/../../$target_filename"),
        'm_color_two' => $_POST["color_two"],
        'm_color_three' => $_POST["color_three"]
    ]);
} catch (PDOException $e) {
    die("\nERROR: media table insert failed: " . $e->getMessage());
}