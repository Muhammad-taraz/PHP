<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Welcome, <?php echo $user['fullname']; ?>!</h2>
        <p>Email: <?php echo $user['email']; ?></p>
        <p>Gender: <?php echo $user['gender']; ?></p>
        <p>Date of Birth: <?php echo $user['dob']; ?></p>
        <p>City: <?php echo $user['city']; ?></p>
        <p>Cities Visited: <?php echo implode(', ', $user['cities_visited']); ?></p>
        <p>Last Login: <?php echo $user['last_login']; ?></p>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</body>
</html>
