<?php

abstract class AutoGearFactory
{

}

class CrownAuto extends AutoGearFactory
{
    public function getName()
    {
        echo __CLASS__ . " Gear Car<br>";
    }
}

class WishAuto extends AutoGearFactory
{
    public function getName()
    {
        echo __CLASS__ . " Gear Car";
    }
}

abstract class ManualGearFactory
{

}

class ToyotaManual extends ManualGearFactory
{
    public function getName()
    {
        echo __CLASS__ . " Gear Car<br>";
    }
}

class SuzukiManual extends ManualGearFactory
{
    public function getName()
    {
        echo __CLASS__ . " Gear Car";
    }
}

abstract class CarFactory
{
    abstract function createCar1();
    abstract function createCar2();
}

class AutoCarMaker extends CarFactory
{
    public function createCar1()
    {
        return new CrownAuto();
    }

    public function createCar2()
    {
        return new WishAuto();
    }
}

class ManualCarMaker extends CarFactory
{
    public function createCar1()
    {
        return new ToyotaManual();
    }

    public function createCar2()
    {
        return new SuzukiManual();
    }
}

$carAuto = new AutoCarMaker();
$CrownAuto = $carAuto->createCar1();
$WishAuto = $carAuto->createCar2();

$CrownAuto->getName();
$WishAuto->getName();
echo "<hr>";
$carManual = new ManualCarMaker();
$ToyotaManual = $carManual->createCar1();
$SuzukiManual = $carManual->createCar2();

$ToyotaManual->getName();
$SuzukiManual->getName();

?>