<?php

class Crown
{
    public function __construct()
    {
        echo "We have " . __CLASS__ . " car<br>";
    }

    public function driveRange()
    {
        echo "You can drive " . __CLASS__ . " car 3000 miles per hour!";
    }
}

class Wish
{
    public function __construct()
    {
        echo "We have " . __CLASS__ . " car<br>";
    }
    
    public function driveRange()
    {
        echo "You can drive " . __CLASS__ . " car 1000 miles per hour!";
    }
}

class carFactory
{
    public static function make($type = "")
    {
        if(empty($type)){
            throw new Exception("Must supply car type!");
        }else{
            $className = ucfirst($type);
            if(class_exists($className)){
                return new $className();
            }else{
                throw new Exception("We can't build {$type} car!");
            }
        }
    }
}

try{
    $car = carFactory::make("Wish");
    $car->driveRange("Crown");
}catch(Exception $e){
    echo $e->getMessage();
}