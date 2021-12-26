<?php
include_once "trait.php";
class DB
{
    static $obj;
    static $connect;

    private function __construct()
    {
        self::$connect = '0';
    }

    use forSingletone;

    function select()
    {
        echo "Select";
    }
    function update()
    {
        echo "Update";
    }
    function insert()
    {
        echo "Insert";
    }
    function delete()
    {
        echo "Delete";
    }
}
