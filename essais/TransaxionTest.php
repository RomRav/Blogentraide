<?php

/*
 * TransaxionTest.php
 */

require_once 'Connexion.php';
require_once 'Transaxion.php';

$lcnx = seConnecter("cours.ini");

try {

    initialiser($lcnx);

    $lsSQL = "INSERT INTO pays(id_pays, nom_pays) VALUES(?,?)";

    $lcmd = $lcnx->prepare($lsSQL);

    $id = "SR";
    $nom = "Serbie";

    $lcmd->bindParam(1, $id, PDO::PARAM_STR);
    $lcmd->bindParam(2, $nom, PDO::PARAM_STR);

    $lcmd->execute();

    //$lbOK = valider($lcnx);
    $lbOK = annuler($lcnx);
    echo $lbOK;
} catch (PDOException $exc) {
    echo $exc->getMessage();
    annuler($lcnx);
}

seDeconnecter($lcnx);
?>
