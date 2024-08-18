<?php
define("IMAGE_DIR_GLOBAL", "uploads/cover-images/");
define("IMAGE_DIR_LOCAL", __DIR__ . "/../../uploads/cover-images/");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') 
    die("\nERROR: request method not allowed");

/*
print_r($_POST);
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

if (isset($_POST["image_url"])) {
    // Fetch headers to determine MIME type
    $headers = get_headers($_POST["image_url"], 1);
    $mime_type = $headers['Content-Type'] ?? 'unknown';

    // Map MIME type to file extension
    $file_extension = $mime_to_extension[$mime_type] ?? 'unknown';

    // Handle cases where the MIME type is unknown
    if ($file_extension === 'unknown') {
        die("\nERROR: Unsupported MIME type: $mime_type");
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

    echo IMAGE_DIR_GLOBAL . $target_filename;

} else {
    die("\nERROR: Empty image_url parameter.");
}