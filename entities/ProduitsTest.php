<?php

require_once 'Produit.php';


$prod = new Produit(1, "evian", 2);

echo $prod->getIdCategorie() . "<br>";
echo $prod->getIdProduit() . "<br>";
echo $prod->getProduit() . "<br>";
?>