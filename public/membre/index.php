<?php


session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 5) {
    header('location: index.php');
    exit;
}

$role = $_SESSION['role'];
$lastname = $_SESSION['lastname'];
$firstname = $_SESSION['firstname'];
$birthdate = $_SESSION['birthdate'];
$tel = $_SESSION['tel'];
$avatar = $_SESSION['avatar'];
$avatarLink = stripos($avatar, 'http') !== false ? $avatar : "assets/$avatar";

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
    <?php include('header.php'); ?>

    <main>
        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Espace membre</h1>
                <p class="col-md-8 fs-4">Bienvenue sur l'espace membre. Vous pouvez ajouter, modifier ou supprimer des utilisateurs ou des aquariums à partir de cette page.</p>
            </div>
        </div>

        <div class="row align-items-md-stretch">
            <div class="col-md-6">
                <div class="h-100 p-5 text-white bg-dark rounded-3">
                    <h2>Utilisateurs</h2>
                    <p>Swap the background-color utility and add a `.text-*` color utility to mix up the jumbotron look. Then, mix and match with additional component themes and more.</p>
                    <button class="btn btn-outline-light" type="button">Explorer</button>
                </div>
            </div>
            <div class="col-md-6">
                <div class="h-100 p-5 bg-light border rounded-3">
                    <h2>Aquariums</h2>
                    <p>Or, keep it light and add a border for some added definition to the boundaries of your content. Be sure to look under the hood at the source HTML here as we've adjusted the alignment and sizing of both column's content for equal-height.</p>
                    <a href="aquarium.php" class="btn btn-outline-secondary">Explorer</a>
                </div>
            </div>
        </div>
    </main>

    <footer class="pt-3 mt-4 text-muted border-top">
        &copy; 2022
    </footer>
</body>

</html>