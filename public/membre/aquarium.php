<?php

use App\class\Aquarium;
use App\class\Pagination;

require('../../vendor/autoload.php');

session_start();

// vérification autorisation
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 5) {
    header('location: index.php');
    exit;
}

/**
 * * Bloc pagination
 */
if (!isset($_GET['page']) || empty($_GET['page']) || (int) $_GET['page'] < 1) {
    header('location: aquarium.php?page=1');
    exit;
}

$currentPage = htmlspecialchars($_GET['page']);
$lastPage = ceil(count(Aquarium::getAll()) / 9); // 9 correspond au nombre de cartes par page (deuxieme parametre de getListForCurrentPage)
// fin pagination

$aquariums = Aquarium::getListForCurrentPage($currentPage);

?>

<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap 5.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
</head>

<body class="container py-4">
    <?php include_once('header.php'); ?>

    <main>

        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Administration aquariums</h1>
                    <p class="lead text-muted">Vous pouvez ajouter, modifier, supprimer et restaurer des aquarium à partir de cette page.</p>
                    <button type="button" class="btn btn-primary my-2" data-aq-action="create" data-bs-toggle="modal" data-bs-target="#modal">Ajouter un aquarium</button>
                    <button type="button" class="btn btn-secondary my-2" data-aq-action="restaure" data-bs-toggle="modal" data-bs-target="#modal">Restaurer un aquarium</button>
                </div>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                    <?php foreach ($aquariums as $aquarium) :
                        $aqId = $aquarium['id'];
                        $imgFile = empty($aquarium['img']) ?'aquarium.jpg' : $aquarium['img'];
                        $numBac = $aquarium['num_bac'];
                        $createDate = Datetime::createFromFormat('Y-m-d H:i:s', $aquarium['create_date'])->format('d/m/Y');
                        $water_timer = $aquarium['timer_water'];
                        $filter_timer = $aquarium['timer_filter'];
                    ?>
                        <div class="col">
                            <div class="card shadow-sm">
                                <img src="../assets/<?= $imgFile ?>" alt="Image aquarium" class="card-img-top" width="100%" height="225" role="img">

                                <div class="card-body">
                                    <h5 class="card-title">Aquarium [<?= $aqId ?>]</h5>

                                    <div class="list-group w-auto">
                                        <button class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true" data-aq-timer ="water" data-aq-water="<?= $water_timer ?>">
                                            <img src="../assets/icon_drop.svg" alt="Water icon" width="42" height="42" class="rounded-circle flex-shrink-0">
                                            <div class="d-flex gap-2 w-100 justify-content-between">
                                                <div>
                                                    <h6 class="mb-0">Eau à changer dans :</h6>
                                                    <p class="mb-0 opacity-75">Placeholder timer</p>
                                                </div>
                                            </div>
                                        </button>
                                        <button class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true" data-aq-timer ="filter" data-aq-water="<?= $filter_timer ?>">
                                            <img src="../assets/icon_filter.svg" alt="Filter icon" width="42" height="42" class="rounded-circle flex-shrink-0">
                                            <div class="d-flex gap-2 w-100 justify-content-between">
                                                <div>
                                                    <h6 class="mb-0">Filtre à changer dans :</h6>
                                                    <p class="mb-0 opacity-75">Placeholder timer</p>
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary" data-aq-action="show" data-aq-id="<?= $aqId ?>" data-bs-toggle="modal" data-bs-target="#modal">View</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary" data-aq-action="edit" data-aq-id="<?= $aqId ?>" data-bs-toggle="modal" data-bs-target="#modal">Edit</button>
                                            <button type="button" class="btn btn-sm btn-outline-danger" data-aq-action="delete" data-aq-id="<?= $aqId ?>" data-bs-toggle="modal" data-bs-target="#modal">Delete</button>
                                        </div>
                                        <small class="text-muted"><?= $createDate ?></small>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="row my-5">
                    <?php echo Pagination::paginate($currentPage, $lastPage); ?>
                </div>
            </div>
        </div>

    </main>

    <!-- Modal -->
    <div class="container">
        <div class="modal fade" id="modal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">...</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery 3.6 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap 5.2 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Script personnalisé -->
    <script src="js/aquarium.js"></script>
    <script src="js/aquarium.chrono.js"></script>
</body>

</html>