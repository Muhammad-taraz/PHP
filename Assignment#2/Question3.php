<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question 3 - Fourth Power of 5</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Fourth Power of 5</h1>
        <?php
        $base = 5;
        $power = 4;
        $result = pow($base, $power);
        ?>
        <p>5 raised to the power of 4 is <?php echo $result; ?></p>
        <a href="index.php" class="btn btn-primary">Back to Index</a>
    </div>
</body>
</html>
