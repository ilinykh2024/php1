<?php
echo "Введите свое имя";
$name = trim(fgets(STDIN));
echo "Введите отчество";
$secondname = trim(fgets(STDIN));
echo "Введите своюфамилию";
$lastname = trim(fgets(STDIN));
//$fullname = $name . " " . $secondname . " " . $lastname;

echo $name .  $secondname . $lastname;//$fullname;