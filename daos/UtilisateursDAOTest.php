<?php

/*
  UtilisateursDAOTest.php
 */

require_once 'Connexion.php';
require_once '../entities/Utilisateurs.php';
require_once 'UtilisateursDAO.php';

/*
 * Connexion
 */
$pdo = Connexion::seConnecter("bd.ini");
$pdo->beginTransaction();

/*
 * SELECT ONE
 */
//echo "<hr>SELECT ONE BY ID<hr>";
//$enr = selectOne($pdo, 2);
//echo "<pre>";
//var_dump($enr);
//echo "</pre>";

/*
 * SELECT ONE BY PSEUDO AND MDP
 */
//echo "<hr>SELECT ONE BY PSEUDO AND MDP<hr>";
$ut = new Utilisateurs(0, "p", "b");
//$enr = UtilisateursDAO::selectOneByPseudoAndMdp($pdo, $ut);

//echo "<pre>";
//var_dump($enr);
//echo "</pre>";

/*
 * SELECT ALL
 */
echo "<hr>SELECT ALL<hr>";
$tEnrs = UtilisateursDAO::selectAll($pdo);
echo "<pre>";
var_dump($tEnrs);
echo "</pre>";

for ($i = 0; $i < count($tEnrs); $i++) {
    $enr = $tEnrs[$i];
    echo $enr->getIdUtilisateur() . ":" . $enr->getPseudo() . " :" . $enr->getMdp() . "<br>";
}

/*
 * INSERT
 */

//$objet = array();
//$objet["pseudo"] = "Tintin";
//$objet["mdp"] = "Tintin123#";
//$liAffecte = UtilisateursDAO::insert($pdo, $objet);
//if ($liAffecte == 1) {
//    $pdo->commit();
//} else {
//    $pdo->rollBack();
//}
//echo "Ajout : $liAffecte" . "<br>";

/*
 * DELETE
 */
//$objet = array();
//$objet["id_utilisateur"] = 7;
//$objet["pseudo"] = "Tintin";
//$objet["mdp"] = "Tintin123#";
//$liAffecte = UtilisateursDAO::delete($pdo, $objet);
//if ($liAffecte == 1) {
//    $pdo->commit();
//} else {
//    $pdo->rollBack();
//}
//echo "Suppression : $liAffecte" . "<br>";
/*
 * Déconnexion
 */
Connexion::seDeconnecter($pdo);
?>