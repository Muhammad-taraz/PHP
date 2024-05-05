<?php
session_start();

// Function to read JSON file into an array
function getUsers() {
    $json = file_get_contents('users.json');
    return json_decode($json, true);
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    // Get existing users data
    $users = getUsers();

    // Check if email exists
    if (isset($users[$email])) {
        // Check if password hash matches
        if ($password === $users[$email]['password']) {
            // Add user data to session
            $_SESSION['user'] = $users[$email];

            // Update last login timestamp
            $users[$email]['last_login'] = date('Y-m-d H:i:s');
            updateUserJson($users);

            // Redirect to welcome.php or any other page
            header('Location: welcome.php');
            exit;
        } else {
            $error = "Incorrect password";
        }
    } else {
        $error = "Email not found";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Login</h2>
        <?php if (isset($error)) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
        <?php } ?>
        <form method="post">
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
</html>
