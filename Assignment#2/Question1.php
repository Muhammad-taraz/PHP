<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question 1 - Rectangle Area and Perimeter</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Question 1: Calculate Area and Perimeter of Rectangle</h1>
        <?php

        $length = 10;
        $width = 5;

        $area = $length * $width;
        $perimeter = 2 * ($length + $width);

        echo "<p>Length: $length</p>";
        echo "<p>Width: $width</p>";
        echo "<p>Area: $area</p>";
        echo "<p>Perimeter: $perimeter</p>";
        ?>
        <p><a href="index.php">Back to Index</a></p>
    </div>
</body>
</html>
