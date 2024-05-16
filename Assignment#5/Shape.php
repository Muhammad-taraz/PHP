<?php
class Shape
{
    private $name;
    private $is_open_shape;
    private $number_of_angles;
    private $base;
    private $height;

    public function __construct($name, $is_open_shape, $number_of_angles, $base, $height)
    {
        $this->name = $name;
        $this->is_open_shape = $is_open_shape;
        $this->number_of_angles = $number_of_angles;
        $this->base = $base;
        $this->height = $height;
    }

    // Display Shape details
    public function displayDetails($identifier)
    {
        echo "<div class='row'>";
        echo "<div class='col-md-6'>";
        echo "<b>Shape $identifier:</b><br>";
        echo "<b>Name:</b> " . $this->name . "<br>";
        echo "<b>Is Open Shape:</b> " . ($this->is_open_shape ? "Yes" : "No") . "<br>";
        echo "<b>Number of Angles:</b> " . $this->number_of_angles . "<br>";
        echo "<b>Base:</b>" . $this->base . "<br>";
        echo "<b>Height:</b>" . $this->height . "<br>";
        echo "</p>";
        echo "</div>";
        echo "</div>";
        echo "<br>";
    }
}

$triangle = new Shape("Triangle", false, 3, 30, 30);
$triangle->displayDetails(1);

$circle = new Shape("Circle", false, 0, 0, 30);
$circle->displayDetails(2);

$square = new Shape("Square", false, 4, 20, 30);
$square->displayDetails(3);
