<?php
echo "Введите свое имя - \n";
$name  = trim(fgets(STDIN));
$word1 = mb_strtoupper(mb_substr($name, 0,1)); 
//$word1 = mb_strtoupper($word1);
$word2 = mb_substr($name, 1, NULL); 
echo $word1. $word2;