<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body>
    <div class="container mt-3">
                <h2>Login Form</h2>
                <form action="./Welcome.php" method="post">
                <div class="form-group">
                <label for="fullName">Full Name:</label>
                <input type="text" class="form-control" id="fullName" name="fullName" required>
            </div>
                    <div class="form-group">
                        <label>Gender:</label><br>
                        <input type="radio" class="form-check-input" id="Male" name="gender" value="Male" required>Male <br>
                        <input type="radio" class="form-check-input" id="Female" name="gender" value="Female" required>Female <br>
                    </div>
                    <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" class="form-control" id="dob" name="dob" required>
            </div>
            <button type="submit" class="btn btn-outline-primary mb-3">Login</button>
             </form>
    </div>

</body>

</html>