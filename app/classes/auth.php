<?php

namespace app\classes;
use app\models\User;

use app\classes\session;

class auth
{
    public static function check()
    {
        return session::has("user_id");
    }

    public static function user()
    {
        if(self::check()){
            $user = User::where("id", session::get("user_id"))->first();
            return $user;
        }
    }
}