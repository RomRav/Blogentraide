<?php

/*
  ProduitsDAOTest.php
 */

require_once 'Connexion.php';
require_once '../entities/Categories.php';
require_once 'CategoriesDAO.php';

/*
 * Connexion
 */
$pdo = Connexion::seConnecter("bd.ini");
$pdo->beginTransaction();

/*
 * SELECT ONE
 */
echo "<hr>SELECT ONE<hr>";
$o = CategoriesDAO::selectOne($pdo, 1);

echo "<pre>";
var_dump($o);
echo "</pre>";

/*
 * SELECT ALL
 */
echo "<hr>SELECT ALL<hr>";
$tEnrs = CategoriesDAO::selectAll($pdo);
//echo "<pre>";
//var_dump($tEnrs);
//echo "</pre>";

for ($i = 0; $i < count($tEnrs); $i++) {
    $o = $tEnrs[$i];
    echo $o->getIdCategorie() . ":" . $o->getCategorie() . "<br>";
}

/*
 * INSERT
 */
//echo "<hr>INSERT<hr>";
//$objet = new Categories(0, "Analyse");
//$liAffecte = CategoriesDAO::insert($pdo, $objet);
//if ($liAffecte == 1) {
//    $pdo->commit();
//} else {
//    $pdo->rollBack();
//}
//echo "Ajout : $liAffecte" . "<br>";

/*
 * DELETE
 */
//echo "<hr>DELETE<hr>";
//$objet = new Categories(4, "Analyse");
//$liAffecte = CategoriesDAO::delete($pdo, $objet);
//if ($liAffecte == 1) {
//    $pdo->commit();
//} else {
//    $pdo->rollBack();
//}
//echo "Suppression : $liAffecte" . "<br>";
/*
 * UPDATE
 */
//echo "<hr>UPDATE<hr>";
//$objet = new Categories(0, "ANALYSE");
//$liAffecte = CategoriesDAO::update($pdo, $objet);
//if ($liAffecte == 1) {
//    $pdo->commit();
//} else {
//    $pdo->rollBack();
//}
//echo "Ajout : $liAffecte" . "<br>";
/*
 * Déconnexion
 */
Connexion::seDeconnecter($pdo);
?>
