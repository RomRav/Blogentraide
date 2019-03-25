<?php

/*
 * ProduitsDAOTest.php
 */

//Instancier les pages à inclure
require_once 'connexion.php';
require_once 'ProduitsDAO.php';
require_once '../entities/Produits.php';


//connexion
$pdo = Connexion::seConnecter("bd.ini");
$pdo->beginTransaction();


/*
 * SELECT ALL
 */
echo "<hr>SELECT ALL<hr>";
//Faire appel à l'accesseur selectAll de la class ProduitsDAO'
$tEnrs = ProduitsDAO::selectAll($pdo);
//echo "<pre>";
//var_dump($tEnrs);
//echo "</pre>";
//Récupération des données et affichage
foreach ($tEnrs as $val) {
    $enr = new Produits($val["id_produit"]
            , $val["produit"], $val["id_categorie"]);
    echo "Id_produit: " . $enr->getIdProduit() . " Produit: "
    . $enr->getProduit() . " Id_categorie: " . $enr->getIdCategorie() . "<br>";
}

/*
 * SelectAllByIDCategorie
 */
echo "<hr>SELECT ALL BY ID CATEGORIE<hr>";
//Création de l'objet pour tester la fonction
$objet = new Produits(17, 'PHP', 2);
//Appel à la fonction selectALLByIDCategorie de l'ojet ProduitsDAO'
$tEnrs = ProduitsDAO::selectAllByIDCategorie($pdo, $objet);
//echo "<pre>";
//var_dump($tEnrs);
//echo "</pre>";
//Si le return de la fonction est null afficher un message d'erreur'
if ($tEnrs == NULL) {
    echo "Cette catégorie n'hexiste pas";
//Sinon Afficher le résultat
} else {
    echo "Produit de catégorie: " . $objet->getIdCategorie() . "<br><br>";
    foreach ($tEnrs as $val) {
        $enr = new Produits($val["id_produit"]
                , $val["produit"], $val["id_categorie"]);
        echo "Id_produit: " . $enr->getIdProduit()
        . "  | Produit: " . $enr->getProduit() . "<br>";
    }
}


/*
 * INSERT
 */
//echo "<hr>INSERT<hr>";
//$objet = new Produits(1,"A+",2);
//$liAffecte = ProduitsDAO::insert($pdo, $objet);
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
//$objet = new Produits(32, "A+", 2);
//$liAffecte = ProduitsDAO::deleteByProduit($pdo, $objet);
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
//$objet = new Produits(15, "Java", 2);
//$newObjet = new Produits(15, "JAVA", 2);
//
//$liAffecte = ProduitsDAO::update($pdo, $objet, $newObjet);
//if ($liAffecte == 1) {
//    $pdo->commit();
//} else {
//    $pdo->rollBack();
//}
//echo "Modifié : $liAffecte" . "<br>";



/*
 * Déconnexion
 */
Connexion::seDeconnecter($pdo);
?>