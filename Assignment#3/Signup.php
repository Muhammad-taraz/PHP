<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = md5($_POST["password"]);
    $fullname = $_POST["fullname"];
    $gender = $_POST["gender"];
    $dob = $_POST["dob"];
    $city = $_POST["city"];
    $cities_visited = $_POST["cities_visited"];
   
    $users = json_decode(file_get_contents("Users.json"), true);

    if (array_key_exists($email, $users)) {
        echo "You are already registered.";
    } else {
        $users[$email] = [
            "password" => $password,
            "fullname" => $fullname,
            "gender" => $gender,
            "dob" => $dob,
            "city" => $city,
            "cities_visited" => $cities_visited
        ];
        file_put_contents("Users.json", json_encode($users));
        echo "Signup successful!";
    }
}
?>
