<?php

namespace app\classes;

class session 
{
    public static function add($key, $value)
    {
        if(!self::has($key))
        {
            $_SESSION[$key] = $value;
        }else{
            echo "session key exists";
        }
    }

    public static function has($key)
    {
        return isset($_SESSION[$key]) ? true : false;
    }

    public static function remove($key)
    {
        if(self::has($key))
        {
            unset($_SESSION[$key]);
        }
    }
}