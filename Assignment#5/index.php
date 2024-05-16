<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP with Bootstrap</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Garamond, serif;
        }
    </style>


</head>

<body>
    <div class="container"><br>
        <h1>Assignment-1(i)</h1><br>
        <h2>Person Details</h2><br>
        <?php include 'Person.php'; ?>

        <h1>Assignment-1(ii)</h1><br>
        <h3>Book Details</h3><br>
        <?php include 'Book.php'; ?>

        <h1>Assignment-1(iii)</h1><br>
        <h4>Shape Details</h4><br>
        <?php include 'Shape.php'; ?>
    </div>

    <!-- Bootstrap JS (optional) -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
</body>

</html>