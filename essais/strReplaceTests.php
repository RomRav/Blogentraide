<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$s = str_replace("_", "zzz", "camel_to_snake");
echo $s;

$s = str_replace("___", "-", "camel___to___snake");
echo $s;

