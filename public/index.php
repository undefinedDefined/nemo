<?php
session_start();

$auth = false;
if (isset($_SESSION['auth']) && $_SESSION['auth']) {
    $auth = true;
    $role = $_SESSION['role'];
    $lastname = $_SESSION['lastname'];
    $firstname = $_SESSION['firstname'];
    $birthdate = $_SESSION['birthdate'];
    $tel = $_SESSION['tel'];
    $avatar = $_SESSION['avatar'];
    $avatarLink = stripos($avatar, 'http') !== false ? $avatar : "assets/$avatar";

}

?>

<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap 5.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center col-md-1 mb-2 mb-md-0 text-dark text-decoration-none">
                <img src="assets/logo.svg" alt="Aquarium" width="48" height="36" role="img">
            </a>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="#" class="nav-link px-2 link-secondary">Home</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">Features</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">Pricing</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">FAQs</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">About</a></li>
            </ul>

            <?php if ($auth) : ?>
                <div class="dropdown text-end col-md-1">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="<?= $avatarLink ?>" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">Messagerie</a></li>

                        <?php if($role === 5): ?>
                        <li><a class="dropdown-item" href="membre/index.php">Espace membre</a></li>
                        <?php endif; ?>

                        <li><a class="dropdown-item" href="#">Profil</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="logout.php">Deconnexion</a></li>
                    </ul>
                </div>
            <?php else : ?>
                <div class="col-md-3 text-end">
                    <a href="login.php" class="btn btn-outline-primary me-2">Connexion</a>
                    <a href="register.php" class="btn btn-primary">Inscription</a>
                </div>
            <?php endif; ?>
        </header>
    </div>

    <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="assets/aq_svg.svg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500">
            </div>
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold lh-1 mb-3">Responsive left-aligned hero with image</h1>
                <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
            </div>
        </div>
    </div>

    <div class="container px-4 py-5">
        <h2 class="pb-2 border-bottom">Explorer nos sections</h2>

        <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-4 shadow-lg" style="background-image: url('assets/nemo.jpg');">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                        <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Short title, long jacket</h2>
                        <ul class="d-flex list-unstyled mt-auto">
                            <li class="me-auto">
                                <img src="assets/logo.svg" alt="Aquarium" width="32" height="32" class="rounded-circle border border-white">
                            </li>

                            <li class="d-flex align-items-center">
                                <small>En savoir plus</small>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-4 shadow-lg" style="background-image: url('assets/tortue.jpg');">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                        <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Much longer title that wraps to multiple lines</h2>
                        <ul class="d-flex list-unstyled mt-auto">
                            <li class="me-auto">
                                <img src="assets/logo.svg" alt="Aquarium" width="32" height="32" class="rounded-circle border border-white">
                            </li>

                            <li class="d-flex align-items-center">
                                <small>En savoir plus</small>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-4 shadow-lg" style="background-image: url('assets/meduse.jpg');">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
                        <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Another longer title belongs here</h2>
                        <ul class="d-flex list-unstyled mt-auto">
                            <li class="me-auto">
                                <img src="assets/logo.svg" alt="Aquarium" width="32" height="32" class="rounded-circle border border-white">
                            </li>

                            <li class="d-flex align-items-center">
                                <small>En savoir plus</small>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container px-4 py-5" id="icon-grid">
        <h2 class="pb-2 border-bottom">Les avantages membre</h2>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 g-4 py-5">
            <div class="col d-flex align-items-start">
                <!-- <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em">
                    <use xlink:href="#bootstrap" />
                </svg> -->
                <div>
                    <h4 class="fw-bold mb-0">Featured title</h4>
                    <p>Paragraph of text beneath the heading to explain the heading.</p>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <!-- <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em">
                    <use xlink:href="#cpu-fill" />
                </svg> -->
                <div>
                    <h4 class="fw-bold mb-0">Featured title</h4>
                    <p>Paragraph of text beneath the heading to explain the heading.</p>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <!-- <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em">
                    <use xlink:href="#calendar3" />
                </svg> -->
                <div>
                    <h4 class="fw-bold mb-0">Featured title</h4>
                    <p>Paragraph of text beneath the heading to explain the heading.</p>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <!-- <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em">
                    <use xlink:href="#home" />
                </svg> -->
                <div>
                    <h4 class="fw-bold mb-0">Featured title</h4>
                    <p>Paragraph of text beneath the heading to explain the heading.</p>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <!-- <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em">
                    <use xlink:href="#speedometer2" />
                </svg> -->
                <div>
                    <h4 class="fw-bold mb-0">Featured title</h4>
                    <p>Paragraph of text beneath the heading to explain the heading.</p>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <!-- <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em">
                    <use xlink:href="#toggles2" />
                </svg> -->
                <div>
                    <h4 class="fw-bold mb-0">Featured title</h4>
                    <p>Paragraph of text beneath the heading to explain the heading.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center">
                <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                    <!-- <svg class="bi" width="30" height="24">
                        <use xlink:href="#bootstrap" />
                    </svg> -->
                </a>
                <span class="mb-3 mb-md-0 text-muted">&copy; 2022 Company, Inc</span>
            </div>

            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24">
                            <use xlink:href="#twitter" />
                        </svg></a></li>
                <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24">
                            <use xlink:href="#instagram" />
                        </svg></a></li>
                <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24">
                            <use xlink:href="#facebook" />
                        </svg></a></li>
            </ul>
        </footer>
    </div>

    <!-- Jquery 3.6 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap 5.2 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>