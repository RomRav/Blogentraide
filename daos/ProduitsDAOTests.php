<?php

/*
  ProduitsDAOTest.php
 */

require_once 'Connexion.php';
require_once '../entities/Produits.php';
require_once 'ProduitsDAO.php';

/*
 * Connexion
 */
$pdo = Connexion::seConnecter("bd.ini");
$pdo->beginTransaction();

/*
 * SELECT ONE
 */
echo "<hr>SELECT ONE<hr>";
$o = ProduitsDAO::selectOne($pdo, 1);

echo "<pre>";
var_dump($o);
echo "</pre>";

/*
 * SELECT ALL
 */
echo "<hr>SELECT ALL<hr>";
$tEnrs = ProduitsDAO::selectAll($pdo);

//echo "<pre>";
//var_dump($tEnrs);
//echo "</pre>";

for ($i = 0; $i < count($tEnrs); $i++) {
    $o = $tEnrs[$i];
    echo $o->getIdProduit() . ":" . $o->getProduit() . "<br>";
}

/*
 * INSERT
 */
echo "<hr>INSERT<hr>";
$objet = new Produits(0, "A+", 3);
$liAffecte = ProduitsDAO::insert($pdo, $objet);
if ($liAffecte == 1) {
    $pdo->commit();
    echo "<br>Commit";
} else {
    $pdo->rollBack();
    echo "<br>Rollback";
}
echo "Ajout : $liAffecte" . "<br>";

/*
 * DELETE
 */
//echo "<hr>DELETE<hr>";
//$objet = new Produits(4, "Analyse", 3);
//$liAffecte = ProduitsDAO::delete($pdo, $objet);
//if ($liAffecte == 1) {
//    $pdo->commit();
//} else {
//    $pdo->rollBack();
//}
//echo "Suppression : $liAffecte" . "<br>";
/*
 * UPDATE
 */
echo "<hr>UPDATE<hr>";
/*
 * Déconnexion
 */
Connexion::seDeconnecter($pdo);
?>
