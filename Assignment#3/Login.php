<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["Login"])) {

    $email = $_POST["email"];
    $password = md5($_POST["password"]);

    $users = json_decode(file_get_contents("Users.json"), true);

    if (array_key_exists($email, $users)) {
        
        if ($users[$email]["password"] == $password) {
            
            $_SESSION["email"] = $email;
            $_SESSION["last_Login"] = time();
            
            $users[$email]["last_Login"] = $_SESSION["last_Login"];
            file_put_contents("Users.json", json_encode($users));
            
            header("Location: Welcome.php");
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
    <div class="container mt-5">
        <h2>Login</h2>
        <form action="Login.php" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary" name="Login">Login</button>
            <?php if(isset($error)) echo "<div class='text-danger'>$error</div>"; ?>
        </form>
        <div class= "child mt-3">
        <p>Don't have an account?    <a href="index.html">Signup</a></p>
        </div>
    </div>
</body>
</html>
