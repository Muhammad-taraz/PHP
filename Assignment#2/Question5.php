<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question 5 Solution</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
    <h1>Question:</h1>
    <p>Set some value of x and display it. Then display the result of ++$x + $x++ - --$x. Again after that display the value of x.</p>
    <h2>Answer:</h2>

    <?php
    $x = 5;
    echo "<p>Initial value of x: " . $x . "</p>";

    $result = ++$x + $x++ - --$x;
    echo "<p>Result of ++$x + $x++ - --$x: " . $result . "</p>";

    echo "<p>Final value of x: " . $x . "</p>";
    ?>
    
    <ul>
        <li><a href="index.php">Back to Index</a></li>
    </ul>
        <a href="index.php" class="btn btn-primary">Back to Index</a>
    </div>
</body>
</html>
