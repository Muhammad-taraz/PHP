<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Signup Form</h2>
        <form action="signup.php" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="fullName">Full Name:</label>
                <input type="text" class="form-control" id="fullName" name="fullName" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label><br>
                <input type="radio" id="male" name="gender" value="male" required>
                <label for="male">Male</label>
                <input type="radio" id="female" name="gender" value="female" required>
                <label for="female">Female</label>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" class="form-control" id="dob" name="dob" required>
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <select class="form-control" id="city" name="city" required>
                    <option value="">Select City</option>
                    
                    <?php
                    $cities = ['Karachi', 'Lahore', 'Islamabad', 'Rawalpindi', 'Faisalabad', 'Multan', 'Sukkur']; 
                    foreach ($cities as $city) {
                        echo "<option value='$city'>$city</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="citiesVisited">Cities Visited:</label> <br>
                <input type="checkbox" name="cities_visited" >Karachi <br>
                <input type="checkbox" name="cities_visited" >Lahore <br>
                <input type="checkbox" name="cities_visited" >Islamabad <br>
                <input type="checkbox" name="cities_visited" >Rawalpindi <br>
                <input type="checkbox" name="cities_visited" >Faisalabad <br>
                <input type="checkbox" name="cities_visited" >Multan <br>
                <input type="checkbox" name="cities_visited" >Sukkur <br>


                <?php
                 if(isset($_POST['cities_visited'])){
                $cites =$_POST['cities_visited'];

                    echo $cites;
                 }
                    ?>

                 <!-- <select class="form-control" id="citiesVisited" name="citiesVisited[]" multiple required>                
                    <?php
                    foreach ($cities as $city) {
                        echo "<option value='$city'>$city</option>";
                    }
                    ?> -->
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Signup</button>
        </form>
    </div>
</body>
</html>
