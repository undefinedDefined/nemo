<?php

use App\class\User;

require('../vendor/autoload.php');
include_once('../src/func.php');


$required = ['email', 'password'];

$err = false;
foreach($required as $field){
    if(!isset($_POST[$field]) || empty($_POST[$field])){
        $err = true;
    }
}

if($err) exit;

$email = cleanInput($_POST['email']);
$password = cleanInput($_POST['password']);

// var_dump($email, $password);
// exit;

$user = User::checkLoginPassword($email, $password);

if($user){
    session_start();
    $_SESSION['auth'] = true;
    $_SESSION['lastname'] = $user['lastname'];
    $_SESSION['firstname'] = $user['firstname'];
    $_SESSION['birthdate'] = $user['birthdate'];
    $_SESSION['tel'] = $user['tel'];
    $_SESSION['role'] = (int) $user['role'];
    $_SESSION['avatar'] = $user['avatar'] ?? "https://ui-avatars.com/api/?name=".$user['firstname']."+".$user['lastname'];

    header('location: index.php');
}else{
    header('location: login.php?connectionFailed=true');
}


    

