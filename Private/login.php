<?php
// This page handels both user and admin login based on
// the page that refered to this script. 
include_once('../Classes/userClass.php');
include_once('../Private/functions.php');
// Storing the admin login page referer.
$adminref = '../Admin/admin.php';
$userref = '../Public/loginform.php';
$user = new User;
$admin = new Admin;
$userExists = '';
if(isset($_SERVER['HTTP_REFERER'])){
strtolower($_SERVER['HTTP_REFERER']);
}
$adminExists = $admin->loginAdmin($admin->email, $admin->password);
$userinfo = find_user_by_email($user->email);
       
        if($userinfo){
        if(password_verify($user->password, $userinfo['password'])){
       $userExists = login($user->email, $userinfo['password']);
        }
    }

    if($userref){
        if($userExists){
                redirect_to('../Public/index.php');
            
            }else{
                echo 'no user was found';        
}
}

if($adminref) {
    if($adminExists){
        
    redirect_to('../Private/index.php');
    }else{echo 'err';}
}

?>