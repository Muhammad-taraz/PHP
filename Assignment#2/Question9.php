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
        
        $decimals = ["24892", "34299", "98492489"];

        foreach ($decimals as $decimal) {
            $hexadecimal = dechex($decimal);
            echo "<p>Decimal: $decimal, Hexadecimal: $hexadecimal</p>";
        }
        ?>
        <a href="index.php" class="btn btn-primary mt-3">Back to Index</a>
    </div>
</body>
</html>
