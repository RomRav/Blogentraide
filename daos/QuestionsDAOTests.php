<?php

require_once 'Connexion.php';
require_once '../entities/Questions.php';
require_once 'QuestionsDAO.php';

/*
 * Connexion
 */
$pdo = Connexion::seConnecter("bd.ini");
$pdo->beginTransaction();

$dao = new QuestionsDAO();

/*
 * INSERT
 */
echo "<hr>INSERT<hr>";
//$objet = new Questions(0, "Acronyme SOLID", 2, 1, "2019-01-14");
$objet = new Questions(0, "Acronyme SOLID", 2, 1, "now()");
$liAffecte = $dao->insert($pdo, $objet);
if ($liAffecte == 1) {
    $pdo->commit();
} else {
    $pdo->rollBack();
}
echo "Ajout : $liAffecte" . "<br>";

/*
 * SELECT ONE
 */
//echo "<hr>SELECT ONE<hr>";
//$dao = new QuestionsDAO($pdo);
//
//$o = $dao->selectOne(2);
//
//echo "<pre>";
//var_dump($o);
//echo "</pre>";

/*
 * SELECT ALL
 */
echo "<hr>SELECT ALL<hr>";
$tEnrs = $dao->selectAll();
//echo "<pre>";
//var_dump($tEnrs);
//echo "</pre>";

for ($i = 0; $i < count($tEnrs); $i++) {
    $o = $tEnrs[$i];
    echo $o->getIdQuestion() . ":" . $o->getQuestion() . "<br>";
}



/*
 * DELETE
 */
echo "<hr>DELETE<hr>";
$objet = new Questions(3, "", 0, 0, "");
$liAffecte = $dao->delete($objet);
if ($liAffecte == 1) {
    $pdo->commit();
} else {
    $pdo->rollBack();
}
echo "Suppression : $liAffecte" . "<br>";
/*
 * UPDATE
 */
echo "<hr>UPDATE<hr>";
/*
 * Déconnexion
 */
Connexion::seDeconnecter($pdo);
?>