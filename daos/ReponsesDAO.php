<?php

/*
  ReponsesDAO.php
 */
/*
  LE DAO de la table [reponses] de la BD [blogentraide]
 */
declare(strict_types = 1);

require_once '../entities/Reponses.php';

class ReponsesDAO {

    /**
     * 
     * @return array
     */
    public function selectAll(PDO $pdo) {
        $liste = array();
        try {
            $sql = 'SELECT * FROM blogentraide.reponses';
            $lrs = $pdo->query($sql);
            $lrs->setFetchMode(PDO::FETCH_ASSOC);
            while ($enr = $lrs->fetch()) {
                $objet = new reponses($enr['id_reponse'], $enr['reponse'], $enr['id_question'], $enr['date_reponse'], $enr['id_utilisateur']);
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
     * @param int $id
     * @return \Reponses
     */
    public function selectOneByIDQuestion(PDO $pdo, Object $objet) {
        try {
            $sql = 'SELECT * FROM blogentraide.questions WHERE id_question = ?';
            $lcmd = $pdo->prepare($sql);
            $lcmd->bindValue(1, $id);
            $lrs = $lcmd->execute();
            $enr = $lcmd->fetch(PDO::FETCH_ASSOC);
            $objet = new Reponses($enr['id_reponse'], $enr['reponse'], $enr['id_question'], $enr['date_question'], $enr['id_utilisateur']);
        } catch (PDOException $e) {
            $objet = null;
        }
        return $objet;
    }

    /**
     * 
     * @param Questions $objet
     * @return int
     */
    public function delete(PDO $pdo, Object $objet) {
        $liAffectes = 0;
        try {
            $sql = "DELETE FROM blogentraide.reponses WHERE id_reponse = ?";
            $lcmd = $pdo->prepare($sql);
            $lcmd->bindValue(1, $objet->getIdReponse());
            $lcmd->execute();
            $liAffectes = $lcmd->rowcount();
        } catch (PDOException $e) {
            $liAffectes = -1;
        }
        return $liAffectes;
    }

    /**
     * 
     * @param Reponses $objet
     * @return int
     */
    public function insert(PDO $pdo, Object $objet) {
        $liAffectes = 0;
        try {
            $sql = "INSERT INTO blogentraide.reponses(reponse,id_question,id_utilisateur,date_reponse) VALUES(?,?,?,?)";
            $lcmd = $pdo->prepare($sql);
            $lcmd->bindValue(1, $objet->getReponse());
            $lcmd->bindValue(2, $objet->getIdQuestion());
            $lcmd->bindValue(3, $objet->getIdUtilisateur());
            $lcmd->bindValue(4, $objet->getDateReponse());

            $lcmd->execute();
            $liAffectes = $lcmd->rowcount();
        } catch (PDOException $e) {
            echo $e->getMessage();
            $liAffectes = -1;
        }
        return $liAffectes;
    }

    /**
     * 
     * @param Reponses $objet
     * @return int
     */
    public function update(PDO $pdo, Object $objet) {
        $liAffectes = 0;
        try {
            $sql = "UPDATE blogentraide.reponses SET reponse=?,id_question=?,id_utilisateur=?,date_reponse=? WHERE id_question=?";
            $lcmd = $pdo->prepare($sql);
            $lcmd->bindValue(1, $objet->getReponse());
            $lcmd->bindValue(2, $objet->getIdQuestion());
            $lcmd->bindValue(3, $objet->getIdUtilisateur());
            $lcmd->bindValue(4, $objet->getDateReponse());
            $lcmd->bindValue(5, $objet->getIdQuestion());

            $lcmd->execute();
            $liAffectes = $lcmd->rowcount();
        } catch (PDOException $e) {
            echo $e->getMessage();
            $liAffectes = -1;
        }
        return $liAffectes;
    }

}

?>
