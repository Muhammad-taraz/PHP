<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = md5($_POST["password"]);
    $fullName = $_POST["fullName"];
    $gender = $_POST["gender"];
    $dob = $_POST["dob"];
    $city = $_POST["city"];
    $citiesVisited = $_POST["citiesVisited"];

    // Read existing data from text.php
    $existing_data = file_get_contents("text.php");

    // Decode existing data if it contains JSON
    $users_data = json_decode($existing_data, true);

    // Check if decoding was successful
    if ($users_data === null) {
        // If decoding failed, initialize an empty array
        $users_data = [];
    }

    if (isset($users_data[$email])) {
        echo "You are already registered.";
    } else {
        // Add new user data to the array
        $users_data[$email] = [
            "email" => $email,
            "password" => $password,
            "fullName" => $fullName,
            "gender" => $gender,
            "dob" => $dob,
            "city" => $city,
            "citiesVisited" => $citiesVisited,
            "last_login" => null
        ];

        // Encode the updated data as JSON
        $json_data = json_encode($users_data);

        // Write the JSON data to text.php, appending it to existing content
        file_put_contents("text.php", $json_data . PHP_EOL, FILE_APPEND);

        echo "Signup Successful!";
    }
}
?>
