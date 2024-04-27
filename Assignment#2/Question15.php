<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question 15: Display HTML Tags</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Question 15: Display HTML Tags</h1>

    <?php
    echo htmlspecialchars("<h1>Hello, here is how I display html tags in browser</h1>");echo "<br>";
    echo htmlspecialchars("<table>");echo "<br>";
    echo htmlspecialchars("<tr>");echo "<br>";
    echo htmlspecialchars("<th>english</th>");echo "<br>";
    echo htmlspecialchars("</tr>");echo "<br>";
    echo htmlspecialchars("</table>");echo"<br>";
    ?>
    <a href="index.php">Back to Index</a></p>
    </div>
</body>
</html>
