<?php

/*
  CategoriesDAO.php
 */
/*
  LE DAO de la table [categories] de la BD [blogentraide]
 */
declare(strict_types = 1);

require_once '../entities/Categories.php';
require_once 'IDAO.php';

class CategoriesDAO implements IDAO {

    /**
     * 
     * @param PDO $pdo
     * @return array
     */
    public static function selectAll(PDO $pdo) {
        $liste = array();
        try {
            $sql = 'SELECT * FROM blogentraide.categories';
            $lrs = $pdo->query($sql);
            $lrs->setFetchMode(PDO::FETCH_ASSOC);
            while ($enr = $lrs->fetch()) {
                $objet = new Categories($enr['id_categorie'], $enr['categorie']);

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
     * @return \Categories
     */
    public static function selectOne(PDO $pdo, int $id) {
        try {
            $sql = 'SELECT * FROM blogentraide.categories WHERE id_categorie = ?';
            $lcmd = $pdo->prepare($sql);
            $lcmd->bindValue(1, $id);
            $lrs = $lcmd->execute();
            $enr = $lcmd->fetch(PDO::FETCH_ASSOC);
            $objet = new Categories($enr['id_categorie'], $enr['categorie']);
//          
        } catch (PDOException $e) {
            $objet = null;
        }
        return $objet;
    }

    /**
     * 
     * @param PDO $pdo
     * @param Categories $objet
     * @return int
     */
    public static function delete(PDO $pdo, Object $objet) {
        $liAffectes = 0;
        try {
            $sql = "DELETE FROM blogentraide.categories WHERE id_categorie = ?";
            $lcmd = $pdo->prepare($sql);
            $lcmd->bindValue(1, $objet->getIdCategorie());
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
     * @param Categories $objet
     * @return int
     */
    public static function insert(PDO $pdo, Object $objet) {
        $liAffectes = 0;
        try {
            $sql = "INSERT INTO blogentraide.categories(categorie) VALUES(?)";
            $lcmd = $pdo->prepare($sql);
            $lcmd->bindValue(1, $objet->getCategorie());


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
     * @param Categories $objet
     * @return int
     */
    public static function update(PDO $pdo, Object $objet) {
        $liAffectes = 0;
        try {
            $sql = "UPDATE blogentraide.categories SET categorie=? WHERE id_categorie=?";
            $lcmd = $pdo->prepare($sql);
            $lcmd->bindValue(1, $objet->getCategorie());
            $lcmd->bindValue(2, $objet->getIdCategorie());

            $lcmd->execute();
            $liAffectes = $lcmd->rowcount();
        } catch (PDOException $e) {
            $liAffectes = -1;
        }
        return $liAffectes;
    }

}

?>