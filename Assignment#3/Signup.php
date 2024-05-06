<?php

if($_SERVER["REQUEST_METHOD"] =="POST"){
    $email=$_POST["email"];
    $password=md5($_POST["password"]);
    $fullName=$_POST["fullName"];
    $gender=$_POST["gender"];
    $dob=$_POST["dob"];
    $city=$_POST["city"];
    $citesVisited=$_POST["citiesVisited"];

    $users_data = json_decode(file_get_contents("welcome.php"), true);

    if (isset($users_data[$email])) {

        echo "You are already registered.";
    }
    else{
        $users_data[$email]=[
            "email"=>$email,
            "password"=>$password,
            "fullName"=>$fullName,
            "gender"=>$gender,
            "dob"=>$dob,
            "city"=>$city,
            "citiesVisited"=>$citesVisited,
            "last_login"=>null
        ];
          file_put_contents("text.php",json_encode($users_data));
       echo "Signup Successful!";
    }
}
?>