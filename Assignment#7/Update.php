<?php
require 'db.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    echo "Invalid student ID.";
    exit;
}

$sql = "SELECT * FROM students WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "No student found with ID: $id";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $grade = $_POST['grade'];

    $sql = "UPDATE students SET name='$name', gender='$gender', grade='$grade' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: read.php");
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Student</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h2>Update Student</h2>
        <form action="update.php?id=<?php echo $id; ?>" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value="Male" <?php echo ($row['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                    <option value="Female" <?php echo ($row['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="grade">Grade:</label>
                <input type="text" class="form-control" id="grade" name="grade" value="<?php echo $row['grade']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Student</button>
        </form>
    </div>
</body>

</html>