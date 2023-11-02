<?php

require_once "Shape.php";
require_once "Circle.php";
require_once "Rectangle.php";
require_once "Square.php";
require_once "ShapeFacade.php";

class User1
{
    public function __construct()
    {
        // $circle = new Circle;
        // $rectangle = new Rectangle;
        // $square = new Square;

        // $square->draw();

        $obj = new ShapeFacade;

        $obj->drawRectangle();
    }
}

new User1;