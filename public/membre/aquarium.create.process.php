<?php

use App\class\Aquarium;

require('../../vendor/autoload.php');
include_once('../../src/func.php');

$required = ['num_bac', 'price', 'species', 'food_type', 'volume', 'water_type', 'ph', 'conduct'];

$err = false;
foreach ($required as $field) {
    if (!isset($_POST[$field]) || empty($_POST[$field])) {
        $err = true;
    }else{
        $fields[$field] = cleanInput($_POST[$field]);
    }
}

if ($err) exit;


if($_FILES['img']['error'] == 0){

    // fichier
    $imgName = uniqid();
    $imgType = strtolower(pathinfo(basename($_FILES['img']['name']), PATHINFO_EXTENSION));
    $imgRoot = "../assets/";
    $imgFile = $imgRoot . $imgName . '.' . $imgType;
    $uploadState = 1;

    $imgCheck = getimagesize($_FILES['img']['tmp_name']);
    if (!$imgCheck) $uploadState = 0;

    if ($_FILES['img']['size'] > 2000000) $uploadState = 0;

    $extensions = ['jpg', 'jpeg', 'svg', 'png'];
    if (!in_array($imgType, $extensions)) $uploadState = 0;

    if ($uploadState === 1) {
        try {
            move_uploaded_file($_FILES['img']['tmp_name'], $imgFile);
        } catch (Exception) {
            echo "Une erreur est survenue lors du téléchargement du fichier. Veuillez réessayer.";
            exit;
        }
    }

    $fields['img'] = $imgName . '.' . $imgType ?? '';
}


try {
    Aquarium::createAquarium($fields);

    echo "Création effectuée avec succès";
} catch (Exception $e) {
    echo $e->getMessage();
}