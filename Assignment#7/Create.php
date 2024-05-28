<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Student</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container mt-3">
        <h2>Add New Student</h2>
        <form action="Create.php" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="grade">Grade:</label>
                <input type="text" class="form-control" id="grade" name="grade" required>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col text-start">
                        <button type="submit" class="btn btn-success">Add Student</button>
                    </div>
                    <div class="col text-end">
                        <div class="child mt-3">
                            <a href="Read.php" class="btn btn-primary">View Students</a>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</body>

</html>

<?php
require 'Db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $grade = $_POST['grade'];

    $sql = "INSERT INTO students (name, gender, grade) VALUES ('$name', '$gender', '$grade')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>