<?php

declare(strict_types = 1);
/*
  UtilisateursDAO.php : bibliothèque
 */
/*
  LE DAO procédural de la table [utilisateurs] de la BD [blogentraide] POO
 */
require_once "./IDAO.php";

class UtilisateursDAO implements IDAO {

    /**
     * 
     * @param PDO $pdo
     * @return array
     */
    public static function selectAll(PDO $pdo): array {
// Déclaration du tableau pour le return
        $liste = array();
        try {
            $sql = 'SELECT * FROM blogentraide.utilisateurs';
// Query parce qu'il n'y a pas de WHERE dans le SELECT
            $lrs = $pdo->query($sql);
            $lrs->setFetchMode(PDO::FETCH_ASSOC);
// Boucle dans le curseur
            while ($enr = $lrs->fetch()) {
// Ajout de l'enregistrement courant dans le tableau
                $objet = new Utilisateurs($enr['id_utilisateur'],$enr['pseudo'],$enr['mdp']);
//                $objet->setIdUtilisateur($enr['id_utilisateur']);
//                $objet->setPseudo($enr['pseudo']);
//                $objet->setMdp($enr['mdp']);
                $liste[] = $objet;
            }
// Fermeture du curseur (facultatif)
            $lrs->closeCursor();
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
     * @return array
     */
    public static function selectOne(PDO $pdo, int $id): object {
        $enr = array();
        try {
            $sql = 'SELECT * FROM blogentraide.utilisateurs WHERE id_utilisateur = ?';
// Compilation
            $lrs = $pdo->prepare($sql);
// Valorisation du 1er paramètre du SELECT avec la valeur du 2eme paramètre de la fonction
            $lrs->bindValue(1, $id);
// Exécution du SELECT (plus généralemnt de l'ordre SQL)
            $lrs->execute();
// Récupération de l'unique enregistrement ou pas 
// Fetch renvoie FALSE si erreur ou aucun résultat
            $enr = $lrs->fetch(PDO::FETCH_ASSOC);
// Si l'utilisateur n'existe pas
            if ($enr === FALSE) {
                $enr = array();
            }
// Fermeture du curseur (facultatif)
            $lrs->closeCursor();
        } catch (PDOException $e) {
// Rien puisqu'on a array() par défaut (cf initialisation de la variable $enr)
        }
        return $enr;
    }

    /**
     * 
     * @param PDO $pdo
     * @param string $pseudo
     * @param string $mdp
     * @return array
     */
//    function selectOneByPseudoAndMdp(PDO $pdo, string $pseudo, string $mdp) {
//        /*
//         * POUR L'AUTHENTIFICATION
//         */
//        $enr = array();
//        try {
//            $sql = 'SELECT * FROM blogentraide.utilisateurs WHERE pseudo = ? AND mdp = ?';
//            $lrs = $pdo->prepare($sql);
//// Valorisation des 2 paramètres du SELECT 
//            $lrs->bindValue(1, $pseudo);
//            $lrs->bindValue(2, $mdp);
//            $lrs->execute();
//            $enr = $lrs->fetch(PDO::FETCH_ASSOC);
//            if ($enr === FALSE) {
//                $enr = array();
//            }
//// Fermeture du curseur (facultatif)
//            $lrs->closeCursor();
//        } catch (PDOException $e) {
//            
//        }
//        return $enr;
//    }

    /**
     * 
     * @param PDO $pdo
     * @param array $objet
     * @return int
     */
    public static function insert(PDO $pdo, object $objet): int {
        /*
         * POUR L'INSCRIPTION
         */
        $liAffected = 0;
        try {
            $sql = "INSERT INTO blogentraide.utilisateurs(pseudo,mdp) VALUES(?,?)";
            $lcmd = $pdo->prepare($sql);
            $lcmd->bindValue(1, $objet["pseudo"]);
            $lcmd->bindValue(2, $objet["mdp"]);
            $lcmd->execute();
// Récupération du nombre d'enregistrements insérés (1 ou 0 dans le cas présent)
            $liAffected = $lcmd->rowcount();
        } catch (PDOException $e) {
// Code d'erreur -1 (arbitraire)
            $liAffected = -1;
            echo "<hr>Erreur : " . $e->getMessage() . "<hr>";
            echo "<hr>Code Erreur : " . $e->getCode() . "<hr>";
        }
        return $liAffected;
    }

    /**
     * 
     * @param PDO $pdo
     * @param array $objet
     * @return int
     */
//    function deleteByID(PDO $pdo, int $id) {
//        $liAffected = 0;
//        try {
//            $sql = "DELETE FROM blogentraide.utilisateurs WHERE id_utilisateur = ?";
//            $lcmd = $pdo->prepare($sql);
//            $lcmd->bindValue(1, $id);
//            $lcmd->execute();
//            $liAffected = $lcmd->rowcount();
//        } catch (PDOException $e) {
//            $liAffected = -1;
//        }
//        return $liAffected;
//    }

    /**
     * 
     * @param PDO $pdo
     * @param array $objet
     * @return int
     */
    public static function delete(PDO $pdo, object $objet): int {
        $liAffected = 0;
        try {
            $sql = "DELETE FROM blogentraide.utilisateurs WHERE id_utilisateur = ?";
            $lcmd = $pdo->prepare($sql);
            $lcmd->bindValue(1, $objet["id_utilisateur"]);
            $lcmd->execute();
            $liAffected = $lcmd->rowcount();
        } catch (PDOException $e) {
            $liAffected = -1;
        }
        return $liAffected;
    }

    /**
     * 
     * @param PDO $pdo
     * @param array $objet
     * @return int
     */
//    function deleteByPseudoAndMdp(PDO $pdo, array $objet) {
//        $liAffected = 0;
//        try {
//            $sql = "DELETE FROM blogentraide.utilisateurs WHERE id_utilisateur = ?";
//            $lcmd = $pdo->prepare($sql);
//            $lcmd->bindValue(1, $objet["id_utilisateur"]);
//            $lcmd->execute();
//            $liAffected = $lcmd->rowcount();
//        } catch (PDOException $e) {
//            $liAffected = -1;
//        }
//        return $liAffected;
//    }

    /**
     * 
     * @param PDO $pdo
     * @param array $objet
     * @return int
     */
//    function deleteByPseudo(PDO $pdo, array $objet) {
//        $liAffected = 0;
//        try {
//            $sql = "DELETE FROM blogentraide.utilisateurs WHERE pseudo = ?";
//            $lcmd = $pdo->prepare($sql);
//            $lcmd->bindValue(1, $objet["pseudo"]);
//            $lcmd->execute();
//            $liAffected = $lcmd->rowcount();
//        } catch (PDOException $e) {
//            $liAffected = -1;
//        }
//        return $liAffected;
//    }

    /**
     * 
     * @param PDO $pdo
     * @param array $objet
     * @return int
     */
    public static function update(PDO $pdo, object $objet): int {
        $liAffected = 0;
        try {
            $sql = "UPDATE blogentraide.utilisateurs SET pseudo=?,mdp=? WHERE id_utilisateur=?";
            $lcmd = $pdo->prepare($sql);
            $lcmd->bindValue(1, $objet["pseudo"]);
            $lcmd->bindValue(2, $objet["mdp"]);
            $lcmd->bindValue(3, $objet["id_utilisateur"]);

            $lcmd->execute();
            $liAffected = $lcmd->rowcount();
        } catch (PDOException $e) {
            $liAffected = -1;
        }
        return $liAffected;
    }

    /**
     * 
     * @param PDO $pdo
     * @param array $objet
     * @return int
     */
//    function updateByPseudo(PDO $pdo, array $objet) {
//        $liAffected = 0;
//        try {
//            $sql = "UPDATE blogentraide.utilisateurs SET mdp=? WHERE pseudo=?";
//            $lcmd = $pdo->prepare($sql);
//            $lcmd->bindValue(1, $objet["mdp"]);
//            $lcmd->bindValue(2, $objet["pseudo"]);
//
//            $lcmd->execute();
//            $liAffected = $lcmd->rowcount();
//        } catch (PDOException $e) {
//            $liAffected = -1;
//        }
//        return $liAffected;
//    }
}

?>
