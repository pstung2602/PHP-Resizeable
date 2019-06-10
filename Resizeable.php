<?php
interface Resizeable
{
    public function resize($percent);
}
class Circle implements Resizeable
{
    public $radius;
    public $color;

    public function __construct($radius, $color)
    {
        $this->radius = $radius;
        $this->color = $color;
    }

    public function setRadius($radius)
    {
        $this->radius = $radius;
    }

    public function getRadius()
    {
        return $this->radius;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function calculateArea()
    {
        return pi() * $this->radius ** 2;
    }

    public function resize($percent)
    {
        $newRadius=$this->getRadius()*(1+$percent/100);
        $this->setRadius($newRadius);

    }
}

class Cylinder extends Circle
{
    public $height;
    public function __construct($radius, $color, $height)
    {
        parent::__construct($radius, $color);
        $this->height = $height;
    }
    public function setHeight($height)
    {
        $this->height = $height;
    }
    public function getHeight()
    {
        return $this->height;
    }
    public function calculateVolume()
    {
        return parent::calculateArea() * $this->height;
    }
    public function resize($percent)
    {
        $newRadius=$this->getRadius()*(1+$percent/100);
        $newHeight=$this->getHeight()*(1+$percent/100);
        $this->setRadius($newRadius);
        $this->setHeight($newHeight);
    }
}
$circle = new Circle(10, "red");
echo $circle->calculateArea() . "<br>";
$circle->resize(50);
echo $circle->calculateArea(). "<br>";
$cylinder = new Cylinder(15,"blue",10);
echo $cylinder->calculateVolume(). "<br>";
$cylinder->resize(100);
echo $cylinder->calculateVolume(). "<br>";
echo $cylinder->getRadius(). "<br>";
echo $cylinder->calculateArea();

