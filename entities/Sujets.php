<?php

// --- Sujets.php

class Sujets {

    // --- Propriétés
    private $idSujet;
    private $sujet;
    private $idProduit;

    // --- Méthodes
    function __construct($idSujet, $sujet, $idProduit) {
        $this->idSujet = $idSujet;
        $this->sujet = $sujet;
        $this->idProduit = $idProduit;
    }

    function getIdSujet() {
        return $this->idSujet;
    }

    function getSujet() {
        return $this->sujet;
    }

    function getIdProduit() {
        return $this->idProduit;
    }

    function setIdSujet($idSujet) {
        $this->idSujet = $idSujet;
    }

    function setSujet($sujet) {
        $this->sujet = $sujet;
    }

    function setIdProduit($idProduit) {
        $this->idProduit = $idProduit;
    }

}
