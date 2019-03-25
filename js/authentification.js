/*
 authentification_exo.js
 */

var langue = "FR";
/**
 *
 * @returns {undefined}
 */
function init() {
    // Affichage à la console du navigateur
    console.log("init");
    // Quand l'utilisateur clique sur le bouton "valider"
    // On sollicite la fonction valider
    document.getElementById("btValider").onclick = valider;

    // Pré-initialisation
    document.getElementById("pseudo").value = "Pascal";
    document.getElementById("mdp").value = "Mdp123#";
    document.getElementById("lblMessage").innerHTML = "";

    // Traductions
    document.getElementById("imgFR").onclick = enFrancais;
    document.getElementById("imgES").onclick = enEspagnol;

    // Quand l'utilisateur clique sur la case à cocher "chkMdpVisible"
    // On sollicite la fonction changerEtatMdp
    document.getElementById("chkMdpVisible").onclick = changerEtatMdp;

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
        elementMdp.setAttribute("type", "text");
    } else {
        elementMdp.setAttribute("type", "password");
    }
} /// changerEtatMdp

/**
 *
 * @returns {undefined}
 */
function valider() {
    // Déclaration d'une variable et affectation d'une valeur
    var lsMessage;
    if (langue === "FR") {
        lsMessage = "Jusque là tout va bien !";
    }
    if (langue === "ES") {
        lsMessage = "Hasta entonces todo está bien.";
    }

    // Récupération d'une saisie de l'utilisateur
    var pseudo = document.getElementById("pseudo").value;
    var mdp = document.getElementById("mdp").value;
    // Test des valeurs saisies
    // trim() enlève les espaces avant et après
    if (pseudo.trim() === "") {
        if (langue === "FR") {
            lsMessage = "Pseudo vide !!!";
        }
        if (langue === "ES") {
            lsMessage = "Pseudo vacío !!!";
        }
    }
    if (mdp.trim() === "") {
        if (langue === "FR") {
            lsMessage = "mdp vide !!!";
        }
        if (langue === "ES") {
            lsMessage = "Contraseña vacío !!!";
        }
    }
    // Si le pseudo est vide ou si le mdp est vide alors
    if (pseudo.trim() === "" && mdp.trim() === "") {
        // Affectation de "KO" à la variable lsMessage
        if (langue === "FR") {
            lsMessage = "Toutes les saisies sont obligatoires !!!";
        }
        if (langue === "ES") {
            lsMessage = "Todas las entradas son requeridas !!!";
        }
    }
    // Affichage d'une valeur (OK ou KO) dans le <label>
    document.getElementById("lblMessage").innerHTML = lsMessage;
} /// init

/**
 *
 * @returns {undefined}
 */
function enFrancais() {
    langue = "FR";
    document.getElementById("titre").innerHTML = "Authentification";
    document.getElementById("lblPseudo").innerHTML = "Pseudo";
    document.getElementById("lblMdp").innerHTML = "mdp";
    document.getElementById("btValider").value = "Valider";
} /// enFrancais

/**
 *
 * @returns {undefined}
 */
function enEspagnol() {
    langue = "ES";
    document.getElementById("titre").innerHTML = "Autenticación";
    document.getElementById("lblPseudo").innerHTML = "Pseudo";
    document.getElementById("lblMdp").innerHTML = "Contraseña";
    document.getElementById("btValider").value = "Validar";
} /// enEspagnol

/*
 * MAIN
 */
// Au démarrage on sollicite la fonction init
window.onload = init;
