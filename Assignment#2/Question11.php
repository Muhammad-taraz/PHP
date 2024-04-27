<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question 11 Solution</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5 mb-3">Question 11 Solution</h1>
        <?php

        $degrees = [170, 90, 280, 30];

        foreach ($degrees as $degree) {
            $radian = deg2rad($degree);
            echo "<p>Degree: $degree, Radian: $radian</p>";
        }
        ?>
        <a href="index.php" class="btn btn-primary mt-3">Back to Index</a>
    </div>
</body>
</html>
