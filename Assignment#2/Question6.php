<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question 6 Solution</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5 mb-3">Question 6 Solution</h1>
        <?php

        $radius = 24;

        $area = pi() * pow($radius, 2);

        $circumference = 2 * pi() * $radius;

        echo "<p>Radius of the circle: $radius</p>";
        echo "<p>Area of the circle: $area</p>";
        echo "<p>Circumference of the circle: $circumference</p>";
        ?>
        <a href="index.php" class="btn btn-primary mt-3">Back to Index</a>
    </div>
</body>
</html>
