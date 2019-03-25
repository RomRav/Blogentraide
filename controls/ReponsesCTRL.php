<?php

/*
  CategoriesCTRL.php
 */
//Specifier les pages necessaires dans ce fichier
require_once '../daos/Connexion.php';
require_once '../daos/ReponsesDAO.php';
require_once '../daos/QuestionsDAO.php';
require_once '../entities/Reponses.php';
require_once '../entities/Questions.php';

$message = "";
$cible = "";

//Récupérer dans des variables les contenus du formulaire
$idReponse = filter_input(INPUT_POST, "idReponse");
$idQuestion = filter_input(INPUT_POST, "idQuestion");
$formReponse = filter_input(INPUT_POST, "formReponse");
$bouton = filter_input(INPUT_POST, "btValider");
$ajout = filter_input(INPUT_POST, "ajout");
$upd = filter_input(INPUT_POST, "upd");
$supp = filter_input(INPUT_POST, "supp");
//echo $formReponse;
//Connexion
$pdo = Connexion::seConnecter("../daos/bd.ini");


//Récupération de la liste des catégories à afficher dans une liste dans l'IHM
//Appel methode selectAll categories
$tEnrs = ReponsesDAO::selectAll($pdo);

$selectReponses = '';
for ($i = 0; $i < count($tEnrs); $i++) {
    $o = $tEnrs[$i];
    $selectReponses .= "<option value='" . $o->getIdReponse() . "'>" . $o->getReponse() . "</option>";
}
//echo "<pre>";
//var_dump($o);
//echo "</pre>";
$tEnrsQuestion = QuestionsDAO::selectAll($pdo);

$selectQuestions = '';
for ($i = 0; $i < count($tEnrsQuestion); $i++) {
    $o = $tEnrsQuestion[$i];
    $selectQuestions .= "<option value='" . $o->getIdQuestion() . "'>" . $o->getQuestion() . "</option>";
}

//Création de la variable date
if ($bouton != NULL) {
    $date = date("Y-m-d H:i:s");
}



if ($bouton == "Ajouter") {
    if ($formReponse != NULL) {


        //Appel a la fonction seConnecter
        // $pdo = Connexion::seConnecter("../daos/bd.ini");
        //Debut de la trasaction
        $pdo->beginTransaction();

        //Création d'un object categories envoyer a la fonction de création
        $obj = new reponses(0, $formReponse, $idQuestion, $date, 1);

        //Appel à la fonction en envoyant le contenu de la connexion pdo et le tableau des données
        $liAjout = ReponsesDAO::insert($pdo, $obj);
        //Si la transaction c'est bien déroulé
        if ($liAjout == 1) {
            //Valider définitivement les modification dans la base de donnée
            $pdo->commit();
            //Indiquer l'adresse cible a renvoyé en fin de page
            $cible = "ReponsesIHM.php";
            //Envoyer le message de validation 
            $message = "Ajout validé.<br>";
        } else {
            //Annuler les modification dans la base de donnée
            $pdo->rollBack();
            //Indiquer l'adresse cible a renvoyé en fin de page
            $cible = "ReponsesIHM.php";
            //Envoyer le message de validation 
            $message = "Ajout annulé.<br>";
        }
        Connexion::seDeconnecter($pdo);
    } else {
        $cible = "ReponsesIHM.php";
        //Envoyer le message de validation 
        $message = "Saisie vide.<br>";
    }
}
//Si on clique sur le bouton modifier
if ($bouton == "Mise a jour") {

    try {
        //Appel a la fonction seConnecter
        //$pdo = Connexion::seConnecter("../daos/bd.ini");
        //Debut de la trasaction
        $pdo->beginTransaction();

        //Création d'un object categories envoyer a la fonction de modification
        $obj = new reponses($idReponse, $formReponse, $idQuestion, $date, 1);

        //Appel à la fonction en envoyant le contenu de la connexion pdo et le tableau des données
        $liModifier = ReponsesDAO::update($pdo, $obj);
        //Si la transaction c'est bien déroulé
        if ($liModifier == 1) {
            //Valider définitivement les modification dans la base de donnée
            $pdo->commit();
            //Indiquer l'adresse cible a renvoyé en fin de page
            $cible = "ReponsesIHM.php";
            //Envoyer le message de validation 
            $message = "Modification validé.<br>";
        } else {
            //Annuler les modification dans la base de donnée
            $pdo->rollBack();
            //Indiquer l'adresse cible a renvoyé en fin de page
            $cible = "ReponsesIHM.php";
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
    $obj = new reponses($supp, "", 1, 1, "2018-01-21");

    //Appel à la fonction en envoyant le contenu de la connexion pdo et le tableau des données
    $liSupprimer = ReponsesDAO::delete($pdo, $obj);
    //Si la transaction c'est bien déroulé
    if ($liSupprimer == 1) {
        //Valider définitivement les modification dans la base de donnée
        $pdo->commit();
        //Indiquer l'adresse cible a renvoyé en fin de page
        $cible = "ReponsesIHM.php";
        //Envoyer le message de validation 
        $message = "Suppression validé.<br>";
    } else {
        //Annuler les modification dans la base de donnée
        $pdo->rollBack();
        //Indiquer l'adresse cible a renvoyé en fin de page
        $cible = "ReponsesIHM.php";
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