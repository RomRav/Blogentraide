<?php

function solution1(int $n): string {
    $resul = "";
    $compt = "";
    if ($n >= 10 && $n > 0) {

        for ($i = 1; $i <= $n; $i++) {
            $compt = $i;
            if ($compt[0] < $compt[1] && $compt[1] < $compt[1] + 1) {
                $resul = $compt;
            } else {
                $resul = "0";
            }
        }
    } else {
        $resul = $n;
    }
    return $resul;
}

$n = 12;
$resl = solution1($n);
echo $resl;

//$test = "4";
//echo $test[0] . "<br>";
//echo $test[0] + 1;
//echo "<br>" . $test[0 + 1] . "<br>";
?>