<?php

/*
  ProduitsDAO.php
 */
/*
  LE DAO de la table [produits] de la BD [blogentraide]
 */
declare(strict_types = 1);

require_once '../entities/Produits.php';
require_once 'IDAO.php';

class ProduitsDAO implements IDAO {

    /**
     * 
     * @param PDO $pdo
     * @return array
     */
    public static function selectAll(PDO $pdo) {
        $liste = array();
        try {
            $sql = 'SELECT * FROM blogentraide.produits';
            $lrs = $pdo->query($sql);
            $lrs->setFetchMode(PDO::FETCH_ASSOC);
            while ($enr = $lrs->fetch()) {
                $objet = new Produits($enr['id_produit'], $enr['produit'], $enr['id_categorie']);
//                $objet->setIdProduit($enr['id_produit']);
//                $objet->setProduit($enr['produit']);
//                $objet->setIdCategorie($enr['id_categorie']);
                $liste[] = $objet;
            }
        } catch (PDOException $e) {
            $objet = null;
            $liste[] = $objet;
        }
        return $liste;
    }

    /**
     * 
     * @param PDO $pdo
     * @param int $id
     * @return \Produits
     */
    public static function selectOne(PDO $pdo, int $id) {
        try {
            $sql = 'SELECT * FROM blogentraide.produits WHERE id_produit = ?';
            $lcmd = $pdo->prepare($sql);
            $lcmd->bindValue(1, $id);
            $lrs = $lcmd->execute();
            $enr = $lcmd->fetch(PDO::FETCH_ASSOC);
            $objet = new Produits($enr['id_produit'], $enr['id_produit'], $enr['id_categorie']);
//            $objet->setIdProduit($enr['id_produit']);
//            $objet->setProduit($enr['produit']);
//            $objet->setIdCategorie($enr['id_categorie']);
        } catch (PDOException $e) {
            $objet = null;
        }
        return $objet;
    }

    /**
     * 
     * @param PDO $pdo
     * @param Produits $objet
     * @return int
     */
    public static function delete(PDO $pdo, Object $objet) {
        $liAffectes = 0;
        try {
            $sql = "DELETE FROM blogentraide.produits WHERE id_produit = ?";
            $lcmd = $pdo->prepare($sql);
            $lcmd->bindValue(1, $objet->getIdProduit());
            $lcmd->execute();
            $liAffectes = $lcmd->rowcount();
        } catch (PDOException $e) {
            $liAffectes = -1;
        }
        return $liAffectes;
    }

    /**
     * 
     * @param PDO $pdo
     * @param Produits $objet
     * @return int
     */
    public static function insert(PDO $pdo, Object $objet) {
        $liAffectes = 0;
        try {
            $sql = "INSERT INTO blogentraide.produits(produit,id_categorie) VALUES(?,?)";
            $lcmd = $pdo->prepare($sql);
            $lcmd->bindValue(1, $objet->getProduit());
            $lcmd->bindValue(2, $objet->getIdCategorie());

            $lcmd->execute();
            $liAffectes = $lcmd->rowcount();
        } catch (PDOException $e) {
            $liAffectes = -1;
        }
        return $liAffectes;
    }

    /**
     * 
     * @param PDO $pdo
     * @param Produits $objet
     * @return int
     */
    public static function update(PDO $pdo, Object $objet) {
        $liAffectes = 0;
        try {
            $sql = "UPDATE blogentraide.produits SET produit=?,id_categorie=? WHERE id_produit=?";
            $lcmd = $pdo->prepare($sql);
            $lcmd->bindValue(1, $objet->getProduit());
            $lcmd->bindValue(2, $objet->getIdCategorie());
            $lcmd->bindValue(3, $objet->getIdproduit());

            $lcmd->execute();
            $liAffectes = $lcmd->rowcount();
        } catch (PDOException $e) {
            $liAffectes = -1;
        }
        return $liAffectes;
    }

}

?>
