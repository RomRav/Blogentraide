<!DOCTYPE html>

<?php
require_once '../controls/SujetsCTRL.php';
?>
<html>
    <head>
        <title>Sujets.php</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" type="text/css" href="../css/main.css">
    </head>

    <body>
        <header id="header">
            <?php
            include 'partials/header.php';
            ?>
        </header>

        <nav id="nav">
            <?php
            include 'partials/nav.php';
            ?>
        </nav>

        <div id="centre">
            <h1 id="titre">SUJETS IHM</h1>
            <ul id="sous_menu">
                <li>
                    <a href="../boundaries/SujetsIHM.php">Toutes</a>
                </li>
                <li>
                    &nbsp;|&nbsp;
                </li>

                <li>
                    <a href="../boundaries/SujetsIHM.php?choix=Ajouter">Ajout</a>
                </li>
                <li>
                    &nbsp;|&nbsp;
                </li>

                <li>
                    <a href="../boundaries/SujetsIHM.php?choix=Supprimer">Suppression</a>
                </li>
                <li>
                    &nbsp;|&nbsp;
                </li>

                <li>
                    <a href="../boundaries/SujetsIHM.php?choix=Mise a jour">Modification</a>
                </li>
                <li>
                    &nbsp;|&nbsp;
                </li>
            </ul>
            <br>
            <hr>
            <form action="../controls/SujetsCTRL.php" method="POST">
                <?php
                $choix = filter_input(INPUT_GET, "choix");
                switch ($choix) {
                    case "Ajouter":
                        echo '<h2>AJOUT</h2><br>';
                        echo "<label>Selectionnez un produit:</label><br>";
                        echo '<select name="idProduit" id="idProduit">';
                        echo $selectProduit;
                        echo ' </select><br><br>';
                        echo '<fieldset>';
                        echo '<legend>SUJETS</legend>';
                        echo '</p><label>Sujets : </label>
                                        <p>
                                        <input type="text" name="formSujet" id="sujet" value="PHP" />
                                         </p>';
                        echo "<input type =\"submit\" value =\"" . $choix . "\"  id = btValider\" name = \"btValider\" />";
                        echo '</fieldset>';
                        break;

                    case "Supprimer":
                        echo '<p><select name="supp">';
                        echo $selectSujet;
                        echo '</select></p>';
                        echo "<input type =\"submit\" value =\"" . $choix . "\"  id = btValider\" name = \"btValider\" />";
                        break;

                    case "Mise a jour":
                        echo '<h2>MODIFIER</h2><br>';
                        echo "<label>Selectionnez un produit:</label><br>";
                        echo '<select name="idProduit" id="idProduit">';
                        echo $selectProduit;
                        echo ' </select>';

                        echo "<br><label>Selectionnez un sujet:</label><br>";
                        echo '<select name="idSujet" id="idSujet">';
                        echo $selectSujet;
                        echo '</select>';

                        echo '</p><label>Modification sujet : </label>
                                <p><input type="text" name="formSujet" id="formSujet" value="Les DAO" /></p>';
                        echo "<input type =\"submit\" value =\"" . $choix . "\"  id = btValider\" name = \"btValider\" />";
                        break;

                    default :
                        echo '<h2>SUJETS</h2><br>';
                        echo '<select>';
                        echo $selectSujet;
                        echo '</select>';
                        break;
                }
                ?>
<!--                <p>
                    <input type="text" name="categorie" id="categorie" value="SGBD" />
                </p>
                <br>
                <p>
                    <input type="submit" value="Ajouter une categorie" id="btValiderAjout" name ="btValiderAjout" />
                    <input type="submit" value="Modification une categorie" id="btValiderModification" name ="btValiderModification" />
                    <input type="submit" value="Suppression une categorie" id="btValiderSuppression" name ="btValiderSuppression" />
                </p>-->
            </form>

            <p>
                <label id="lblMessage">
                    <?php
                    if (isSet($message)) {
                        echo $message;
                    }
                    ?>
                </label>
            </p>
        </div>

        <footer id="footer">
            <?php
            include 'partials/footer.php';
            ?>
        </footer>


    </body>

</html>