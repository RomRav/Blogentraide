<?php

/*
  ProduitsCTRL.php
 */
//Specifier les pages necessaires dans ce fichier
require_once '../daos/Connexion.php';
require_once '../daos/ProduitsDAO.php';
require_once '../daos/CategoriesDAO.php';
require_once '../entities/Categories.php';
require_once '../entities/Produits.php';


$message = "";
$cible = "";

//Récupérer dans des variables les contenus du formulaire
$formProduit = filter_input(INPUT_POST, "produit");
$categorie = filter_input(INPUT_POST, "cat");
$bouton = filter_input(INPUT_POST, "btValider");
$ajout = filter_input(INPUT_POST, "ajout");
$upd = filter_input(INPUT_POST, "upd");
$supp = filter_input(INPUT_POST, "supp");
//Connexion
$pdo = Connexion::seConnecter("../daos/bd.ini");

//Récupération de la liste des produits à afficher dans une liste dans l'IHM
//Appel methode selectAll produits
$tEnrs = ProduitsDAO::selectAll($pdo);
$selectProduit = '';
for ($i = 0; $i < count($tEnrs); $i++) {
    $o = $tEnrs[$i];
    $selectProduit .= "<option value='" . $o->getIdproduit() . "'>" . $o->getproduit() . "</option>";
}

//Récupération de la liste des catégories à afficher dans une liste dans l'IHM
//Appel methode selectAll categories
$tEnrs = CategoriesDAO::selectAll($pdo);
$selectCategorie = '';
for ($i = 0; $i < count($tEnrs); $i++) {
    $o = $tEnrs[$i];
    $selectCategorie .= "<option value='" . $o->getIdcategorie() . "'>" . $o->getcategorie() . "</option>";
}




if ($bouton == "Ajouter") {
    if ($formProduit != NULL) {

        //Appel a la fonction seConnecter
        //$pdo = Connexion::seConnecter("../daos/bd.ini");
        //Debut de la trasaction
        $pdo->beginTransaction();

        //Création d'un object produits envoyer a la fonction de création
        $obj = new Produits(0, $formProduit, $categorie);

        //Appel à la fonction en envoyant le contenu de la connexion pdo et le tableau des données
        $liAjout = ProduitsDAO::insert($pdo, $obj);
        echo $liAjout;
        //Si la transaction c'est bien déroulé
        if ($liAjout == 1) {
            //Valider définitivement les modification dans la base de donnée
            $pdo->commit();
            //Indiquer l'adresse cible a renvoyé en fin de page
            $cible = "ProduitsIHM.php";
            //Envoyer le message de validation 
            $message = "Ajout validé.<br>";
        } else {
            //Annuler les modification dans la base de donnée
            $pdo->rollBack();
            //Indiquer l'adresse cible a renvoyé en fin de page
            $cible = "ProduitsIHM.php";
            //Envoyer le message de validation 
            $message = "Ajout annulé.<br>";
        }
        Connexion::seDeconnecter($pdo);
    } else {
        $cible = "ProduitsIHM.php";
        //Envoyer le message de validation 
        $message = "Saisie vide.<br>";
    }
}
//Si on clique sur le mouton modifier
if ($bouton == "Mise a jour") {
    if ($formProduit != NULL) {

        //Appel a la fonction seConnecter
        $pdo = Connexion::seConnecter("../daos/bd.ini");
        //Debut de la trasaction
        $pdo->beginTransaction();

        //Création d'un object produits envoyer a la fonction de modification
        $obj = new Produits($upd, $formProduit, $categorie);

        //Appel à la fonction en envoyant le contenu de la connexion pdo et le tableau des données
        $liModifier = ProduitsDAO::update($pdo, $obj);
        //Si la transaction c'est bien déroulé
        if ($liModifier == 1) {
            //Valider définitivement les modification dans la base de donnée
            $pdo->commit();
            //Indiquer l'adresse cible a renvoyé en fin de page
            $cible = "ProduitsIHM.php";
            //Envoyer le message de validation 
            $message = "Modification validé.<br>";
        } else {
            //Annuler les modification dans la base de donnée
            $pdo->rollBack();
            //Indiquer l'adresse cible a renvoyé en fin de page
            $cible = "ProduitsIHM.php";
            //Envoyer le message de validation 
            $message = "Modification annulé.<br>";
        }
        Connexion::seDeconnecter($pdo);
    } else {
        $cible = "ProduitsIHM.php";
        //Envoyer le message de validation 
        $message = "Saisie vide.<br>";
    }
}
//Si on clique sur le bouton supprimer
if ($bouton == "Supprimer") {

    //Appel a la fonction seConnecter
    $pdo = Connexion::seConnecter("../daos/bd.ini");
    //Debut de la trasaction
    $pdo->beginTransaction();


    //Création d'un object produits envoyer à la fonction de supp
    $obj = new Produits($supp, "", $categorie);

    //Appel à la fonction en envoyant le contenu de la connexion pdo et le tableau des données
    $liSupprimer = ProduitsDAO::delete($pdo, $obj);
    //Si la transaction c'est bien déroulé
    if ($liSupprimer == 1) {
        //Valider définitivement les modification dans la base de donnée
        $pdo->commit();
        //Indiquer l'adresse cible a renvoyé en fin de page
        $cible = "ProduitsIHM.php";
        //Envoyer le message de validation 
        $message = "Suppression validé.<br>";
    } else {
        //Annuler les modification dans la base de donnée
        $pdo->rollBack();
        //Indiquer l'adresse cible a renvoyé en fin de page
        $cible = "ProduitsIHM.php";
        //Envoyer le message de validation 
        $message = "Suppression annulé.<br>";
    }
    Connexion::seDeconnecter($pdo);
}

if ($message != "") {
    //Retour vers la page GererMonCompteIHM
    include "../boundaries/$cible";
}
?>