<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo "<hr>" . $_COOKIE["mdp"] . "<hr>";


$mdp = filter_input(INPUT_COOKIE, "mdp");
echo "<hr>" . $mdp . "<hr>";

?>
