<?php

abstract class Template
{
    function __construct($title, $price, $grand, $count)
    {
        $this->title = $title;
        $this->price = $price;
        $this->grand = $grand; //Наценка 
        $this->count = $count; //Количество товаров или кг
        $this->price = $this->price * (1 + $this->grand / 100) * $this->count; //Конечная цена
    }
    abstract function finalPrice();
}
