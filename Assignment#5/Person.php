<?php
class Person
{
    public $name;
    public $gender;
    public $nationality;
    public $weight;
    public $height;
    public $date_of_birth;

    public function __construct($name, $gender, $nationality, $weight, $height, $date_of_birth)
    {
        $this->name = $name;
        $this->gender = $gender;
        $this->nationality = $nationality;
        $this->weight = $weight;
        $this->height = $height;
        $this->date_of_birth = $date_of_birth;
    }

    // Display Person details
    public function displayDetails()
    {
        echo "<div class='row'>";
        echo "<div class='col-md-6'>";
        echo "<b>Name:</b> " . $this->name . "<br>";
        echo "<b>Gender:</b> " . $this->gender . "<br>";
        echo "<b>Nationality:</b> " . $this->nationality . "<br>";
        echo "<b>Weight:</b> " . $this->weight . "<br>";
        echo "<b>Height:</b> " . $this->height . "<br>";
        echo "<b>Date of Birth:</b> " . $this->date_of_birth . "<br>";
        echo "</p>";
        echo "</div>";
        echo "</div>";
        echo "<br>";
    }
}

$person = new Person("Muhammad Abdullah", "Male", "Pakistani", 54, 92, "2004-03-05");
$person->displayDetails();
