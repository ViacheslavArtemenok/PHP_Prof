<?php
include_once "Template.php";
class Singlegood extends Template
{
    public function __construct($title, $price, $grand, $count)
    {
        parent::__construct($title, $price, $grand, $count);
    }

    public function finalPrice()
    {
        return "Стоимость товара \"{$this->title}\" в количестве {$this->count} шт. составляет {$this->price} рублей";
    }
}
