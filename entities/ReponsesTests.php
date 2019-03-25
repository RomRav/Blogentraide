<?php

require_once('reponses.php');

// --- Instanciation d'un objet
$r = new reponses("Réponse", "Paris va gagner la LDC", "PSG/OM?", "19.01.11", "PSG4LIFE");


// --- Récupération des valeurs
echo "Question" . "&nbsp" . $r->getIdQuestion() . "&nbsp" . ":" . "<br>" .
 "Reponse de l'utilisateur:" . "&nbsp" . $r->getIdUtilisateur() . "<br>" .
 "&nbsp" . $r->getIdReponse() . ":" . $r->getReponse() . "&nbsp" . "<br>" .
 "- Ecrit le" . "&nbsp" . $r->getDateReponse() . ".";
?>
