<?php
include_once "Template.php";

class Weightgood extends Template
{
    public function __construct($title, $price, $grand, $count)
    {
        parent::__construct($title, $price, $grand, $count);
    }

    public function finalPrice()
    {
        return "Стоимость товара \"{$this->title}\" весом {$this->count} кг составляет {$this->price} рублей";
    }
}
