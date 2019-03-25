<?php

require_once 'Sujets.php';

$fr = new Sujets(1, "Le sujet du jour", 1);

echo $fr->getidSujet() . " : " . $fr->getsujet() . " -> " . $fr->getidProduit();



