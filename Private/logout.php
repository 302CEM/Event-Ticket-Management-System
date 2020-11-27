<?php

// Logging out script that hendels both loogin outs
// from user and admin.

session_start();


if(isset($_SESSION['adminId'])) {

unset($_SESSION['adminId']);
session_destroy();

header("Location: ../Admin/admin.php");
exit;

}elseif(isset($_SESSION['userId'])){
    unset($_SESSION['userId']);
    session_destroy();
    
    header("Location: ../Public/loginform.php");
    exit;
}else{
    echo "ERROR 404";
}
?>