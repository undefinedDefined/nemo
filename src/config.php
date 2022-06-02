<?php

switch ($_SERVER['HTTP_HOST']) {


    // pour la mise en production
    case 'mon.hebergeur.com':

        define('DBNAME', "");
        define('DBUSER', "");
        define('DBPASS', "");

        // Gestion des options PDO
        define('PDO_OPTIONS', array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_SILENT,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ));

        break;


    // pour le developpement
    case 'localhost':

        define('DBNAME', "dory");
        define('DBUSER', "root");
        define('DBPASS', "");

        // Gestion des erreurs (local uniquement)
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        // Gestion des options PDO
        define('PDO_OPTIONS', array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ));

        break;
}