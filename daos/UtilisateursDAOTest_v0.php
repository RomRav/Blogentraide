<?php

/*
  UtilisateursDAOTest_v0.php
 */

header("Content-Type: text/html; charset=UTF-8");

require_once 'UtilisateursDAO.php';

try {
    // Connexion
    $pdo = new PDO("mysql:host=localhost;port=3306;dbname=blogentraide;", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("SET NAMES 'UTF8'");

    /*
     * SELECT ONE
     */
    echo "<hr>SELECT ONE BY ID<hr>";
    $enr = selectOne($pdo, 2);
    if (count($enr) === 0) {
        echo "L'utilisateur n'existe pas ";
    } else {
        echo "<pre>";
        var_dump($enr);
        echo "</pre>";
    }



    /*
     * SELECT ONE BY PSEUDO AND MDP
     */
    echo "<hr>SELECT ONE BY PSEUDO AND MDP<hr>";
    $enr = selectOneByPseudoAndMdp($pdo, "a", "f");

    if (count($enr) === 0) {
        echo "L'utilisateur n'existe pas ";
    } else {
        echo "<pre>";
        var_dump($enr);
        echo "</pre>";
    }

    /*
     * SELECT ALL
     */
    echo "<hr>SELECT ALL<hr>";
    $tEnrs = selectAll($pdo);
    for ($i = 0; $i < count($tEnrs); $i++) {
        $enr = $tEnrs[$i];
        echo $enr["pseudo"] . ":" . $enr["mdp"] . "<br>";
        //echo $enr[0] . ":" . $enr[1] . "<br>";
    }
//    foreach ($tEnrs as $enr) {
//        foreach ($enr as $cle => $valeur) {
//            echo "$cle : $valeur<br>";
//        }
//    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

/*
 * INSERT
 */
echo "<hr>INSERT<hr>";
$nouvelUtilisateur = array();
$nouvelUtilisateur["pseudo"] = "";
$nouvelUtilisateur["mdp"] = "zzz";


if ($nouvelUtilisateur["pseudo"] === "") {
    echo "Pseudo obligatoire !!!";
} else {
    $liInseres = insert($pdo, $nouvelUtilisateur);
    if ($liInseres === 1) {
        echo "Inscription OK";
    } else {
        echo "Inscription Ratée";
    }
}

/*
 * DELETE
 */
//echo "<hr>DELETE<hr>";
//$utilisateur = array();
//$utilisateur["id_utilisateur"] = "44";
//
//$liSupprimes = delete($pdo, $utilisateur);
//if ($liSupprimes === 1) {
//    echo "Désinscription OK";
//} else {
//    echo "Désinscription Ratée";
//}


/*
 * DECONNEXION
 */
$pdo = null;
?>

