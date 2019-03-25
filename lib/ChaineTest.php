<?php

require_once 'Chaine.php';

echo "<hr>SNAKE=>CAMEL<hr>";
$snake = "hello_world";
$camel = Chaine::snake2Camel($snake);
echo "Envoie: " . $snake . "<br>";
echo "Retour: " . $camel . "<br>";

echo "<hr>CAMEL=>SNAKE<hr>";
$camel = "helloWordl";
$snake = Chaine::camel2Snake($camel);
echo "Envoie: " . $camel . "<br>";
echo "Retour: " . $snake . "<br>";
?>

