<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question 7 Solution</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5 mb-3">Question 7 Solution</h1>
        <?php

        $circumference = 1000; 

        $radius = $circumference / (2 * pi());

        $area = pi() * pow($radius, 2);

        echo "<p>Radius of the racetrack: $radius meters</p>";
        echo "<p>Area enclosed by the racetrack: $area square meters</p>";
        ?>
        <a href="index.php" class="btn btn-primary mt-3">Back to Index</a>
    </div>
</body>
</html>
