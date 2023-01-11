<?php

class User
{
    public $id;
    public $name;
    public $phoneNumber;
    public $email;

    public function __construct($id, $name, $email, $phoneNumber)
    {
        $this->id = $id;
        $this->name = $name;
        $this->phoneNumber = $phoneNumber;
        $this->email = $email;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    public function getEmail()
    {
        return $this->email;
    }

}