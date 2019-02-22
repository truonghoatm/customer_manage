<?php
/**
 * Created by PhpStorm.
 * User: hoatruong
 * Date: 13/02/2019
 * Time: 08:45
 */

namespace Controller;

use Model\Customer;
use Model\CustomerDB;
use Model\DBconnection;

class CustomerController
{
    public $customerDB;

    public function __construct()
    {
        $connection = new DBconnection("mysql:host=localhost;dbname=customer_manage", "root", "CodeGym@123456");
        $this->customerDB = new CustomerDB($connection->connect());
    }
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include 'View/add.php';
        } else {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $customer = new Customer($name, $email, $address);
            $this->customerDB->create($customer);
            $message = 'Customer created';
            include 'View/add.php';
        }
    }
    public function index()
    {
        $customers = $this->customerDB->getAll();
        include "View/list.php";
    }
    public function delete(){
        if($_SERVER['REQUEST_METHOD']==='GET'){
            $id = $_GET['id'];
            $customer = $this->customerDB->get($id);
            include "View/delete.php";
        }else{
            $id = $_POST['id'];
            $this->customerDB->delete($id);
            header('Location: index.php');
        }

    }
    public function edit(){
        if($_SERVER['REQUEST_METHOD']==='GET'){
            $id = $_GET['id'];
            $cutomer = $this->customerDB->get($id);
            include "View/edit.php";
        }else{
            $id = $_POST['id'];
            $cutomer = new Customer($_POST['name'], $_POST['email'], $_POST['address']);
            $this->customerDB->update($id,$cutomer);
            header('Location: index.php');
        }
    }
}