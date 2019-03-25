<?php

/*
  CategoriesDAO.php
 */
/*
  LE DAO de la table [categories] de la BD [blogentraide]
 */
declare(strict_types = 1);

require_once '../entities/Sujets.php';
require_once 'IDAO.php';

class SujetsDAO implements IDAO {

    /**
     * 
     * @param PDO $pdo
     * @return array
     */
    public static function selectAll(PDO $pdo): array {
        $liste = array();
        try {
            $sql = 'SELECT * FROM blogentraide.sujets';
            $lrs = $pdo->query($sql);
            $lrs->setFetchMode(PDO::FETCH_NUM);
            while ($enr = $lrs->fetch()) {
                $objet = new Sujets($enr[0], $enr[1], $enr[2]);

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
    public static function selectOne(PDO $pdo, int $id): Object {
        try {
            $sql = 'SELECT * FROM blogentraide.sujets WHERE id_sujet = ?';
            $lcmd = $pdo->prepare($sql);
            $lcmd->bindValue(1, $id);
            $lrs = $lcmd->execute();
            $enr = $lcmd->fetch(PDO::FETCH_ASSOC);
            $objet = new Categories($enr['id_sujet'], $enr['sujet'], $enr['id_produit']);
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
    public static function delete(PDO $pdo, Object $objet): int {
        $liAffectes = 0;
        try {
            $sql = "DELETE FROM blogentraide.sujets WHERE id_sujet = ?";
            $lcmd = $pdo->prepare($sql);
            $lcmd->bindValue(1, $objet->getIdSujet());
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
    public static function insert(PDO $pdo, Object $objet): int {
        $liAffectes = 0;
        try {
            $sql = "INSERT INTO blogentraide.sujets(sujet,id_produit) VALUES(?,?)";
            $lcmd = $pdo->prepare($sql);
            $lcmd->bindValue(1, $objet->getSujet());
            $lcmd->bindValue(2, $objet->getIdProduit());

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
    public static function update(PDO $pdo, Object $objet): int {
        $liAffectes = 0;
        try {
            $sql = "UPDATE blogentraide.sujets SET sujet=?, id_produit=? WHERE id_sujet=?";
            $lcmd = $pdo->prepare($sql);
            $lcmd->bindValue(1, $objet->getSujet());
            $lcmd->bindValue(2, $objet->getIdProduit());
            $lcmd->bindValue(3, $objet->getIdSujet());

            $lcmd->execute();
            $liAffectes = $lcmd->rowcount();
        } catch (PDOException $e) {
            $liAffectes = -1;
        }
        return $liAffectes;
    }

}

?>