<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question 4 - Date and Time Formatting</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Date and Time Formatting</h1>
        <?php
        // Set timezone to Asia/Karachi
        date_default_timezone_set('Asia/Karachi');

        // Define the given date and time
        $datetime = strtotime('2024-04-23 11:23pm');

        // Display in different formats
        echo "<p>Format: Y-m-d h : ia<br>Result: " . date('Y-m-d h:ia', $datetime) . "</p>";
        echo "<p>Format: d M y H : i : s O<br>Result: " . date('d M y H:i:s O', $datetime) . "</p>";
        echo "<p>Format: F d, Y<br>Result: " . date('F d, Y', $datetime) . "</p>";
        echo "<p>Format: l dS \\of F Y h : i : s A<br>Result: " . date('l dS \of F Y h:i:s A', $datetime) . "</p>";
        ?>
        <a href="index.php" class="btn btn-primary">Back to Index</a>
    </div>
</body>
</html>
