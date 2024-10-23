<?php
$number1 = trim(fgets(STDIN));
$number2 = trim(fgets(STDIN));
if (!is_numeric($number1) or !is_numeric($number2)) {
fwrite(STDERR,"Пожайлуста, введите число");
}
if ($number2 == 0){
    fwrite(STDERR,"Делить на 0 нельзя");
}
else {
    fwrite(STDOUT, $number1 / $number2);
}
?>