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

if (isset($_POST["image_url"])) {

    $img_data = file_get_contents($_POST["image_url"]);

    if ($img_data === false) {
        die("\nERROR: Failed to download the image.");
    }

    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime_type = $finfo->buffer($img_data);

    if (!isset($mime_to_extension[$mime_type])) {
        die("\nERROR: Unsupported MIME type: $mime_type");
    }
    
    echo 'data:'. $mime_type . ';base64,' . base64_encode($img_data);

} else {
    die("\nERROR: Empty image_url parameter.");
}