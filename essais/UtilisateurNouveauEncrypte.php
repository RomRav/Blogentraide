<?php

/*
  UtilisateurNouveauEncrypte.php
 */

header("Content-Type: text/html; charset=UTF-8");

require_once './UtilisateursDAO.php';

try {
    // Connexion
    $pdo = new PDO("mysql:host=localhost;port=3306;dbname=blogentraide;", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("SET NAMES 'UTF8'");

    /*
     * INSERTION
     */
    echo "<hr>INSERT<hr>";

    $sql = "INSERT INTO utilisateurs(pseudo, mdp) VALUES(?,?)";
    $lcmd = $pdo->prepare($sql);
    $lcmd->bindValue(1, $objet["pseudo"]);
    $lcmd->bindValue(2, $objet["mdp"]);
    $lcmd->execute();
    // Récupération du nombre d'enregistrements insérés (1 ou 0 dans le cas présent)
    $liAffected = $lcmd->rowcount();
    echo "$liAffected";



    /*
     * SELECT ONE BY PSEUDO AND MDP
     */
    echo "<hr>SELECT ONE BY PSEUDO AND MDP<hr>";
    $enr = selectOneByPseudoAndMdp($pdo, "a", "f");

    echo "<pre>";
    var_dump($enr);
    echo "</pre>";
} catch (PDOException $e) {
    echo $e->getMessage();
}
$pdo = null;
?>
