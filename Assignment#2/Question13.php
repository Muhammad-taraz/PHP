<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question 9 Solution</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5 mb-3">Question 9 Solution</h1>
        <?php
        
        $binaries = ["1000101010101011", "11101010110101", "101111110111"];

        foreach ($binaries as $binary) {
            $decimal = bindec($binary);
            $hexadecimal = dechex($decimal);
            echo "<p>Binary: $binary</p>";
            echo "<p>Decimal: $decimal</p>";
            echo "<p>Hexadecimal: $hexadecimal</p>";
            echo "<hr>";
        }
        ?>
        <a href="index.php" class="btn btn-primary mt-3">Back to Index</a>
    </div>
</body>
</html>
