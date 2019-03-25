<!DOCTYPE html>
<html>
    <head>
        <title>accueil_general.php</title>
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
            <h1 id="titre">Accueil Général</h1>
            <ul id="menu_accueil">
                <li><a href="../controls/AccueilGeneralCTRL.php/categorie=langages">Langages</a></li>
                <li><a href="../controls/AccueilGeneralCTRL.php/categorie=sgbd">SGBD</a></li>
                <li><a href="../controls/AccueilGeneralCTRL.php/categorie=framworks">Frameworks</a></li>
            </ul>
            <p>
                <label id="lblMessage">Message</label>
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