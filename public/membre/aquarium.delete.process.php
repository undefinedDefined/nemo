<?php

use App\class\Aquarium;

require('../../vendor/autoload.php');
include_once('../../src/func.php');


if (!isset($_POST['id']) || empty($_POST['id'])) {
    exit;
}

$id = cleanInput($_POST['id']);

try{
    Aquarium::deleteAquarium($id);
    echo "Suppression de l'aquarium $id effectuée avec succès !";
}catch(Exception $e){
    echo $e->getMessage();
}
