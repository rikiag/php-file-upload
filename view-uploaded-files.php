<!DOCTYPE html>
<html>

<head>
    <title>Uploaded Files</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap.min.css">
    <style>
        .container {
            max-width: 600px;
        }

        .btn-back {
            margin-top: 10px;
        }

        .title-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .title-container h3 {
            margin: 0;
        }

        .btn-buka {
            margin-right: 5px;
        }

        .btn-hapus {
            margin-left: 5px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="title-container">
            <h3 class="mt-2">Uploaded Files</h3>
            <a href="index.html" class="btn btn-secondary btn-back">Back</a>
        </div>
        <?php
        $targetDir = "uploads/";
        $files = glob($targetDir . "*");

        if (count($files) > 0) {
            echo '<ul class="list-group">';
            foreach ($files as $file) {
                echo '<li class="list-group-item">';
                echo basename($file);
                echo '<div>';
                echo '<a href="';
                echo $file;
                echo '" class="btn btn-primary btn-sm btn-buka">Open</a>';
                echo '<a href="delete_file.php?file=';
                echo urlencode($file);
                echo '" class="btn btn-danger btn-sm btn-hapus">Delete</a>';
                echo '</div>';
                echo '</li>';
            }
            echo '</ul>';
        } else {
            echo '<p>No files uploaded.</p>';
        }
        ?>
    </div>
</body>

</html>
