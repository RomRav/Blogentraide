<?php

class Utilisateurs {

    //put your code here
    private $idUtilisateur;
    private $pseudo;
    private $mdp;

    function __construct($idUtilisateur, $pseudo, $mdp) {
        $this->idUtilisateur = $idUtilisateur;
        $this->pseudo = $pseudo;
        $this->mdp = $mdp;
    }

    function getIdUtilisateur() {
        return $this->idUtilisateur;
    }

    function getPseudo() {
        return $this->pseudo;
    }

    function getMdp() {
        return $this->mdp;
    }

    function setIdUtilisateur($idUtilisateur) {
        $this->idUtilisateur = $idUtilisateur;
    }

    function setPseudo($pseudo) {
        $this->pseudo = $pseudo;
    }

    function setMdp($mdp) {
        $this->mdp = $mdp;
    }

}
