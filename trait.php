<?php
trait forSingletone
{
    public static function getObject($a)
    {
        if ($a == null) {
            $a = new self;
        }
        return $a;
    }
}
