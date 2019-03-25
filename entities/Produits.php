<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Produit
 *
 * @author Administrateur
 */
class Produits {

    //put your code here
    private $idProduit;
    private $produit;
    private $idCategorie;

    function __construct($idProduit, $produit, $idCategorie) {
        $this->idProduit = $idProduit;
        $this->produit = $produit;
        $this->idCategorie = $idCategorie;
    }

    function getIdProduit() {
        return $this->idProduit;
    }

    function getProduit() {
        return $this->produit;
    }

    function getIdCategorie() {
        return $this->idCategorie;
    }

    function setIdProduit($idProduit) {
        $this->idProduit = $idProduit;
    }

    function setProduit($produit) {
        $this->produit = $produit;
    }

    function setIdCategorie($idCategorie) {
        $this->idCategorie = $idCategorie;
    }

}
