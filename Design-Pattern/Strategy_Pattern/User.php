<?php

use app\classes\request;

require_once "Notify.php";
require_once "EmailNotify.php";
require_once "PhoneNotify.php";
require_once "SMSNotify.php";
require_once "Notifier.php";
require_once "EmailUser.php";
require_once "PhoneUser.php";

class User
{
    public function __construct()
    {
        // $notifier = new Notifier;

        // $obj = null;
        // switch($type){
        //     case "Email" : $obj = new EmailNotify();break;
        //     case "Phone" : $obj = new PhoneNotify();break;
        //     case "SMS" : $obj = new SMSNotify();break;
        //     default:
        //         echo "Only notification with Email, Phone and SMS are accepted";
        // }

        // $notifier->changeNotiType($obj);
        // $notifier->sendNow();

        $obj = new PhoneUser;
        $obj->changeNotiType(new SMSNotify);
        $obj->sendNow();
        
    }
}

new User;