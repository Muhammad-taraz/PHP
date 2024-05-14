<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $gender = $_POST['gender'];
    $dob = new DateTime($_POST['dob']);
    $today = new DateTime();
    $age = $dob->diff($today)->y;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-10">
                <div class="card-deck">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Welcome</h5>
                            <p class="card-text">Welcome <?php echo ($gender == 'Male') ? 'Mr. ' . $full_name : 'Miss ' . $full_name; ?></p>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Your Age</h5>
                            <p class="card-text">You are <?php echo $age; ?> years old.</p>
                            <?php if ($age >= 18) : ?>
                                <p class="card-text">You are eligible to vote.</p>
                            <?php else : ?>
                                <p class="card-text">You are not eligible to vote yet.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Fun Message</h5>
                            <?php
                            $year = intval($dob->format('Y'));
                            $decade = floor(($year - 1) / 10) * 10;
                            switch ($decade) {
                                case 2020:
                                    echo "<p class='card-text'>Aww you are a cute baby!</p>";
                                    break;
                                case 2010:
                                    echo "<p class='card-text'>Piyare bacho homework kr liya?</p>";
                                    break;
                                case 2000:
                                    echo "<p class='card-text'>College kaisa chal rha hai?</p>";
                                    break;
                                default:
                                    echo "<p class='card-text'>Enjoy your journey!</p>";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Days Until Your Birthday</h5>
                            <?php
                            $nextBirthday = new DateTime(date('Y') . '-' . $dob->format('m-d'));
                            if ($nextBirthday < $today) {
                                $nextBirthday->modify('+1 year');
                            }
                            $daysUntilBirthday = $today->diff($nextBirthday)->days;
                            ?>
                            <p class="card-text">There are <?php echo $daysUntilBirthday; ?> days until your next birthday.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>