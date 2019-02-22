<?php
/**
 * Created by PhpStorm.
 * User: hoatruong
 * Date: 12/02/2019
 * Time: 23:02
 */

namespace Model;

class Customer
{
    public $id;
    public $name;
    public $email;
    public $address;

    public function __construct($name, $email, $address)
    {
        $this->name = $name;
        $this->email = $email;
        $this->address = $address;
    }
}