<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question 2 - Square Root of 99</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Square Root of 99</h1>
        <?php
        $number = 99;
        $squareRoot = sqrt($number);
        ?>
        <p>The square root of <?php echo $number; ?> is <?php echo $squareRoot; ?></p>
        <a href="index.php" class="btn btn-primary">Back to Index</a>
    </div>
</body>
</html>
