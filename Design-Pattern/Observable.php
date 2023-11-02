<?php

abstract class SubscriberObject
{
    abstract function update($newTutorial, $observer);
}

abstract class PublisherObject
{
    abstract function attach(SubscriberObject $observer);
    abstract function detach(SubscriberObject $observer);
    abstract function notify();
}

class TutorialPublisher extends PublisherObject
{
    private $newTutorial = "";
    private $observers = [];

    public function attach(SubscriberObject $observer)
    {
        array_push($this->observers, $observer);
    }

    public function detach(SubscriberObject $observer)
    {
        foreach($this->observers as $key => $obs){
            if($obs == $observer) {
                unset($this->observers[$key]);
            }
        }
    }

    public function notify()
    {
        foreach($this->observers as $observer){
            $observer->update($this->newTutorial, $observer);
        }
    }

    public function addTutorial($newTutos)
    {
        $this->newTutorial = $newTutos;
        $this->notify();
    }
}

class StudentSubscriber extends SubscriberObject
{
    public $name;
    public function update($newTutorial, $observer)
    {
        echo "{$newTutorial} is publish . {$observer->name}";
    }
}

$student1 = new StudentSubscriber;
$student2 = new StudentSubscriber;
$student2->name = "Aung Aung";
$student3 = new StudentSubscriber;

$tutorialChannel = new TutorialPublisher;
$tutorialChannel->attach($student1);
$tutorialChannel->attach($student2);

$tutorialChannel->addTutorial("Python Programming Tutorial 1");

echo "<hr>";

$tutorialChannel->detach($student1);
$tutorialChannel->addTutorial("Java new Tutorial");