<?php

interface Car
{
    public function getName();
}

class Crown implements Car
{
    public function getName()
    {
        echo __CLASS__;
    }
}

class Wish implements Car
{
    public function getName()
    {
        echo __CLASS__;
    }
}

abstract class CarFactory
{
    abstract function make($type);
}

class carMaker extends CarFactory
{
    public function make($type)
    {
        if($type == "Crown") {
            return new Crown();
        }elseif ($type == "Wish") {
            return new Wish();
        }
    }
}

function outCar(Car $car)
{
    $car ->getName();
}

$car = new carMaker;
$crown = $car->make("Crown");
$wish = $car->make("Wish");

//$crown->getName();

outCar($crown);

