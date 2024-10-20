<?php
$number1 = trim(fgets(STDIN));
$number2 = trim(fgets(STDIN));
if (! is_int($number1) && ! is_int($number2)) {
fwrite(STDERR,"Пожайлуста, введите число");
}
if ($number2 == 0){
    fwrite(STDERR,"Делить на 0 нельзя");
}
else {
    fwrite(STDOUT, $number1 / $number2);
}
echo"$number1 / $number2";
?>