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
            <img id="imgFR" src="../images/francais.png" alt="Français" width="25" />
            <img id="imgES" src="../images/espagnol.png" alt="Espagnol" width="25"/>
            
            <form action="../controls/authentification.php" method="POST">
                <label id="lblPseudo" for="pseudo">Pseudo : </label>
                <p>
                    <input type="text" name="pseudo" id="pseudo" value="p" />
                </p>
                <label id="lblMdp" for="mdp">MDP : </label>
                <p>
                    <input type="password" name="mdp" id="mdp" value="Mdp123#" />
                    Mot de passe visible 
                    <input type="checkbox" id="chkMdpVisible" />
                </p>
                <p>
                    Sauvegarder le Mot de passe 
                    <input type="checkbox" id="chkMdpSave" />
                </p>
                <p>
                    <a href="">Mot de passe oublié</a>
                </p>
                <p>
                    <input type="submit" value="Valider" id="btValider" />
                </p>
            </form>

            <label id="lblMessage">
                <?php
                if(isSet($message)){
                    echo $message;
                }
                ?>
            </label>
        </div>

        <footer id="footer">
            <?php
            include 'partials/footer.php';
            ?>
        </footer>

<!--        <script src="../js/authentification.js"></script>-->
    </body>

</html>