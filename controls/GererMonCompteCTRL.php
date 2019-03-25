<?php

/*
  GererMonCompteCTRL.php
 */
//Specifier les pages necessaires dans ce fichier
require_once '../daos/Connexion.php';
require_once '../daos/UtilisateursDAO.php';

//Début de l'utilisation des session
session_start();

//Récupérer dans des variables les contenus du formulaire
$formMdp = filter_input(INPUT_POST, "mdp");
$BoutModifier = filter_input(INPUT_POST, "btValiderModification");
$BoutSupprimer = filter_input(INPUT_POST, "btValiderSuppression");



//Si on clique sur le mouton modifier
if ($BoutModifier !== NULL) {
    if ($formMdp != NULL) {


        //Appel a la fonction seConnecter
        $pdo = seConnecter("../daos/bd.ini");
        //Debut de la trasaction
        $pdo->beginTransaction();

        //Création du tableau des données à envoyer a la fonction de mofodication
        $tab = array();
        $tab["pseudo"] = $_SESSION["pseudo"];
        $tab["mdp"] = $formMdp;

        //Appel à la fonction en envoyant le contenu de la connexion pdo et le tableau des données
        $liModifier = updateByPseudo($pdo, $tab);
        //Si la transaction c'est bien déroulé
        if ($liModifier == 1) {
            //Valider définitivement les modification dans la base de donnée
            $pdo->commit();
            //Indiquer l'adresse cible a renvoyé en fin de page
            $cible = "GererMonCompteIHM.php";
            //Envoyer le message de validation 
            $message = "Modification validé.<br>";
        } else {
            //Annuler les modification dans la base de donnée
            $pdo->rollBack();
            //Indiquer l'adresse cible a renvoyé en fin de page
            $cible = "GererMonCompteIHM.php";
            //Envoyer le message de validation 
            $message = "Modification annulé.<br>";
        }
        seDeconnecter($pdo);
    } else {
        $cible = "GererMonCompteIHM.php";
        //Envoyer le message de validation 
        $message = "Le mot de passe ne peux être vide.<br>";
    }
}
//Si on clique sur le bouton supprimer
if ($BoutSupprimer !== NULL) {
    //Appel a la fonction seConnecter
    $pdo = seConnecter("../daos/bd.ini");
    //Debut de la trasaction
    $pdo->beginTransaction();

    //Création d'un variable à la valeur de la session pseudo
    $cessionPseudo = $_SESSION["pseudo"];

    //Création du tableau des données à envoyer a la fonction de mofodication
    $tab = array();
    $tab["pseudo"] = $cessionPseudo;
    $tab["mdp"] = $formMdp;

    //Appel à la fonction en envoyant le contenu de la connexion pdo et le tableau des données
    $liSupprimer = deleteByPseudo($pdo, $tab);
    //Si la transaction c'est bien déroulé
    if ($liSupprimer == 1) {
        //Valider définitivement les modification dans la base de donnée
        $pdo->commit();
        //Indiquer l'adresse cible a renvoyé en fin de page
        $cible = "GererMonCompteIHM.php";
        //Envoyer le message de validation 
        $message = "Suppression validé.<br>";
    } else {
        //Annuler les modification dans la base de donnée
        $pdo->rollBack();
        //Indiquer l'adresse cible a renvoyé en fin de page
        $cible = "GererMonCompteIHM.php";
        //Envoyer le message de validation 
        $message = "Suppression annulé.<br>";
    }
    seDeconnecter($pdo);
}

//arret de l'utilisation des session
session_destroy();
//Retour vers la page GererMonCompteIHM
include "../boundaries/$cible";
?>