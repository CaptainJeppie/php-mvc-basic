<?php

class Rental
{
    public $orderId;
    public $bikeId;
    public $userEmail;
    public $startDate;
    public $endDate;
    public $price;

    /**
     * @param $bikeId
     * @param $userEmail
     * @param $startDate
     * @param $endDate
     * @param $price
     */
    public function __construct($bikeId, $userEmail, $startDate, $endDate, $price)
    {
        $this->bikeId = $bikeId;
        $this->userEmail = $userEmail;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @return mixed
     */
    public function getBikeId()
    {
        return $this->bikeId;
    }

    /**
     * @return mixed
     */
    public function getUserEmail()
    {
        return $this->userEmail;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }




}