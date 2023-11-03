<?php

class Helper1
{
    public function __construct()
    {
        echo "I am " . __CLASS__ . " and start working<br>";
    }

    public function doJob($job)
    {
        echo "I am {$job}";
    }
}