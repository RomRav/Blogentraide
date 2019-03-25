<?php

/*
 * ConnexionTest.php
 */
require_once 'Connexion.php';

$pdo = Connexion::seConnecter("bd.ini");

echo "<br><pre>";
var_dump($pdo);
echo "</pre><br>";

Connexion::seDeconnecter($pdo);
?>