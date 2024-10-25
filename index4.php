<?php
echo "Введите свое имя - \n";
$name        = ucfirst(trim(fgets(STDIN)));
echo "Введите отчество - \n";
$secondname  = ucfirst(trim(fgets(STDIN)));
echo "Введите свою фамилию - \n";
$lastname    = ucfirst(trim(fgets(STDIN)));
$fullName    = $name . ' ' . $secondname . ' ' . $lastname;
$fio         = substr($name, 0, 1) . substr($secondname, 0, 1). substr($lastname, 0, 1);
$surnameAndInitials = $name . ' ' . substr($secondname, 0, 1). '.'. substr($lastname, 0, 1) . '.';
echo "Полное имя: " . $fullName , PHP_EOL;
echo "Фамилия и инициалы: " . $surnameAndInitials , PHP_EOL;
echo "Аббревиатура: " . $fio  , PHP_EOL;
