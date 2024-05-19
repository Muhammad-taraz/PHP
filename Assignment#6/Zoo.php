<?php
// zoo.php

interface Enclosure
{
    public function addAnimal(Animal $animal);
    public function removeAnimal($name);
    public function getAnimals();
}

class Animal
{
    protected $name;
    protected $species;
    protected $diet;

    public function __construct($name, $species, $diet)
    {
        $this->name = $name;
        $this->species = $species;
        $this->diet = $diet;
    }

    public function getInfo()
    {
        return "Name: {$this->name}, Species: {$this->species}, Diet: {$this->diet}";
    }
}

class ZooEnclosure implements Enclosure
{
    private $animals = [];

    public function addAnimal(Animal $animal)
    {
        $this->animals[] = $animal;
    }

    public function removeAnimal($name)
    {
        foreach ($this->animals as $key => $animal) {
            if ($animal->name == $name) {
                unset($this->animals[$key]);
                break;
            }
        }
    }

    public function getAnimals()
    {
        return $this->animals;
    }
}

class ZooKeeper
{
    private $name;
    private $enclosure;

    public function __construct($name, Enclosure $enclosure)
    {
        $this->name = $name;
        $this->enclosure = $enclosure;
    }

    public function getName()
    {
        return $this->name;
    }

    public function listAnimals()
    {
        $animals = $this->enclosure->getAnimals();
        foreach ($animals as $animal) {
            echo $animal->getInfo() . "<br>";
        }
    }
}
