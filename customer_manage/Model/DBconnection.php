<?php
/**
 * Created by PhpStorm.
 * User: hoatruong
 * Date: 12/02/2019
 * Time: 22:57
 */

namespace Model;

use PDO;

class DBconnection
{
    public $dsn;
    public $user;
    public $password;

    public function __construct($dsn, $user, $password)
    {
        $this->dsn = $dsn;
        $this->password = $password;
        $this->user = $user;
    }

    public function connect()
    {
        return new PDO($this->dsn, $this->user, $this->password);
    }

}