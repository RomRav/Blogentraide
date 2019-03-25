<?php

class Categories {

    //put your code here
    private $idCategorie;
    private $categorie;

    function __construct($idCategorie, $categorie) {
        $this->idCategorie = $idCategorie;
        $this->categorie = $categorie;
    }

    function getIdCategorie() {
        return $this->idCategorie;
    }

    function getCategorie() {
        return $this->categorie;
    }

    function setIdCategorie($idCategorie) {
        $this->idCategorie = $idCategorie;
    }

    function setCategorie($categorie) {
        $this->categorie = $categorie;
    }

}
