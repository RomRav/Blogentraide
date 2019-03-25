<?php

require_once 'Utilisateurs.php';


$ut = new Utilisateurs(1, "Plue", "123");

echo $ut->getIdUtilisateur() . "<br>";
echo $ut->getPseudo() . "<br>";
echo $ut->getMdp() . "<br>";
?>