<?php
abstract class Vehicle {
    abstract public function displaySpeed();
}

class Car extends Vehicle {
    public function displaySpeed() {
        echo "Car speed: 120 km/h<br>";
    }
}

class Bike extends Vehicle {
    public function displaySpeed() {
        echo "Bike speed: 80 km/h<br>";
    }
}

$car = new Car();
$bike = new Bike();

$car->displaySpeed();
$bike->displaySpeed();
?>
