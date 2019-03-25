<?php

require_once '../daos/Connexion.php';
require_once '../daos/UtilisateursDAO.php';

/*
  authentification.php
 */

$pseudo = filter_input(INPUT_POST, "pseudo");
$mdp = filter_input(INPUT_POST, "mdp");

$cible = "";
$message = "";

if (empty($pseudo) || empty($mdp)) {
    // Authentification BAD au niveau du contrôle de surface
    $cible = "authentification.php";
    $message = "Toutes les saisies sont obligatoires !";
} else {
    // Authentification GOOD
    $pdo = seConnecter("bd.ini");

    /*
     * SELECT ONE
     */
    $enr = selectOneByPseudoAndMdp($pdo, $pseudo, $mdp);
    if ($enr == null) {
        // Authentification BAD au niveau de la BD
        $cible = "authentification.php";
        $message = "Pseudo ou mot de passe incorrect !";
    } else {
        $cible = "accueil_general.php";
    }
}

include "../boundaries/$cible";
?>
