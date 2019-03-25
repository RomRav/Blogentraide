<!DOCTYPE html>

<?php
require_once '../controls/ProduitsCTRL.php';
?>
<html>
    <head>
        <title>Produits.php</title>
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
            <h1 id="titre">PRODUITS IHM</h1>
            <ul id="sous_menu">
                <li>
                    <a href="../boundaries/ProduitsIHM.php">Toutes</a>
                </li>
                <li>
                    &nbsp;|&nbsp;
                </li>

                <li>
                    <a href="../boundaries/ProduitsIHM.php?choix=Ajouter">Ajout</a>
                </li>
                <li>
                    &nbsp;|&nbsp;
                </li>

                <li>
                    <a href="../boundaries/ProduitsIHM.php?choix=Supprimer">Suppression</a>
                </li>
                <li>
                    &nbsp;|&nbsp;
                </li>

                <li>
                    <a href="../boundaries/ProduitsIHM.php?choix=Mise a jour">Modification</a>
                </li>
                <li>
                    &nbsp;|&nbsp;
                </li>
            </ul>
            <br>
            <hr>
            <form action="../controls/ProduitsCTRL.php" method="POST">
                <p>
                    <?php
                    $choix = filter_input(INPUT_GET, "choix");
                    switch ($choix) {
                        case "Ajouter":
                            echo '<h2>AJOUT</h2><br>';
                            echo "<label>Selectionnez une categorie:</label><br>";
                            echo '<select name="cat" id="cat">';
                            echo $selectCategorie;
                            echo ' </select>';
                            echo '</p><label>Produit : </label>
                                        <p>
                                        <input type="text" name="produit" id="produit" value="A+" />
                                         </p>';
                            echo "<input type =\"submit\" value =\"" . $choix . "\"  id = btValider\" name = \"btValider\" />";
                            break;

                        case "Supprimer":
                            echo '<p><select name="supp">';
                            echo $selectProduit;
                            echo '</select></p>';
                            echo "<input type =\"submit\" value =\"" . $choix . "\"  id = btValider\" name = \"btValider\" />";
                            break;
                        case "Mise a jour":
                            echo '<h2>MODIFIER</h2><br>';
                            echo "<label>Selectionnez une categorie:</label><br>";
                            echo '<select name="cat" id="cat">';
                            echo $selectCategorie;
                            echo ' </select>';

                            echo "<br><label>Selectionnez un produit:</label><br>";
                            echo '<select name="upd">';
                            echo $selectProduit;
                            echo '</select>';
                            echo '</p><label>Modification produit : </label>
                                <p><input type="text" name="produit" id="produit" value="A+" /></p>';
                            echo "<input type =\"submit\" value =\"" . $choix . "\"  id = btValider\" name = \"btValider\" />";
                            break;

                        default :
                            echo '<h2>PRODUITS</h2><br>';
                            echo '<select>';
                            echo $selectProduit;
                            echo '</select>';
                            break;
                    }
                    ?>
                    <br>
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