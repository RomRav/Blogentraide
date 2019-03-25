/*
 inscription.js
 */

var mdpOK = false;

/**
 * 
 * @returns {undefined}
 */
function init() {
    /*
     * EN TEST
     */
    document.getElementById("pseudo").value = "p";
    document.getElementById("mdp").value = "buguet";
    document.getElementById("chkMdpVisible").checked = true;
    changerEtatMdp();
    /*
     * FIN EN TEST
     */

//    tOKs["majuscule"] = false;
//    tOKs["minuscule"] = false;
//    tOKs["chiffre"] = false;
//    tOKs["autreCaractere"] = false;
    // Affichage à la console du navigateur
    console.log("init");
    // Création d'un tableau
    var villes = new Array();
    // Remplissage du tableau
    villes[0] = "Sélectionnez";
    villes[1] = "Paris";
    villes[2] = "Lyon";
    villes[3] = "Marseille";
    // Remplissage de la liste déroulante
    var lsOptions = "";
    for (var i = 0; i < villes.length; i++) {
        lsOptions += "<option value='" + villes[i] + "'>" + villes[i] + "</option>";
    }
    document.getElementById("villes").innerHTML = lsOptions;
    // jours, mois et annees
    var lsOptions = "<option>Sélectionnez</option>";
    for (var i = 1; i <= 31; i++) {
        lsOptions += "<option>" + i + "</option>";
    }
    document.getElementById("jours").innerHTML = lsOptions;
    var lsOptions = "<option>Sélectionnez</option>";
    for (var i = 1; i <= 12; i++) {
        lsOptions += "<option>" + i + "</option>";
    }
    document.getElementById("mois").innerHTML = lsOptions;
    var lsOptions = "<option>Sélectionnez</option>";
    for (var i = 1900; i <= 2018; i++) {
        lsOptions += "<option>" + i + "</option>";
    }
    document.getElementById("annees").innerHTML = lsOptions;
    
    document.getElementById("qualiteDuMotDePasse").style.color = "#FF0000";
    
    /*
     * EVENTS & FUNCTIONS
     */
    // Quand l'utilisateur clique sur le bouton "valider"
    // On sollicite la fonction valider
    document.getElementById("btValider").onclick = valider;
    // Quand l'utilisateur clique sur la case à cocher "chkMdpVisible"
    // On sollicite la fonction changerEtatMdp
    document.getElementById("chkMdpVisible").onclick = changerEtatMdp;
    // Clavier MDP
    document.getElementById("mdp").onkeyup = controlerSaisieMDP;
} /// init

/**
 * 
 * @returns {undefined}
 */
function changerEtatMdp() {
    console.log("changerEtatMdp");
    var etatChkMdpVisible = document.getElementById("chkMdpVisible").checked;
    var elementMdp = document.getElementById("mdp");
    if (etatChkMdpVisible) {
        //elementMdp.setAttribute("type", "text");
        elementMdp.type = "text";
    } else {
        elementMdp.setAttribute("type", "password");
    }
} /// changerEtatMdp

/**
 * 
 * @returns {undefined}
 */
function controlerSaisieMDP() {
    console.log("controlerSaisieMDP");

    var caracteresSpeciaux = "&#!?@";
    var qualiteDuMotDePasse = document.getElementById("qualiteDuMotDePasse");
    var liOKs = 0;
    mdpOK = false;
    var tOKs = new Array();
    tOKs["majuscule"] = false;
    tOKs["minuscule"] = false;
    tOKs["chiffre"] = false;
    tOKs["caractereSpecial"] = false;

    var mdp = document.getElementById("mdp").value;

    if (mdp.length >= 6) {
        for (var i = 0; i < mdp.length; i++) {
            var car = mdp[i];
            if (car >= "A" && car <= "Z") {
                tOKs["majuscule"] = true;
//            liOKs++;
            }
            if (car >= "a" && car <= "z") {
                tOKs["minuscule"] = true;
//            liOKs++;
            }
            if (car >= "0" && car <= "9") {
                tOKs["chiffre"] = true;
//            liOKs++;
            }
            for (var j = 0; j < caracteresSpeciaux.length; j++) {
                if (car === caracteresSpeciaux[j]) {
                    tOKs["caractereSpecial"] = true;
                }
            }
        } /// 
        // Test sur les valeurs du tableau de booléens
        for (var cle in tOKs) {
            var bool = tOKs[cle];
            if (bool) {
                liOKs++;
            }
        }
    }

    // 
    if (liOKs === 1 || liOKs === 0) {
        console.log("ROUGE");
        //qualiteDuMotDePasse.style.className = "fondRouge";
        qualiteDuMotDePasse.innerHTML = "Mot de passe faible";
        qualiteDuMotDePasse.style.color = "#FF0000";
    }
    if (liOKs === 2 || liOKs === 3) {
        console.log("ORANGE");
        //qualiteDuMotDePasse.style.className = "fondOrange";
        qualiteDuMotDePasse.innerHTML = "Mot de passe moyen";
        qualiteDuMotDePasse.style.color = "#ED7F10";
    }
    if (liOKs === 4) {
        console.log("VERT");
        mdpOK = true;
        //qualiteDuMotDePasse.style.className = "fondVert";
        qualiteDuMotDePasse.innerHTML = "Mot de passe fort";
        qualiteDuMotDePasse.style.color = "#00FF00";
    }
    console.log(liOKs);
} /// controlerSaisieMDP

/**
 * 
 * @returns {undefined}
 */
function valider() {
    // Déclaration d'une variable et affectation d'une valeur
    var lsMessage = "";
    // Récupération d'une saisie de l'utilisateur
    var pseudo = document.getElementById("pseudo").value;
    var mdp = document.getElementById("mdp").value;
    var email1 = document.getElementById("email1").value;
    var email2 = document.getElementById("email2").value;
    var ville = document.getElementById("villes").value;
    var jour = document.getElementById("jours").value;
    var mois = document.getElementById("mois").value;
    var annee = document.getElementById("annees").value;
    // Test des valeurs saisies
    // trim() enlève les espaces avant et après
    // Si le pseudo est vide alors
    var lbOK = true;
    if (pseudo.trim() === "") {
        // Concaténation dans la variable lsMessage
        lsMessage += "Pseudo KO<br>";
        lbOK = false;
    }
    if (mdp.trim() === "" || !mdpOK) {
        // Concaténation dans la variable lsMessage
        lsMessage += "MDP KO<br>";
        lbOK = false;
    }

    if (email1.trim() === "") {
        // Concaténation dans la variable lsMessage
        lsMessage += "Veuillez saisir votre email<br>";
        lbOK = false;
    }
    if (email2.trim() === "") {
        // Concaténation dans la variable lsMessage
        lsMessage += "Veuillez saisir une deuxième fois votre email<br>";
        lbOK = false;
    }
    if (email1 !== email2) {
        lsMessage += "Les 2 emails ne sont pas identiques<br>";
        lbOK = false;
    }

    if (ville === "Sélectionnez") {
        // Concaténation dans la variable lsMessage
        lsMessage += "Veuillez sélectionner une ville<br>";
        lbOK = false;
    }

    if (jour === "Sélectionnez") {
        // Concaténation dans la variable lsMessage
        lsMessage += "Veuillez sélectionner un jour<br>";
        lbOK = false;
    }
    if (mois === "Sélectionnez") {
        // Concaténation dans la variable lsMessage
        lsMessage += "Veuillez sélectionner un mois<br>";
        lbOK = false;
    }
    if (annee === "Sélectionnez") {
        // Concaténation dans la variable lsMessage
        lsMessage += "Veuillez sélectionner une année<br>";
        lbOK = false;
    }
    // Affichage d'un message dans le <label>
    if (lbOK) {
        document.getElementById("lblMessage").innerHTML = "Jusque là tout va bien !";
    } else {
        document.getElementById("lblMessage").innerHTML = lsMessage;
    }

} /// init

/*
 * MAIN
 */
// Au démarrage on sollicite la fonction init
window.onload = init;
