<?php

/*
  CategoriesCTRL.php
 */
//Specifier les pages necessaires dans ce fichier
require_once '../daos/Connexion.php';
require_once '../daos/SujetsDAO.php';
require_once '../daos/ProduitsDAO.php';
require_once '../entities/Sujets.php';
require_once '../entities/Produits.php';

$message = "";
$cible = "";

//Récupérer dans des variables les contenus du formulaire
$idProduit = filter_input(INPUT_POST, "idProduit");
$idSujet = filter_input(INPUT_POST, "idSujet");
$formSujet = filter_input(INPUT_POST, "formSujet");
$bouton = filter_input(INPUT_POST, "btValider");
$ajout = filter_input(INPUT_POST, "ajout");
$upd = filter_input(INPUT_POST, "upd");
$supp = filter_input(INPUT_POST, "supp");
//echo $idProduit;
//echo $idSujet;
//echo $formSujet;
//Connexion
$pdo = Connexion::seConnecter("../daos/bd.ini");


//Récupération de la liste des catégories à afficher dans une liste dans l'IHM
//Appel methode selectAll categories
$tEnrs = SujetsDAO::selectAll($pdo);

$selectSujet = '';
for ($i = 0; $i < count($tEnrs); $i++) {
    $o = $tEnrs[$i];
    $selectSujet .= "<option value='" . $o->getIdSujet() . "'>" . $o->getSujet() . "</option>";
}
//echo "<pre>";
//var_dump($o);
//echo "</pre>";
$tEnrsProd = ProduitsDAO::selectAll($pdo);

$selectProduit = '';
for ($i = 0; $i < count($tEnrsProd); $i++) {
    $o = $tEnrsProd[$i];
    $selectProduit .= "<option value='" . $o->getIdProduit() . "'>" . $o->getProduit() . "</option>";
}

if ($bouton == "Ajouter") {
    if ($formSujet != NULL) {


        //Appel a la fonction seConnecter
        // $pdo = Connexion::seConnecter("../daos/bd.ini");
        //Debut de la trasaction
        $pdo->beginTransaction();

        //Création d'un object categories envoyer a la fonction de création
        $obj = new Sujets(0, $formSujet, $idProduit);

        //Appel à la fonction en envoyant le contenu de la connexion pdo et le tableau des données
        $liAjout = SujetsDAO::insert($pdo, $obj);
        //Si la transaction c'est bien déroulé
        if ($liAjout == 1) {
            //Valider définitivement les modification dans la base de donnée
            $pdo->commit();
            //Indiquer l'adresse cible a renvoyé en fin de page
            $cible = "SujetsIHM.php";
            //Envoyer le message de validation 
            $message = "Ajout validé.<br>";
        } else {
            //Annuler les modification dans la base de donnée
            $pdo->rollBack();
            //Indiquer l'adresse cible a renvoyé en fin de page
            $cible = "SujetsIHM.php";
            //Envoyer le message de validation 
            $message = "Ajout annulé.<br>";
        }
        Connexion::seDeconnecter($pdo);
    } else {
        $cible = "SujetsIHM.php";
        //Envoyer le message de validation 
        $message = "Saisie vide.<br>";
    }
}
//Si on clique sur le mouton modifier
if ($bouton == "Mise a jour") {

    try {
        //Appel a la fonction seConnecter
        //$pdo = Connexion::seConnecter("../daos/bd.ini");
        //Debut de la trasaction
        $pdo->beginTransaction();

        //Création d'un object categories envoyer a la fonction de modification
        $obj = new Sujets($idSujet, $formSujet, $idProduit);

        //Appel à la fonction en envoyant le contenu de la connexion pdo et le tableau des données
        $liModifier = SujetsDAO::update($pdo, $obj);
        //Si la transaction c'est bien déroulé
        if ($liModifier == 1) {
            //Valider définitivement les modification dans la base de donnée
            $pdo->commit();
            //Indiquer l'adresse cible a renvoyé en fin de page
            $cible = "SujetsIHM.php";
            //Envoyer le message de validation 
            $message = "Modification validé.<br>";
        } else {
            //Annuler les modification dans la base de donnée
            $pdo->rollBack();
            //Indiquer l'adresse cible a renvoyé en fin de page
            $cible = "SujetsIHM.php";
            //Envoyer le message de validation 
            $message = "Modification annulé.<br>";
        }
        Connexion::seDeconnecter($pdo);
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}
//Si on clique sur le bouton supprimer
if ($bouton == "Supprimer") {
    //Appel a la fonction seConnecter
    //$pdo = Connexion::seConnecter("../daos/bd.ini");
    //Debut de la trasaction
    $pdo->beginTransaction();


    //Création d'un object categories envoyer à la fonction de supp
    $obj = new Sujets($supp, "", 0);

    //Appel à la fonction en envoyant le contenu de la connexion pdo et le tableau des données
    $liSupprimer = SujetsDAO::delete($pdo, $obj);
    //Si la transaction c'est bien déroulé
    if ($liSupprimer == 1) {
        //Valider définitivement les modification dans la base de donnée
        $pdo->commit();
        //Indiquer l'adresse cible a renvoyé en fin de page
        $cible = "SujetsIHM.php";
        //Envoyer le message de validation 
        $message = "Suppression validé.<br>";
    } else {
        //Annuler les modification dans la base de donnée
        $pdo->rollBack();
        //Indiquer l'adresse cible a renvoyé en fin de page
        $cible = "SujetsIHM.php";
        //Envoyer le message de validation 
        $message = "Suppression annulé.<br>";
    }
    Connexion::seDeconnecter($pdo);
}

if ($message != "") {
    //Retour vers la page SujetsIHM
    include "../boundaries/$cible";
}
?>