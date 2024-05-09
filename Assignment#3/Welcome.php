<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST['fullName'];
    $Gender = $_POST['gender'];
  //  $dob = $_POST['dob'];


    // $today = new DateTime();
    // $birthdate = new DateTime($dob);
    // $age = $birthdate->diff($today)->y;


    // $vote_eligibility = ($age >= 18) ? "You are eligible to vote." : "You are not eligible to vote.";


    // $birth_year = date('Y', strtotime($dob));
    // $decade_message = "";
    // if ($birth_year > 2020) {
    //     $decade_message = "Welcome to the world, little one!";
    // } elseif ($birth_year >= 2010 && $birth_year <= 2019) {
    //     $decade_message = "Piyare bachon  homework karliya?";
    // } elseif ($birth_year >= 2000 && $birth_year <= 2009) {
    //     $decade_message = "College kaisa chal raha ha?";
    // }


    // $next_birthday = new DateTime(date('Y-m-d', strtotime($dob)));
    // $next_birthday->modify('+' . (date('Y') - $next_birthday->format('Y')) . ' years');
    // if ($today > $next_birthday) {
    //     $next_birthday->modify('+1 year');
    // }
    // $days_until_birthday = $today->diff($next_birthday)->days;


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Details</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>

    <body>
        <div class="container mt-4">
            <h1 class="text-center mb-4">User</h1>

            <div class="container mt-4">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card border-primary">
                            <div class="card-body">
                                <h5 class="card-title">Welcome</h5>
                                <?php

                                  if($Gender == "Female"){
                                    echo "Miss &nbsp" .$fullName;
                                  }
                                  elseif($Gender == "Male"){
                                    echo "Mr &nbsp" .$fullName;
                                  }
                                ?> 
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-3 ">
                        <div class="card  border-warning">
                            <div class="card-body">
                                <h5 class="card-title">About Age </h5>
                                <p class="card-text">You are <?php echo $age;
                                                                ?> years old.</p>
                                <p class="card-text">
                                    <?php echo $vote_eligibility;
                                    ?></p>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="col-md-3 ">
                        <div class="card border-info">
                            <div class="card-body">
                                <h5 class="card-title">As a fun! </h5>
                                <p class="card-text"><?php echo $decade_message; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card border-success">
                            <div class="card-body">
                                <h5 class="card-title">Next Birthday</h5>
                                <p class="card-text">There are <?php echo $days_until_birthday; ?> days until your next birthday.</p>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </body>

    </html>
<?php
}
?>