<?php

namespace app\classes;

class CSRFtoken
{
    public static function _token()
    {
        if(!session::has("token"))
        {
            echo session::add("token", base64_encode(openssl_random_pseudo_bytes(32)));
        }else{
            echo session::get("token");
        }
    }

    public static function checkToken($token)
    {
        return session::get("token") === $token;
    }
}