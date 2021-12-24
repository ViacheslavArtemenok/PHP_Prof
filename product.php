<?php


class Product
{
    protected $title;
    protected $image;
    protected $price;

    function __construct($title, $image, $price)
    {
        $this->title = $title;
        $this->image = $image;
        $this->price = $price;
    }
    function getHead()
    {
        return "<img src=\"$this->image\" width=\"150\" height=\"150\" alt=\"img\">
        <p>$this->title</p>
        <p>$this->price руб.</p>";
    }
}
