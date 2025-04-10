<?php

include 'db.php';
include 'clamav_scan.php';

$targetDir = "uploads/";

if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $filename = basename($_FILES["file"]["name"]);
    $targetFile = $targetDir . $filename;

    if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {

        if(scanFileWithClamAV($targetFile)) {
            $stmt = $pdo->prepare("INSERT INTO secure_files (filename, filepath) VALUES (?,?)");
            $stmt->execute([$filename, $targetFile]);
            echo "File uploaded and scanned successfully.";
        } else {
            unlink($targetFile); //delete infected file
            echo "File is infected and was deleted.";
        }

    } else {
        echo "Error uploading files.";
    }
} else {
    echo "File upload error: " . $_FILES['file']['error'];
}

?>