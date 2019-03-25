<?php

require_once 'Categories.php';

$cat = new Categories(1, "Langages");

echo $cat->getIdCategorie() . "<br>" . $cat->getCategorie();
?>
