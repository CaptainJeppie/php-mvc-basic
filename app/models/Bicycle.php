<?php

class Bicycle
{
    public $id;
    public $name;
    public $category;
    public $description;
    public $picture;
    public $priceperday;
    public $deposit;
    public $isAvailable;

    public function __construct($name, $category, $description, $picture, $priceperday, $deposit, $isAvailable)
    {
        $this->name = $name;
        $this->category = $category;
        $this->description = $description;
        $this->picture = $picture;
        $this->priceperday = $priceperday;
        $this->deposit = $deposit;
        $this->isAvailable = $isAvailable;
    }
}
