<?php
// This script has a USER class and Admin class which extending
// the first, both classes lies in their constructors one function
// for each, which is used in login process.
include('dbClass.php');
include('../Private/functions.php');
class User {
    public $db;
    public $email;
    public $firstName;
    public $lastName;
    public $country;
    public $city;
    public $password;
    public $user;
    
    function __construct() {
        
        $this->db = new DB; 
        
        
        
        $this->email =  $_POST['email'] ?? '';
        $this->email =  filter_var($this->email, FILTER_VALIDATE_EMAIL);
        $this->email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $this->password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING); // kalle
        
            }	

        }
$user = new User;

        
   
    
class Admin extends User {
    
            public function loginAdmin($email, $password) {
                $stmt = $this->db->pdo->prepare("SELECT id FROM admins WHERE email = ? AND password = ? ;");
                $stmt->execute(array($email, $password));
                $rowcount = $stmt->rowCount();
                $userLoggedIn = ($rowcount = 1);
                    if ($userLoggedIn) {
                     $adminId = $stmt->fetchColumn();
                    
                    if($adminId){
                        $_SESSION['adminId'] = $adminId;
                        $_SESSION['last_login'] = time();
                        return $adminId;
            }
        }
    }
}
?>