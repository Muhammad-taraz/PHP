<?php
session_start();

// Function to read JSON file into an array
function getUsers() {
    $json = file_get_contents('users.json');
    return json_decode($json, true);
}

// Function to update JSON file with new data
function updateUserJson($users) {
    $json = json_encode($users, JSON_PRETTY_PRINT);
    file_put_contents('users.json', $json);
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $fullname = $_POST['fullname'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $city = $_POST['city'];
    $cities_visited = $_POST['cities_visited'];

    // Add user data to array
    $user = [
        'email' => $email,
        'password' => $password,
        'fullname' => $fullname,
        'gender' => $gender,
        'dob' => $dob,
        'city' => $city,
        'cities_visited' => $cities_visited,
        'last_login' => null // Initialize last login as null
    ];

    // Get existing users data
    $users = getUsers();

    // Check if email already exists
    if (isset($users[$email])) {
        echo "You are already registered.";
    } else {
        // Add new user data to array
        $users[$email] = $user;

        // Update JSON file with new data
        updateUserJson($users);

        echo "You are successfully registered. <a href='index.php'>Login here</a>";
    }
}
?>
