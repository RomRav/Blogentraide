<?php

session_start();

require_once '../daos/Connexion.php';
require_once '../daos/UtilisateursDAO.php';

/*
  AuthentificationCTRL.php
 */

//echo "cook<hr>";
//echo $_COOKIE["mdp"];
//echo "cook<hr>";

$pseudo = filter_input(INPUT_POST, "pseudo");
$mdp = filter_input(INPUT_POST, "mdp");
setCookie("pseudo", $pseudo, time() + (3600 * 24 * 365), "/"); // --- 1 an

$seSouvenirDuMotDePasse = filter_input(INPUT_POST, "chkMdpSave");

//echo "se souvenir<hr>";
//echo $seSouvenirDuMotDePasse;
//echo "se souvenir<hr>";

$cible = "";
$message = "";

if (empty($pseudo) || empty($mdp)) {
    // Authentification BAD au niveau du contrôle de surface
    $cible = "AuthentificationIHM.php";
    $message = "Toutes les saisies sont obligatoires !";
} else {
    // Authentification GOOD au niveau du contrôle de surface
    $pdo = seConnecter("bd.ini");

    /*
     * SELECT ONE
     */
    $enr = selectOneByPseudoAndMdp($pdo, $pseudo, $mdp);
    if ($enr == null) {
        // Authentification BAD au niveau de la BD
        $cible = "AuthentificationIHM.php";
        $message = "Pseudo ou mot de passe incorrect !";
    } else {
        $cible = "AccueilGeneralIHM.php";
        $_SESSION["pseudo"] = $pseudo;

        if ($seSouvenirDuMotDePasse != null && $seSouvenirDuMotDePasse == "on") {
//            echo "<br>$seSouvenirDuMotDePasse<br>";
            /*
              bool setcookie ( string $name [, string $value [, int $expire = 0 [, string $path [, string $domain [, bool $secure = false [, bool $httponly = false ]]]]]] )
             */
            setCookie("mdp", $mdp, time() + (3600 * 24 * 365), "/"); // --- 1 an
//            echo "mdp sauvegardé";
        } else {
//            echo "mdp supprimé";
            setCookie("mdp", "", time(), "/"); // --- Suppression
        }
    }
}

include "../boundaries/$cible";
?>
