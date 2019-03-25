<?php

// --- Personne.php
class reponses {

    private $idReponse;
    private $reponse;
    private $idQuestion;
    private $dateReponse;
    private $idUtilisateur;

    function __construct($idReponse, $reponse, $idQuestion, $dateReponse, $idUtilisateur) {
        $this->idReponse = $idReponse;
        $this->reponse = $reponse;
        $this->idQuestion = $idQuestion;
        $this->dateReponse = $dateReponse;
        $this->idUtilisateur = $idUtilisateur;
    }

    function getIdReponse() {
        return $this->idReponse;
    }

    function getReponse() {
        return $this->reponse;
    }

    function getIdQuestion() {
        return $this->idQuestion;
    }

    function getDateReponse() {
        return $this->dateReponse;
    }

    function getIdUtilisateur() {
        return $this->idUtilisateur;
    }

    function setIdReponse($idReponse) {
        $this->idReponse = $idReponse;
    }

    function setReponse($reponse) {
        $this->reponse = $reponse;
    }

    function setIdQuestion($idQuestion) {
        $this->idQuestion = $idQuestion;
    }

    function setDateReponse($dateReponse) {
        $this->dateReponse = $dateReponse;
    }

    function setIdUtilisateur($idUtilisateur) {
        $this->idUtilisateur = $idUtilisateur;
    }

}

?>
