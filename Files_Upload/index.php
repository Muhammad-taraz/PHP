<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $targetDir = "Files/";
    $targetFile = $targetDir . basename($_FILES["file"]["name"]);

    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
    } else {
        if ($_FILES["file"]["size"] > 500000000) {
            echo "Sorry, your file is too large.";
        } else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
                echo "The file " . basename($_FILES["file"]["name"]) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Files Uploading</title>
</head>

<body>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="file" id="file">
        <button type="submit" name="submit">Submit</button>
    </form>
</body>

</html>