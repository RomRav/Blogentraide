<!DOCTYPE html>
<html>
    <head>
        <title>authentification.php</title>
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
            <h1 id="titre">Authentification</h1>
<!--            <img id="imgFR" src="../images/francais.png" alt="Français" width="25" />
            <img id="imgES" src="../images/espagnol.png" alt="Espagnol" width="25"/>-->

            <form action="../controls/AuthentificationCTRL.php" method="POST">
                <label id="lblPseudo" for="pseudo">Pseudo : </label>
                <p>
                    <input type="text" name="pseudo" id="pseudo" value="p" />
                </p>
                <label id="lblMdp" for="mdp">MDP : </label>
                <p>
                    <input type="password" name="mdp" id="mdp" value="MDP123" />
                    Mot de passe visible 
                    <input type="checkbox" name="chkMdpVisible" id="chkMdpVisible"/>
                </p>
                <p>
                    Sauvegarder le Mot de passe 
                    <?php
                    $mdp = filter_input(INPUT_COOKIE, "mdp");
                    if ($mdp) {
//                        echo "<br>" . $mdp;
                        echo "<input type='checkbox' id='chkMdpSave' name='chkMdpSave' checked='checked' />";
                    } else {
                        echo "<input type='checkbox' id='chkMdpSave' name='chkMdpSave' />";
                    }
//                    if (isSet($_COOKIE["mdp"])) {
////                        echo "<br>" . $_COOKIE["mdp"];
//                        echo "<input type='checkbox' id='chkMdpSave' name='chkMdpSave' checked='checked' />";
//                    } else {
//                        echo "<input type='checkbox' id='chkMdpSave' name='chkMdpSave' />";
//                    }
                    ?>
<!--                    <input type="checkbox" id="chkMdpSave" name="chkMdpSave" />-->
                </p>
                <p>
                    <!-- 
                    Link vers une page pour saisir un email
                    -->
                    <a href="">Mot de passe oublié</a>
                </p>
                <p>
                    <input type="submit" value="Valider" id="btValider" />
                </p>
            </form>

            <p>
                <label id="lblMessage">
                    <?php
                    if (isSet($message)) {
                        echo $message;
                    }

                    $mdp = filter_input(INPUT_COOKIE, "mdp");
                    if ($mdp) {
                        
                    } else {
                        
                    }
//                    if (isSet($_COOKIE["mdp"])) {
//                        //echo "<br>" . $_COOKIE["mdp"];
//                    } else {
//                        //echo "<br>Pas de cook 'mdp'";
//                    }
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