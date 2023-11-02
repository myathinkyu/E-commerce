<?php

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
}