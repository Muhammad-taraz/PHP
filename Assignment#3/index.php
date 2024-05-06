<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-3">
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
                    $cities = ['Karachi', 'Lahore', 'Islamabad', 'Attock', 'Faisalabad', 'Multan', 'Mandi Bahuddin', 'Narowal', 'Sialkot', 'Abbottabad', 'Gujrat', 'Nowshera']; 
                    foreach ($cities as $city) {
                        echo "<option value='$city'>$city</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="citiesVisited">Cities Visited:</label> <br>
                <input type="checkbox" name="citiesVisited" >Karachi <br>
                <input type="checkbox" name="citiesVisited" >Lahore <br>
                <input type="checkbox" name="citiesVisited" >Islamabad <br>
                <input type="checkbox" name="citiesVisited" >Attock <br>
                <input type="checkbox" name="citiesVisited" >Faisalabad <br>
                <input type="checkbox" name="citiesVisited" >Multan <br>
                <input type="checkbox" name="citiesVisited" >Mandi Bahuddin <br>
                <input type="checkbox" name="citiesVisited" >Narowal <br>
                <input type="checkbox" name="citiesVisited" >Sialkot <br>
                <input type="checkbox" name="citiesVisited" >Abbottabad	 <br>
                <input type="checkbox" name="citiesVisited" >Gujrat <br>
                <input type="checkbox" name="citiesVisited" >Nowshera <br>


                <?php
                 if(isset($_POST['citiesVisited'])){
                $cites =$_POST['citiesVisited'];

                    echo $cites;
                 }
                    ?>
            </div>
            <button type="submit" class="btn btn-outline-primary mb-3">Signup</button>
        </form>
    </div>
</body>
</html>
