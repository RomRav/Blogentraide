<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UtilisateursClass
 *
 * @author Administrateur
 */
class Questions {

    private $idQuestion;
    private $question;
    private $idSujet;
    private $idUtilisateur;
    private $dateQuestion;

    function __construct($idQuestion, $question, $idSujet, $idUtilisateur, $dateQuestion) {
        $this->idQuestion = $idQuestion;
        $this->question = $question;
        $this->idSujet = $idSujet;
        $this->idUtilisateur = $idUtilisateur;
        $this->dateQuestion = $dateQuestion;
    }

    public function getIdQuestion() {
        return $this->idQuestion;
    }

    public function getQuestion() {
        return $this->question;
    }

    public function getIdSujet() {
        return $this->idSujet;
    }

    public function getIdUtilisateur() {
        return $this->idUtilisateur;
    }

    public function getDateQuestion() {
        return $this->dateQuestion;
    }

    public function setIdQuestion($idQuestion) {
        $this->idQuestion = $idQuestion;
    }

    public function setQuestion($question) {
        $this->question = $question;
    }

    public function setIdSujet($idSujet) {
        $this->idSujet = $idSujet;
    }

    public function setIdUtilisateur($idUtilisateur) {
        $this->idUtilisateur = $idUtilisateur;
    }

    public function setDateQuestion($dateQuestion) {
        $this->dateQuestion = $dateQuestion;
    }

}
