<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Chaine
 *
 * @author Administrateur
 */
class Chaine {

    /**
     * function camel2Snake
     * @param string $camel
     * @return string $snake
     */
    public static function camel2Snake(string $camel): string {
        $snake = strtolower($camel[0]);
//        $replace = "_";

        for ($i = 1; $i < strlen($camel); $i++) {
            //$snake[$i] = $camel[$i];
            if ($camel[$i] === strtoupper($camel[$i])) {
//                $replace = "_" . strtolower($camel[$i]);
//                $snake .= str_replace($camel[$i], $replace, $snake);
                $snake .= "_" . strtolower($camel[$i]);
            } else {
                $snake .= $camel[$i];
            }
        }


        return $snake;
    }

    /**
     * function snake2Camel
     * @param string $snake
     * @return string $camel
     */
    public static function snake2Camel(string $snake): string {
        $camel = "";
        $motifSnake = "_";

//        for ($i = 0; $i < strlen($snake); $i++) {
//            if ($snake[$i] === "_") {
//                $camel = str_replace($motifSnake, strToUpper($snake[$i + 1]), $snake);
//                $camel[$i + 1] = " ";
//                $camel = str_replace(" ", "", $camel);
//            }
//           
//        }
        // id_du_produit -> idDuProduit

//        $lbUnderscore = false;
//        $camel = strtolower($snake[0]);
//
//        $i = 1;
//        while ($i < strlen($snake)) {
//            $c = $snake[$i];
//            if ($c === "_") {
//                $lbUnderscore = true;
//                $i++;
//            }
//            if ($lbUnderscore) {
//                $c = $snake[$i];
//                $camel .= strtoupper($c);
//                $lbUnderscore = false;
//            } else {
//                $camel .= $c;
//            }
//
//            $i++;
//        }

        /*
         * 
         */
        // id_du_produit -> idDuProduit
        $t = explode("_", $snake);
        $camel = strtolower($t[0]);
        
        for ($i = 1; $i < count($t); $i++) {
            $camel .= strtoupper($t[$i][0]) . strtolower(substr($t[$i], 1));
        }
        

        return $camel;
    }

}
