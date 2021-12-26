<?php
include_once "Template.php";

class Intelgood extends Template
{
    public function __construct($title, $price, $grand, $count)
    {
        parent::__construct($title, $price, $grand, $count);
        $this->price = $this->price / 2;
    }

    public function finalPrice()
    {
        return "Стоимость товара \"{$this->title}\" в количестве {$this->count} шт. составляет {$this->price} рублей";
    }
}
