<?php
// --- Transactions.php
header("Content-Type: text/html; charset=UTF-8");
$lsMessage = "";

$btValider = filter_input(INPUT_POST, "btValider");

if ($btValider != null) {
    $cp = filter_input(INPUT_POST, "cp");
    $nomVille = filter_input(INPUT_POST, "nomVille");
    $idPays = filter_input(INPUT_POST, "idPays");

    if ($cp != null && $nomVille != null && $idPays != null) {
        try {
            $lcnx = new PDO("mysql:host=localhost;dbname=cours", "root", "");
            $lcnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $lcnx->setAttribute(PDO::ATTR_AUTOCOMMIT, FALSE);
            $lcnx->exec("SET NAMES 'UTF8'");

            $lcnx->beginTransaction();

            $lsSQL = "INSERT INTO villes(cp, nom_ville, id_pays) VALUES(?,?,?)";
            $lcmd = $lcnx->prepare($lsSQL);
            $lcmd->execute(array($cp, $nomVille, $idPays)); // Alternative
            $lsMessage = $lcmd->rowcount() . " enregistrement(s) ajouté(s)";
        $lcnx->rollback();
//            $lcnx->commit();

            $lcnx = null;
        } catch (PDOException $e) {
            $lsMessage = $e->getMessage();
        }
    } else {
        $lsMessage = "Toutes les saisies sont obligatoires !!!";
    }
}
?>

<form action="" method="POST">
    <label>CP </label>
    <input type="text" name="cp" value="75021" size="5" />
    <label>Ville </label>
    <input type="text" name="nomVille" value="Paris 21" />
    <label>ID pays </label>
    <input type="text" name="idPays" value="033" size="4" />

    <input type="submit" name="btValider"/>
</form>

<label>
    <?php echo $lsMessage; ?>
</label>
