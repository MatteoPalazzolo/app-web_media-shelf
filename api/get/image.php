<?php

if ($_SERVER['REQUEST_METHOD'] !== 'GET')
    die("\nERROR: request method not allowed");
if (!isset($_GET['id']))                  
    die("\nERROR: id param not set");

require __DIR__ . '/../db/init-db-connection.php';

try {
    $sql = "SELECT m_img_data FROM media WHERE id=:id;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $_GET['id']]);
    $entries = $stmt->fetchAll();
    if (!isset($entries[0]) || !isset($entries[0]["m_img_data"])) {
        header("HTTP/1.1 404 Not Found");
        die();
    }
} catch (PDOException $e) {
    die("\nERROR: bad image request: " . $e->getMessage());
}

$img_data = $entries[0]["m_img_data"];
$finfo = new finfo(FILEINFO_MIME_TYPE);
$mime_type = $finfo->buffer($img_data);
header("Content-Type: $mime_type");
echo $img_data;

?>