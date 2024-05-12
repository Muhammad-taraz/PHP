<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    // Read form data
    $email = $_POST["email"];
    $password = md5($_POST["password"]);

    // Read existing users
    $users = json_decode(file_get_contents("users.json"), true);

    // Check if email exists
    if (array_key_exists($email, $users)) {
        // Check password
        if ($users[$email]["password"] == $password) {
            // Add user data to session
            $_SESSION["email"] = $email;
            $_SESSION["last_login"] = time();
            // Update last login timestamp in JSON
            $users[$email]["last_login"] = $_SESSION["last_login"];
            file_put_contents("users.json", json_encode($users));
            // Redirect to welcome page
            header("Location: welcome.php");
            exit();
        } else {
            $error = "Incorrect password.";
        }
    } else {
        $error = "Email not found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary" name="login">Login</button>
            <?php if(isset($error)) echo "<div class='text-danger'>$error</div>"; ?>
        </form>
    </div>
</body>
</html>
