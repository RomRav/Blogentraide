<?php

/*
  CategoriesCTRL.php
 */
//Specifier les pages necessaires dans ce fichier
require_once '../daos/Connexion.php';
require_once '../daos/CategoriesDAO.php';
require_once '../entities/Categories.php';


$message = "";
$cible = "";

//Récupérer dans des variables les contenus du formulaire
$cat = filter_input(INPUT_POST, "cat");
$formCategorie = filter_input(INPUT_POST, "categorie");
$bouton = filter_input(INPUT_POST, "btValider");
$ajout = filter_input(INPUT_POST, "ajout");
$upd = filter_input(INPUT_POST, "upd");
$supp = filter_input(INPUT_POST, "supp");
echo $supp;
echo $upd;
//Connexion
$pdo = Connexion::seConnecter("../daos/bd.ini");


//Récupération de la liste des catégories à afficher dans une liste dans l'IHM
//Appel methode selectAll categories
$tEnrs = CategoriesDAO::selectAll($pdo);
$selectCategorie = '';
for ($i = 0; $i < count($tEnrs); $i++) {
    $o = $tEnrs[$i];
    $selectCategorie .= "<option value='" . $o->getIdcategorie() . "'>" . $o->getcategorie() . "</option>";
}



if ($bouton == "Ajouter") {
    if ($formCategorie != NULL) {


        //Appel a la fonction seConnecter
        $pdo = Connexion::seConnecter("../daos/bd.ini");
        //Debut de la trasaction
        $pdo->beginTransaction();

        //Création d'un object categories envoyer a la fonction de création
        $obj = new categories(0, $formCategorie);

        //Appel à la fonction en envoyant le contenu de la connexion pdo et le tableau des données
        $liAjout = CategoriesDAO::insert($pdo, $obj);
        //Si la transaction c'est bien déroulé
        if ($liAjout == 1) {
            //Valider définitivement les modification dans la base de donnée
            $pdo->commit();
            //Indiquer l'adresse cible a renvoyé en fin de page
            $cible = "CategoriesIHM.php";
            //Envoyer le message de validation 
            $message = "Ajout validé.<br>";
        } else {
            //Annuler les modification dans la base de donnée
            $pdo->rollBack();
            //Indiquer l'adresse cible a renvoyé en fin de page
            $cible = "CategoriesIHM.php";
            //Envoyer le message de validation 
            $message = "Ajout annulé.<br>";
        }
        Connexion::seDeconnecter($pdo);
    } else {
        $cible = "CategoriesIHM.php";
        //Envoyer le message de validation 
        $message = "Saisie vide.<br>";
    }
}
//Si on clique sur le mouton modifier
if ($bouton == "Mise a jour") {


    //Appel a la fonction seConnecter
    $pdo = Connexion::seConnecter("../daos/bd.ini");
    //Debut de la trasaction
    $pdo->beginTransaction();

    //Création d'un object categories envoyer a la fonction de modification
    $obj = new Categories($cat, $formCategorie);

    //Appel à la fonction en envoyant le contenu de la connexion pdo et le tableau des données
    $liModifier = CategoriesDAO::update($pdo, $obj);
    //Si la transaction c'est bien déroulé
    if ($liModifier == 1) {
        //Valider définitivement les modification dans la base de donnée
        $pdo->commit();
        //Indiquer l'adresse cible a renvoyé en fin de page
        $cible = "CategoriesIHM.php";
        //Envoyer le message de validation 
        $message = "Modification validé.<br>";
    } else {
        //Annuler les modification dans la base de donnée
        $pdo->rollBack();
        //Indiquer l'adresse cible a renvoyé en fin de page
        $cible = "CategoriesIHM.php";
        //Envoyer le message de validation 
        $message = "Modification annulé.<br>";
    }
    Connexion::seDeconnecter($pdo);
}
//Si on clique sur le bouton supprimer
if ($bouton == "Supprimer") {
    //Appel a la fonction seConnecter
    $pdo = Connexion::seConnecter("../daos/bd.ini");
    //Debut de la trasaction
    $pdo->beginTransaction();


    //Création d'un object categories envoyer à la fonction de supp
    $obj = new Categories($supp, "");

    //Appel à la fonction en envoyant le contenu de la connexion pdo et le tableau des données
    $liSupprimer = CategoriesDAO::delete($pdo, $obj);
    //Si la transaction c'est bien déroulé
    if ($liSupprimer == 1) {
        //Valider définitivement les modification dans la base de donnée
        $pdo->commit();
        //Indiquer l'adresse cible a renvoyé en fin de page
        $cible = "CategoriesIHM.php";
        //Envoyer le message de validation 
        $message = "Suppression validé.<br>";
    } else {
        //Annuler les modification dans la base de donnée
        $pdo->rollBack();
        //Indiquer l'adresse cible a renvoyé en fin de page
        $cible = "CategoriesIHM.php";
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