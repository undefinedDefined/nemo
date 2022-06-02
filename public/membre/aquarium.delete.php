<?php


if (!isset($_POST['id']) || empty($_POST['id'])) {
    exit;
}

include_once('../../src/func.php');
$id = cleanInput($_POST['id']);
?>

<p>Etes vous sûr de vouloir supprimer l'aquarium <?= $id ?> de la base de données ?</p>
<form action="aquarium.delete.process.php" method="post" class="text-end">
    <input type="hidden" name="id" value="<?= $id ?>">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
</form>