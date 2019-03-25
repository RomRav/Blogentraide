<?php

/*
  Deconnexion.php
 */
//session_start();

if (isSet($_SESSION["pseudo"])) {
    unset($_SESSION["pseudo"]);
    $message = "Vous êtes déconnecté(e)";
} else {
    $message = "Vous n'étiez pas connecté(e)";
}

include("../boundaries/AuthentificationIHM.php");
?>
