<?php
$an_int =  __LINE__; //4;
$a_str =  __FILE__; //'index.php';
echo "Номер строки " . $an_int . " Название текущего файла " . $a_str;
?>



<?php
$a_str = <<<HERE
This is line 1
This is line 2
This is line 3
HERE;
?>

<?php
$a='Рыба';
$b='человек';
echo  $a . ' рыбою сыта, а ' . $b . ' человеком';
?>