<?php

/*
  inscription.php
 */

$jour = filter_input(INPUT_POST, "jours");
$mois = filter_input(INPUT_POST, "mois");
$annee = filter_input(INPUT_POST, "annees");
$message = "";

// ISO 8601 : YYYY-MM-DD
$message = "$annee-$mois-$jour";

echo $message;
?>
