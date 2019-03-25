<?php

require_once 'Questions.php';
$Dao = new Questions();


$Dao->setIdQuestion(1);
$Dao->setQuestion("c'est quoi");
$Dao->setIdSujet(1);
$Dao->setDateQuestion(1);
$Dao->setDateQuestion("2019/11/20");



echo "IdQuestion : " . $Dao->getIdQuestion() . "<br>";
echo "Question : " . $Dao->getQuestion() . "<br>";
echo "IdSujet : " . $Dao->getIdSujet() . "<br>";
echo "IdUtilisateur : " . $Dao->getIdUtilisateur() . "<br>";
echo "DateQuestion : " . $Dao->getDateQuestion() . "<br>";
?>