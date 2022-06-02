<?php

use App\class\User;
use App\class\UserException;

require('../vendor/autoload.php');
include_once('../src/func.php');


$required = ['lastname', 'firstname', 'email', 'password', 'country', 'birthdate'];

$err = false;
foreach ($required as $field) {
    if (!isset($_POST[$field]) || empty($_POST[$field]))
        $err = true;
}

if ($err) exit;



$fields = ['lastname', 'firstname', 'email', 'password', 'country', 'birthdate', 'tel'];

foreach ($fields as $field) {
    $cleanFields[$field] = cleanInput($_POST[$field]) ?? '';
}

try {
    User::createNewUser($cleanFields);

    header('location: register.success.html');
} catch (UserException $e) {
    // catch exception code if error
    header('location: index.php?createError=' . $e->getCode());
}
