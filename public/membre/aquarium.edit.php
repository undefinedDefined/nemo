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

<form class="row g-3" action="aquarium.edit.process.php" method="post" enctype="multipart/form-data">
    <div class="col-md-2">
        <label class="form-label">ID</label>
        <input type="text" class="form-control" value="<?= $id ?>" disabled readonly>
        <input type="hidden" name="id" value="<?= $id ?>">
    </div>
    <div class="col-md-2">
        <label class="form-label">Bac</label>
        <input type="number" name="num_bac" class="form-control" value="<?= $bac ?>">
    </div>
    <div class="col-md-6">
        <label class="form-label">Date création</label>
        <input type="text" class="form-control" value="<?= $creation ?>" disabled readonly>
    </div>
    <div class="col-md-2">
        <label class="form-label">Prix</label>
        <input type="text" name="price" class="form-control" value="<?= $prix ?>">
    </div>
    <div class="col-md-6">
        <label class="form-label">Espèces</label>
        <input type="text" name="species" class="form-control" value="<?= $espece ?>">
    </div>
    <div class="col-md-6">
        <label class="form-label">Nourriture</label>
        <input type="text" name="food_type" class="form-control" value="<?= $food ?>">
    </div>
    <div class="col-md-3">
        <label class="form-label">Volume d'eau</label>
        <input type="text" name="volume" class="form-control" value="<?= $volume ?>">
    </div>
    <div class="col-md-3">
        <label class="form-label">Type d'eau</label>
        <select class="form-select" name="water_type">
            <option value="douce" <?php echo $type == 'douce' ? 'selected' : '' ?>>Douce</option>
            <option value="sale" <?php echo $type == 'sale' ? 'selected' : '' ?>>Sale</option>
        </select>
    </div>
    <div class="col-md-2">
        <label class="form-label">PH</label>
        <input type="number" min="1" max="14" step="0.01" name="ph" class="form-control" value="<?= $ph ?>">
    </div>
    <div class="col-md-4">
        <label class="form-label">Conductivité</label>
        <input type="text" name="conduct" class="form-control" value="<?= $conduct ?>">
    </div>
    <div class="col-md-12">
        <input type="hidden" name="MAX_FILE_SIZE" value="2000000"/>
        <div class="input-group mb-3">
            <label class="input-group-text">Image</label>
            <input type="file" name="img" class="form-control">
        </div>
    </div>
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary float-end">Envoyer</button>
    </div>
</form>