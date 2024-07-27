<?php
if (isset($_GET['file'])) {
    $file = $_GET['file'];

    if (file_exists($file)) {
        unlink($file);
        echo "File Deleted.";
    } else {
        echo "File not found.";
    }
} else {
    echo "Invalid parameter.";
}

// Redirect ke halaman view_uploaded_files.php
header("Location: view_uploaded_files.php");
exit();
