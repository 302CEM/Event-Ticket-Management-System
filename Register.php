<?php

//  This script is used for user Signing up page.

require_once('../Classes/dbClass.php');
require_once('functions.php');

$db = new DB;

class Registerations {

    public $firstName;
    public $lastName;
    public $email;
    public $password;
    public $country;
    public $city;
    public $status;

    function __construct() {		
        
        $this->email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL) ?? '';
        
        
        $this->password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING) ?? '';
        
        $this->firstName = $_POST['firstName'] ?? '';
        $this->firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);

        $this->lastName = $_POST['lastName'] ?? '';
        $this->lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);

        $this->country = $_POST['country'] ?? '';
        $this->country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_STRING);
        
        $this->city = $_POST['city'] ?? '';
        $this->city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
        
        

            }	

    
}

$new_register = new Registerations;

if(isset($_POST['submit'])){
    if(!email_exists($new_register->email)){
        $hash = password_hash($new_register->password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (firstName, lastName, email, password, country, city)
VALUES ('$new_register->firstName', '$new_register->lastName', '$new_register->email', '$hash', '$new_register->country', '$new_register->city')";
$stmt = $db->pdo->prepare($sql);
$stmt->execute();
if($stmt){
redirect_to('../Public/loginform.php');
    }else{
        echo 'error';
    }
}
}
 
