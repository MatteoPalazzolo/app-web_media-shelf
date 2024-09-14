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

$file_url = "";

if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $file_url = $_FILES["image"]["tmp_name"];
} 
elseif (isset($_POST["image_url"]) && $_POST["image_url"] !== "") {
    $file_url = $_POST["image_url"];
}
else {
    die("\nERROR: No uploaded image found.");
}

// DOWNLOAD FILE
$img_data = file_get_contents($file_url);
$finfo = new finfo(FILEINFO_MIME_TYPE);
$mime_type = $finfo->buffer($img_data);

// CHECK MIME TYPE
if (!isset($mime_to_extension[$mime_type])) {
    die("\nERROR: Unsupported MIME type: $mime_type");
}

// DATA VALIDATION
// validate title
if ($_POST["title"] === "") {
    die("\nERROR: The title can't be empty.");
}
// validate year
if (!preg_match('/^\d{1,4}$/', $_POST["year"])) {
    die("\nERROR: The year is not in a valid format.");
}
// validate colors
if (!preg_match('/^#[0-9A-Fa-f]{6}$/', $_POST["color_one"]) ||
    !preg_match('/^#[0-9A-Fa-f]{6}$/', $_POST["color_two"]) || 
    !preg_match('/^#[0-9A-Fa-f]{6}$/', $_POST["color_three"])) {
    die("\nERROR: The colors are not in a valid format.");
}
// validate tags
if (isset($_POST["tags"])) {
    $_POST["tags"] = array_map('trim', $_POST["tags"]);
    foreach ($_POST["tags"] as $tag) {
        if ($tag === "") {
            die("\nERROR: empty tags are not allowed.");
        }
        if (strlen($tag) > 50) {
            die("\nERROR: one of the tags is too long.");
        }
    }
} else {
    $_POST["tags"] = [];
}
// validate type // TODO: to add in the form
if(!in_array($_GET['type'] ?? 'Movie', ['Movie', 'Videogame', 'Anime', 'Cartoon', 'TV Series', 'Book', 'Manga'])) {
    die("\nERROR: The media type is not valid.");
}

// ADD DATA TO DB
require __DIR__ . "/../db/init-db-connection.php";

try {
    $pdo->beginTransaction();
    
    //QUERY: add new tags to db
    // workaround to make it RETURN the id even if the tag already exists
    $sql = "INSERT INTO tags (t_name, t_description) 
            VALUES (:t_name, :t_description)
            ON CONFLICT (t_name) DO UPDATE SET t_name = EXCLUDED.t_name
            RETURNING id;";
    $stmt = $pdo->prepare($sql);

    $tagIdList = [];

    foreach ($_POST["tags"] as $tag) {
        $name = htmlspecialchars($tag);
        $description = "";

        $stmt->bindParam(':t_name',        $name        );
        $stmt->bindParam(':t_description', $description );

        $stmt->execute();

        $tagIdList[] = $stmt->fetchColumn();
    }

    //QUERY: check if title already in db
    $sql = "SELECT 1 from media WHERE m_title = :m_title";
    $stmt = $pdo->prepare($sql);

    $title = htmlspecialchars(trim($_POST["title"]));

    $stmt->bindParam(':m_title', $title);
    $stmt->execute();

    $repetition = $stmt->fetchColumn();
    if ($repetition === 1) {
        die("\nERROR: the current title is already registered.");
    }

    //QUERY: add new card to the db
    $sql = "INSERT INTO media (m_title, m_year, m_rating, m_type, m_img_data, m_color_one, m_color_two, m_color_three, m_active) 
            VALUES (:m_title, :m_year, :m_rating, :m_type, :m_img_data, :m_color_one, :m_color_two, :m_color_three, :m_active)
            RETURNING id;";
    $stmt = $pdo->prepare($sql);

    $year        = $_POST["year"];
    $rating      = $_POST["rating"];
    $type        = $_POST['type'] ?? 'Movie';   //TODO: add to form
    $color_one   = $_POST["color_one"];
    $color_two   = $_POST["color_two"];
    $color_three = $_POST["color_three"];
    $active      = true;
    
    $stmt->bindParam(':m_title',        $title                          );
    $stmt->bindParam(':m_year',         $year,          PDO::PARAM_INT  );
    $stmt->bindParam(':m_rating',       $rating,        PDO::PARAM_INT  );
    $stmt->bindParam(':m_type',         $type                           );
    $stmt->bindParam(':m_img_data',     $img_data,      PDO::PARAM_LOB  );
    $stmt->bindParam(':m_color_one',    $color_one                      );
    $stmt->bindParam(':m_color_two',    $color_two                      );
    $stmt->bindParam(':m_color_three',  $color_three                    );
    $stmt->bindParam(':m_active',       $active,        PDO::PARAM_BOOL );

    $stmt->execute();

    $mediaId = $stmt->fetchColumn();

    //QUERY: set only the new card as active
    $sql = "UPDATE media SET m_active=false WHERE m_title != :m_title";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':m_title', $title);
    $stmt->execute();

    //QUERY: link new card and new tags
    $sql = "INSERT INTO media_tags (id_media, id_tag) VALUES (:id_media, :id_tag);";
    $stmt = $pdo->prepare($sql);

    foreach ($tagIdList as $tagId) {
        $stmt->bindParam(':id_media',   $mediaId);
        $stmt->bindParam(':id_tag',     $tagId  );
        $stmt->execute();
    }

    $pdo->commit();

} catch (PDOException $e) {
    echo "\nERROR: media table insert failed: " . $e->getMessage();
    $pdo->rollBack();
    die();
}
