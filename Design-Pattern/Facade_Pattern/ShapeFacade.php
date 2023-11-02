<?php

class ShapeFacade
{
    private $circle;
    private $square;
    private $rectangle;

    public function __construct()
    {
        $this->circle = new Circle;
        $this->square = new Square;
        $this->rectangle = new Rectangle;
    }

    public function drawCircle()
    {
        $this->circle->draw();
    }

    public function drawSquare()
    {
        $this->square->draw();
    }

    public function drawRectangle()
    {
        $this->rectangle->draw();
    }
}