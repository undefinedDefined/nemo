<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap 5.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body class="text-center">

    <main class="form-signin w-100 m-auto">
        <form action="login.process.php" method="post">
            <a href="index.php">
                <img class="mb-4" src="assets/logo.svg" alt="" width="72" height="57">
            </a>
            <h1 class="h3 mb-3 fw-normal">Connexion</h1>

            <?php
            // alerte si connexion echouée
            if (isset($_GET['connectionFailed']) && !empty($_GET['connectionFailed']) && $_GET['connectionFailed'] === 'true') {
                echo "<div class='alert alert-warning' role='alert'>
                    Utilisateur inconnu. Veuillez réessayer.
                </div>";
            }
            ?>

            <div class="form-floating">
                <input type="email" class="form-control" name="email" placeholder="name@example.com">
                <label for="email">Email</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <label for="password">Mot de passe</label>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
        </form>
    </main>

    <!-- Jquery 3.6 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap 5.2 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>