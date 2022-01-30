<?php

namespace App\Models;

class Customer
{
    private $firstName;
    private $lastName;
    private $phone;
    private $email;
    private $orderInfo;

    public function __construct($firstName, $lastName, $phone, $email, $orderInfo)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->phone = $phone;
        $this->email = $email;
        $this->orderInfo = $orderInfo;
    }


}
