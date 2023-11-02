<?php

class EmailUser extends Notifier
{
    public function __construct()
    {
        $this->notification = new EmailNotify;
    }
}