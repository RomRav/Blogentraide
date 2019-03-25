<?php

/*
  QuestionsDAO.php
 */
/*
  LE DAO de la table [questions] de la BD [blogentraide]
 */
declare(strict_types = 1);

require_once '../entities/Questions.php';

class QuestionsDAO {

    /**
     * 
     * @return array
     */
    public function selectAll(PDO $pdo) {
        $liste = array();
        try {
            $sql = 'SELECT * FROM blogentraide.questions';
            $lrs = $pdo->query($sql);
            $lrs->setFetchMode(PDO::FETCH_ASSOC);
            while ($enr = $lrs->fetch()) {
                $objet = new Questions($enr['id_question'], $enr['question'], $enr['id_sujet'], $enr['id_utilisateur'], $enr['date_question']);
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
     * @return \Questions
     */
    public function selectOne(int $id) {
        try {
            $sql = 'SELECT * FROM blogentraide.questions WHERE id_question = ?';
            $lcmd = $pdo->prepare($sql);
            $lcmd->bindValue(1, $id);
            $lrs = $lcmd->execute();
            $enr = $lcmd->fetch(PDO::FETCH_ASSOC);
            $objet = new Questions($enr['id_question'], $enr['question'], $enr['id_sujet'], $enr['id_utilisateur'], $enr['date_question']);
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
            $sql = "DELETE FROM blogentraide.questions WHERE id_question = ?";
            $lcmd = $pdo->prepare($sql);
            $lcmd->bindValue(1, $objet->getIdQuestion());
            $lcmd->execute();
            $liAffectes = $lcmd->rowcount();
        } catch (PDOException $e) {
            $liAffectes = -1;
        }
        return $liAffectes;
    }

    /**
     * 
     * @param Questions $objet
     * @return int
     */
    public function insert(PDO $pdo, Object $objet) {
        $liAffectes = 0;
        try {
            $sql = "INSERT INTO blogentraide.questions(question,id_sujet,id_utilisateur,date_question) VALUES(?,?,?,?)";
            $lcmd = $pdo->prepare($sql);
            $lcmd->bindValue(1, $objet->getQuestion());
            $lcmd->bindValue(2, $objet->getIdSujet());
            $lcmd->bindValue(3, $objet->getIdUtilisateur());
            $lcmd->bindValue(4, $objet->getDateQuestion());
            //$lcmd->bindValue(4, "now()");

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
     * @param Questions $objet
     * @return int
     */
    public function update(PDO $pdo, Object $objet) {
        $liAffectes = 0;
        try {
            $sql = "UPDATE blogentraide.questions SET question=?,id_sujet=?,id_utilisateur=?,date_question=? WHERE id_question=?";
            $lcmd = $pdo->prepare($sql);
            $lcmd->bindValue(1, $objet->getQuestion());
            $lcmd->bindValue(2, $objet->getIdSujet());
            $lcmd->bindValue(3, $objet->getIdUtilisateur());
            $lcmd->bindValue(4, $objet->getDateQuestion());
            $lcmd->bindValue(5, $objet->getIdQuestion());

            $lcmd->execute();
            $liAffectes = $lcmd->rowcount();
        } catch (PDOException $e) {
            $liAffectes = -1;
        }
        return $liAffectes;
    }

}

?>
