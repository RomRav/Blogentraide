<!DOCTYPE html>

<?php
require_once '../controls/CategoriesCTRL.php';
?>
<html>
    <head>
        <title>Categories.php</title>
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
            <h1 id="titre">CATEGORIES IHM</h1>
            <ul id="sous_menu">
                <li>
                    <a href="../boundaries/CategoriesIHM.php">Toutes</a>
                </li>
                <li>
                    &nbsp;|&nbsp;
                </li>

                <li>
                    <a href="../boundaries/CategoriesIHM.php?choix=Ajouter">Ajout</a>
                </li>
                <li>
                    &nbsp;|&nbsp;
                </li>

                <li>
                    <a href="../boundaries/CategoriesIHM.php?choix=Supprimer">Suppression</a>
                </li>
                <li>
                    &nbsp;|&nbsp;
                </li>

                <li>
                    <a href="../boundaries/CategoriesIHM.php?choix=Mise a jour">Modification</a>
                </li>
                <li>
                    &nbsp;|&nbsp;
                </li>
            </ul>
            <br>
            <hr>
            <form action="../controls/CategoriesCTRL.php" method="POST">
                <?php
                $choix = filter_input(INPUT_GET, "choix");
                switch ($choix) {
                    case "Ajouter":
                        echo '<h2>AJOUT</h2><br>';
//                            echo "<label>Selectionnez une categorie:</label><br>";
//                            echo '<select name="cat" id="cat">';
//                            echo $selectCategorie;
//                            echo ' </select>';
                        echo '</p><label>Categorie : </label>
                                        <p>
                                        <input type="text" name="categorie" id="categorie" value="SGBDR" />
                                         </p>';
                        echo "<input type =\"submit\" value =\"" . $choix . "\"  id = btValider\" name = \"btValider\" />";
                        break;

                    case "Supprimer":
                        echo '<p><select name="supp">';
                        echo $selectCategorie;
                        echo '</select></p>';
                        echo "<input type =\"submit\" value =\"" . $choix . "\"  id = btValider\" name = \"btValider\" />";
                        break;
                    case "Mise a jour":
                        echo '<h2>MODIFIER</h2><br>';
                        echo "<label>Selectionnez une categorie:</label><br>";
                        echo '<select name="cat" id="cat">';
                        echo $selectCategorie;
                        echo ' </select>';

//                            echo "<br><label>Selectionnez un catt:</label><br>";
//                            echo '<select name="upd">';
//                            echo $selectCat;
//                            echo '</select>';
                        echo '</p><label>Modification categorie : </label>
                                <p><input type="text" name="categorie" id="categorie" value="SGBDR" /></p>';
                        echo "<input type =\"submit\" value =\"" . $choix . "\"  id = btValider\" name = \"btValider\" />";
                        break;

                    default :
                        echo '<h2>CATEGORIES</h2><br>';
                        echo '<select>';
                        echo $selectCategorie;
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