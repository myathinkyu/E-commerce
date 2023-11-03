<?php

require_once "Helper1.php";

class Registry 
{
    private static $data = [];

    public static function setData($key, $val)
    {
        if(array_key_exists($key, self::$data)){
            echo "Already in use!";
        }else{
            self::$data[$key] = $val;
        }
    }

    public static function getData($key)
    {
        return isset(self::$data[$key]) ? self::$data[$key] : null;
    }

    public static function removeData($key)
    {
        if(array_key_exists($key, self::$data)){
            unset(self::$data[$key]);
        }else{
            echo "Value with that key " . $key . " not exist";
        }
    }
}

Registry::setData("2011", "Acer");
Registry::setData("2012", "Lenovo");
Registry::setData("2015", "Dell");

$helper = new Helper1;
Registry::setData("helper", $helper);

//echo Registry::getData("2015");

Registry::getData("helper")->doJob("Driving a car!");