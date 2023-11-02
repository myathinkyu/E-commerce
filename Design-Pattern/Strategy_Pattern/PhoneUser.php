<?php

class PhoneUser extends Notifier
{
    public function __construct()
    {
        $this->notification = new PhoneNotify;
    }
}