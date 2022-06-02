<?php


function encryptPassword(string $password): string
{
    return hash('sha256', (hash('md5', $password) . hash('sha1', strtolower($password))));
}

function cleanInput(mixed $input){
    return htmlspecialchars(trim($input));
}