<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $file = $_FILES['file'];

    // Lokasi penyimpanan file
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($file['name']);

    // Memindahkan file ke lokasi yang ditentukan
    if (move_uploaded_file($file['tmp_name'], $targetFile)) {
        echo "File uploaded successfully!";
    } else {
        echo "An error occurred while uploading the file.";
    }
} else {
    echo "An error occurred while uploading the file.";
}
