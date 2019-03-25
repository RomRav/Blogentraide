<!DOCTYPE html>
<html>
    <head>
        <title>inscription.php</title>
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
            <h1>Inscription</h1>
            <form action="../controls/inscription.php" method="POST">
                <label>Pseudo : </label>
                <p>
                    <input type="text" name="pseudo" id="pseudo" value="p" />
                </p>

                <label>MDP : le mot de passe doit contenir au minimm 6 caractères (1 majuscule, 1 minuscule, 1 chiffre, un caractère spécial)</label>
                <p>
                    <input type="password" name="mdp" id="mdp" value="Mdp123#" />
                    Mot de passe visible :
                    <input type="checkbox" id="chkMdpVisible" />
                </p>

                <label id="qualiteDuMotDePasse">Mot de passe faible</label>
                <br>

                <label>Email : </label>
                <p>
                    <input type="text" name="email1" id="email1" value="pb@gmail.com" />
                </p>

                <label>Ressaisissez votre Email : </label>
                <p>
                    <input type="text" name="email2" id="email2" value="pb@gmail.com" />
                </p>

                <label>Ville : </label>
                <p>
                    <select name="villes" id="villes">
                        <?php
                        $villes = array("Paris", "Lyon", "Marseille");
                        echo "<option>Sélectionnez</option>\n";
                        for ($i = 0; $i <= count($villes); $i++) {
                            echo "<option>$villes[$i]</option>\n";
                        }
                        ?>
                    </select>
                </p>

                <label>Date de naissance : </label>
                <p>
                    <select name="jours" id="jours">
                        <?php
                        echo "<option>Sélectionnez</option>\n";
                        for ($i = 1; $i <= 31; $i++) {
                            echo "<option>$i</option>\n";
                        }
                        ?>
                    </select>
                    <select name="mois" id="mois">
                        <?php
                        $tMois = array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");
                        echo "<option>Sélectionnez</option>\n";
                        for ($i = 0; $i < count($tMois); $i++) {
                            echo "<option value='$i'>$tMois[$i]</option>\n";
                        }
                        ?>
                    </select>
                    <select name="annees" id="annees">
                        <?php
                        $d = Date("Y");
                        echo "<option>Sélectionnez</option>\n";
                        for ($i = 2000; $i <= $d; $i++) {
                            echo "<option>$i</option>\n";
                        }
                        ?>
                    </select>
                </p>
                <p>
                    <input type="submit" value="Valider" id="btValider" />
                </p>
            </form>

            <label id="lblMessage">Message</label>
        </div>

        <footer id="footer">
            <?php
            include 'partials/footer.php';
            ?>
        </footer>

<!--        <script src="../js/inscription.js"></script>-->
    </body>
</html>
