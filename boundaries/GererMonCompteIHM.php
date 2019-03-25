<!DOCTYPE html>
<?php
//session_start();
?>
<html>
    <head>
        <title>GererMonCompteIMH.php</title>
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
            <h1 id="titre">Gérer Mon Compte IMH</h1>

            <form action="../controls/GererMonCompteCTRL.php" method="POST">
                <label>Pseudo : </label>
                <p>
                    <label>
                        <?php
                        if (isset($_SESSION["pseudo"])) {
                            echo $_SESSION["pseudo"];
                        } else {
                            $message = "Veuillez vous connecter !";
                        }
                        ?>
                    </label>
                </p>

                <label>MDP : le mot de passe doit contenir au minimm 6 caractères (1 majuscule, 1 minuscule, 1 chiffre, un caractère spécial)</label>
                <p>
                    <input type="password" name="mdp" id="mdp" value="Mdp123#" />
                    Mot de passe visible :
                    <input type="checkbox" id="chkMdpVisible" />
                </p>

                <label id="qualiteDuMotDePasse">Mot de passe faible</label>
                <br>

                <p>
                    <input type="submit" value="Valider la modification" id="btValiderModification" name ="btValiderModification" />
                    <input type="submit" value="Valider la suppression" id="btValiderSuppression" name ="btValiderSuppression" />
                </p>
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

<!--        <script src="../js/authentification.js"></script>-->
    </body>

</html>