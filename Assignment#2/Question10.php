<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question 10 Solution</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5 mb-3">Question 10 Solution</h1>
        <?php
        
        $hexadecimals = ["abc990", "f4d9ae", "90fc90"];

        foreach ($hexadecimals as $hexadecimal) {
            $decimal = hexdec($hexadecimal);
            echo "<p>Hexadecimal: $hexadecimal, Decimal: $decimal</p>";
        }
        ?>
        <a href="index.php" class="btn btn-primary mt-3">Back to Index</a>
    </div>
</body>
</html>
