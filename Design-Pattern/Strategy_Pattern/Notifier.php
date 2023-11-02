<?php

abstract class Notifier
{
    protected $notification;

    public function sendNow()
    {
        $this->notification->send();
    }

    public function changeNotiType(Notify $notify)
    {
        $this->notification = $notify;
    }
}