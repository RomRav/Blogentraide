<!DOCTYPE html>

<?php
require_once '../controls/ReponsesCTRL.php';
?>
<html>
    <head>
        <title>Reponses.php</title>
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
            <h1 id="titre">Reponses IHM</h1>
            <ul id="sous_menu">
                <li>
                    <a href="../boundaries/ReponsesIHM.php">Toutes</a>
                </li>
                <li>
                    &nbsp;|&nbsp;
                </li>

                <li>
                    <a href="../boundaries/ReponsesIHM.php?choix=Ajouter">Ajout</a>
                </li>
                <li>
                    &nbsp;|&nbsp;
                </li>

                <li>
                    <a href="../boundaries/ReponsesIHM.php?choix=Supprimer">Suppression</a>
                </li>
                <li>
                    &nbsp;|&nbsp;
                </li>

                <li>
                    <a href="../boundaries/ReponsesIHM.php?choix=Mise a jour">Modification</a>
                </li>
                <li>
                    &nbsp;|&nbsp;
                </li>
            </ul>
            <br>
            <hr>
            <form action="../controls/ReponsesCTRL.php" method="POST">
                <?php
                $choix = filter_input(INPUT_GET, "choix");
                switch ($choix) {
                    case "Ajouter":
                        echo '<fieldset>';
                        echo '<legend>Repondre</legend>';
                        echo "<label>Selectionnez une question:</label><br>";
                        echo '<select name="idQuestion" id="idQuestion">';
                        echo $selectQuestions;
                        echo ' </select>';
                        echo '</p><label>Reponses : </label>
                                        <p>
                                        <textarea name="formReponse" id="fromReponse" value="Je ne sais pas?" rows="5" cols="50">Tapez votre réponse</textarea>
                                         </p>';
                        echo "<input type =\"submit\" value =\"" . $choix . "\"  id = btValider\" name = \"btValider\" />";
                        echo '</fieldset>';
                        break;

                    case "Supprimer":
                        echo '<fieldset>';
                        echo '<legend>SUPPRIMER</legend>';
//                        echo "<label>Selectionnez un sujet:</label><br>";
//                        echo '<select name="idSujet" id="idSujet">';
//                        echo $selectSujet;
//                        echo ' </select>';
                        echo '<p><select name="supp">';
                        echo $selectReponses;
                        echo '</select></p>';
                        echo "<input type =\"submit\" value =\"" . $choix . "\"  id = btValider\" name = \"btValider\" />";
                        echo '</fieldset>';
                        break;

                    case "Mise a jour":
                        echo '<fieldset>';
                        echo '<legend>MODIFIER</legend>';
//                        echo "<label>Selectionnez une question:</label><br>";
                        echo '<select name="idQuestion" id="idQuestion">';
                        echo $selectQuestions;
                        echo ' </select>';


                        echo "<br><label>Selectionnez une reponse:</label><br>";
                        echo '<select name="idReponse" id="idReponse">';
                        echo $selectReponses;
                        echo '</select>';
                        echo '</p><label>Modification reponse : </label>
                                <p><input type="text" name="formReponse" id="formReponse" value="C\'est qui?" /></p>';
                        echo "<input type =\"submit\" value =\"" . $choix . "\"  id = btValider\" name = \"btValider\" />";
                        echo '</fieldset>';
                        break;

                    default :
                        echo '<fieldset>';
                        echo '<legend>REPONSES</legend>';
                        echo '<select>';
                        echo $selectReponses;
                        echo '</select>';
                        echo '</fieldset>';
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