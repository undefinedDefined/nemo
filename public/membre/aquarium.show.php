<?php

use App\class\Aquarium;

require('../../vendor/autoload.php');

if (!isset($_POST['aqId']) || empty($_POST['aqId'])) {
    exit;
}

$id = (int) htmlspecialchars($_POST['aqId']);

$aquarium = Aquarium::getWithId($id);
// variables
$bac = $aquarium['num_bac'];
$creation = $aquarium['create_date'];
$prix = $aquarium['price'];
$espece = $aquarium['species'];
$food = $aquarium['food_type'];
$volume = $aquarium['volume'];
$type = $aquarium['water_type'];
$ph = $aquarium['ph'];
$conduct = $aquarium['conduct'];

?>

<form class="row g-3">
    <div class="col-md-2">
        <label class="form-label">ID</label>
        <input type="text" class="form-control" value="<?=$id?>" disabled readonly>
    </div>
    <div class="col-md-2">
        <label class="form-label">Bac</label>
        <input type="text" class="form-control" value="<?=$bac?>" disabled readonly>
    </div>
    <div class="col-md-6">
        <label class="form-label">Date création</label>
        <input type="text" class="form-control" value="<?=$creation?>" disabled readonly>
    </div>
    <div class="col-md-2">
        <label class="form-label">Prix</label>
        <input type="text" class="form-control" value="<?=$prix?>" disabled readonly>
    </div>
    <div class="col-md-6">
        <label class="form-label">Espèces</label>
        <input type="text" class="form-control" value="<?=$espece?>" disabled readonly>
    </div>
    <div class="col-md-6">
        <label class="form-label">Nourriture</label>
        <input type="text" class="form-control" value="<?=$food?>" disabled readonly>
    </div>
    <div class="col-md-3">
        <label class="form-label">Volume d'eau</label>
        <input type="text" class="form-control" value="<?=$volume?>" disabled readonly>
    </div>
    <div class="col-md-3">
        <label class="form-label">Type d'eau</label>
        <input type="text" class="form-control" value="<?=$type?>" disabled readonly>
    </div>
    <div class="col-md-2">
        <label class="form-label">PH</label>
        <input type="text" class="form-control" value="<?=$ph?>" disabled readonly>
    </div>
    <div class="col-md-4">
        <label class="form-label">Conductivité</label>
        <input type="text" class="form-control" value="<?=$conduct?>" disabled readonly>
    </div>
</form>