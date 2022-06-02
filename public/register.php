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

<body class="container 100-vh" style="background-color: #E9F7F9;">

    <div class="my-5 text-center">
        <a href="index.php">
            <img class="d-block mx-auto mb-4" src="assets/logo.svg" alt="" width="72" height="57">
        </a>
        <h2>Inscription</h2>
        <p class="lead">Vous êtes aquariophile ? Rejoignez notre communauté et accédez à beaucoup d'avantages.</p>
    </div>

    <div class="col-md-6 offset-md-3">
        <form action="register.process.php" method="post" class="row g-3 needs-validation" novalidate>
            <div class="col-md-6 form-floating">
                <input type="text" class="form-control" name="lastname" placeholder="Indiana" required>
                <label for="inputEmail4" class="form-label">Nom*</label>
                <div class="invalid-feedback">
                    Le nom doit faire entre 3-25 caractères.
                </div>
            </div>
            <div class="col-md-6 form-floating">
                <input type="text" class="form-control" name="firstname" placeholder="Jones" required>
                <label for="inputPassword4" class="form-label">Prénom*</label>
                <div class="invalid-feedback">
                    Le prénom doit faire entre 3-25 caractères.
                </div>
            </div>
            <div class="col-12 form-floating">
                <input type="email" class="form-control" name="email" placeholder="indiana.jones@example.com" required>
                <label for="inputAddress" class="form-label">Email*</label>
            </div>
            <div class="col-6 form-floating">
                <input type="password" class="form-control" name="password" placeholder="password" required>
                <label for="inputAddress2" class="form-label">Mot de passe*</label>
                <div class="invalid-feedback">
                    Le mot de passe doit faire entre 8-25 caractères, contenir au moins une majuscule, un chiffre et un caractère spécial.
                </div>
            </div>
            <div class="col-6 form-floating">
                <input type="password" class="form-control" name="password_check" placeholder="password" required>
                <label for="inputAddress2" class="form-label">Confirmer*</label>
                <div class="invalid-feedback">
                    Les mots de passes doivent être identiques.
                </div>
            </div>
            <div class="col-md-4 form-floating">
                <input type="tel" class="form-control" name="tel" placeholder="0000000000">
                <label for="tel" class="form-label">Telephone <span class="text-muted">(Optionnel)</span></label>
            </div>
            <div class="col-md-4 form-floating">
                <input type="date" class="form-control" name="birthdate" required>
                <label for="birthdate" class="form-label">Date de naissance*</label>
            </div>
            <div class="col-md-4 form-floating">
                <select name="country" class="form-select" required>
                    <?php

                    include_once('inc/countries.php');

                    $options = "";
                    foreach ($countries as $code => $name) {
                        $options .= $code === 'FR' ?
                            "<option value='$code' selected>$name</option>" :
                            "<option value='$code'>$name</option>";
                    }

                    echo $options;

                    ?>
                </select>
                <label for="country" class="form-label">Pays*</label>
            </div>
            <div class="col-12 float-right mt-5">
                <button class="w-100 btn btn-info btn-lg" type="submit">Inscription</button>
            </div>
        </form>
    </div>

    <footer class="mt-3 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017–2022 Company Name</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Privacy</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
    </footer>


    <!-- Jquery 3.6 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap 5.2 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="js/register.js"></script>
</body>

</html>