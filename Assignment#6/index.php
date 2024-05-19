<?php
// index.php

require_once 'Zoo.php';

// Creating animal objects
$lion = new Animal("Simba", "Lion", "Carnivore");
$elephant = new Animal("Dumbo", "Elephant", "Herbivore");
$monkey = new Animal("King Kong", "Monkey", "Omnivore");

// Creating ZooEnclosure object
$enclosure = new ZooEnclosure();
$enclosure->addAnimal($lion);
$enclosure->addAnimal($elephant);
$enclosure->addAnimal($monkey);

// Creating ZooKeeper object
$zooKeeper = new ZooKeeper("John", $enclosure);
// HTML presentation
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo</title>
    <style>
        body {
            font-size: large;
            margin-top: 15px;
            padding: 12px;
        }
    </style>
</head>

<body>
    <b>Animals in the enclosure managed by ZooKeeper : <?php echo $zooKeeper->getName(); ?></b><br><br>
    <?php echo $zooKeeper->listAnimals(); ?>
</body>

</html>