<?php

namespace app\classes;

class redirect
{
    public static function to($page)
    {
        header("Location:$page");
    }

    public static function back($page)
    {
        $uri =$_SERVER["REQUEST_URI"];
        header("Location:$uri");
    }
}