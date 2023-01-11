<?php

class Bicycle
{
    public $id;
    public $name;
    public $category;
    public $description;
    public $image;
    public $priceperday;
    public $deposit;
    public $isAvailable;

    public function __construct($id, $name, $category, $description, $image, $priceperday, $deposit, $isAvailable)
    {
        $this->id = $id;
        $this->name = $name;
        $this->category = $category;
        $this->description = $description;
        $this->image = $image;
        $this->priceperday = $priceperday;
        $this->deposit = $deposit;
        $this->isAvailable = $isAvailable;
    }
}
