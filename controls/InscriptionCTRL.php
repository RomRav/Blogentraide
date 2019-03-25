<?php

/*
  inscription.php
 */

require_once '../daos/Connexion.php';
require_once '../daos/UtilisateursDAO.php';

$jour = filter_input(INPUT_POST, "jours");
$mois = filter_input(INPUT_POST, "mois");
$annee = filter_input(INPUT_POST, "annees");

$pseudo = filter_input(INPUT_POST, "pseudo");
$mdp = filter_input(INPUT_POST, "mdp");

//echo "$pseudo<br>";
//echo "$mdp<br>";


$message = "aaaaa";

// ISO 8601 : YYYY-MM-DD
$message = "$annee-$mois-$jour";
$cible = "";

if (empty($pseudo) || empty($mdp)) {
    echo "Toutes les saisies sont obligatoires !<br>";
    // Inscription BAD au niveau du contrôle de surface
    $cible = "InscriptionIHM.php";
    $message = "Toutes les saisies sont obligatoires !";
} else {
    // Inscription GOOD
    $pdo = seConnecter("../daos/bd.ini");
    $pdo->beginTransaction();

    /*
     * INSERT
     */
    $t = array();
    $t["pseudo"] = $pseudo;
    $t["mdp"] = $mdp;
    $liAffecte = insert($pdo, $t);
    if ($liAffecte == 1) {
        $pdo->commit();
        $cible = "InscriptionIHM.php";
        $message = "Inscription réussie !";
    } else {
        // Inscription BAD au niveau de la BD
        $pdo->rollBack();
        $cible = "InscriptionIHM.php";
        $message = "Problème d'inscription !";
    }
    seDeconnecter($pdo);
}

include "../boundaries/$cible";
?>
