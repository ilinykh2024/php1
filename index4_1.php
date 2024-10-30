<?php
echo "Введите свое имя - \n";
$name  = trim(fgets(STDIN));
$name1 = mb_strtoupper(mb_substr($name, 0,1)); 
$name2 = mb_substr($name, 1, NULL); 

echo "Введите отчество - \n";
$secondname  = trim(fgets(STDIN));
$secondname1 = mb_strtoupper(mb_substr($secondname, 0,1)); 
$secondname2 = mb_substr($secondname, 1, NULL); 

echo "Введите свою фамилию - \n";
$lastname    = trim(fgets(STDIN));
$lastname1 = mb_strtoupper(mb_substr($lastname, 0,1)); 
$lastname2 = mb_substr($lastname, 1, NULL); 

$fullName    = $lastname1 . $lastname2 . ' ' . $name1 . $name2 . ' ' . $secondname1 . $secondname2;
$fio = $lastname1 . $name1 . $secondname1;
$surnameAndInitials = $lastname1  . $lastname2  . ' ' . $name1 . '. ' . $secondname1 . '. ';

echo "Полное имя: " . $fullName , PHP_EOL;
echo "Фамилия и инициалы: " . $surnameAndInitials , PHP_EOL;
echo "Аббревиатура: " . $fio  , PHP_EOL;
