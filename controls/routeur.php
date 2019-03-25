<?php

/*
  routeur.php
 */

session_start();

$route = filter_input(INPUT_POST, "route");
if ($route == null) {
    $route = filter_input(INPUT_GET, "route");
}

switch ($route) {
    case "authentification":
        $route = "../boundaries/AuthentificationIHM";
        break;

    case "inscription":
        $route = "../boundaries/InscriptionIHM";
        break;

    case "gerer_mon_compte":
        if (isSet($_SESSION["pseudo"])) {
            $route = "../boundaries/GererMonCompteIHM";
        } else {
            $route = "../boundaries/AuthentificationIHM";
        }
        break;

    case "deconnexion":
        $route = "../controls/Deconnexion";
        break;

    case "produits":
        $route = "../boundaries/ProduitsIHM";
        break;
    case "Categories":
        $route = "../boundaries/CategoriesIHM";
        break;
    case "Sujets":
        $route = "../boundaries/SujetsIHM";
        break;
    case "Questions":
        $route = "../boundaries/QuestionsIHM";
        break;
    case "Reponses":
        $route = "../boundaries/ReponsesIHM";
        break;


    default:
        $route = "../boundaries/AccueilGeneralIHM";
        break;
}
include "$route.php";
?>
