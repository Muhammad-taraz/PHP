<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<title>View Students</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container mt-3">
        <h2>Student Records</h2>
        <form action="Read.php" method="get" class="form-inline mt-3">
            <input type="text" class="form-control mb-2 mr-sm-2" name="search" placeholder="Search by name or grade">
            <button type="submit" class="btn btn-primary mb-2">Search</button>
        </form>
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Grade</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require 'Db.php';

                $sql = "SELECT * FROM students";
                if (isset($_GET['search'])) {
                    $search = $_GET['search'];
                    $sql .= " WHERE name LIKE '%$search%' OR grade LIKE '%$search%'";
                }
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['name']}</td>
                                <td>{$row['gender']}</td>
                                <td>{$row['grade']}</td>
                                <td>
                                    <a href='update.php?id={$row['id']}' class='btn btn-warning'>Edit</a>
                                    <a href='delete.php?id={$row['id']}' class='btn btn-danger'>Delete</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No records found</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
        <div class="container">
            <div class="row">
                <div class="col text-start">
                    <a href="index.php" class="btn btn-success mt-3">Go Back</a>
                </div>
                <div class="col text-end">
                    <div class="child mt-3">
                        <a href="Create.php" class="btn btn-primary">Create Students</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>