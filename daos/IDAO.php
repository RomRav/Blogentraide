<?php

/**
 *
 * @author Administrateur
 */
interface IDAO {

    //put your code here
    public static function selectAll(PDO $pdo);

    public static function selectOne(PDO $pdo, int $id);

    public static function delete(PDO $pdo, object $objet);

    public static function insert(PDO $pdo, object $objet);

    public static function update(PDO $pdo, object $objet);
}

?>