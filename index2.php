<?php
$variable = 3;
if (is_bool($variable)){
    $type = 'bool';
}  elseif(is_float($variable)) {
    $type = 'float';
} elseif(is_int($variable)) {
    $type = 'int';
} elseif(is_string($variable)) {
    $type = 'string';
} elseif(is_null($variable)) {
    $type = 'null';
} elseif(is_array($variable)) {
    $type = 'other';
}
    echo "type is $type"
?>


<?php
$variable = 3.14; 
  switch (true) { 
    case is_bool($variable):
        $type = 'true'; 
    break;
    case is_float($variable):
        $type = 'float'; 
    break;
    case is_int($variable):
        $type = 'int'; 
    break;
    case is_string($variable):
        $type = 'string'; 
    break;
    case is_null($variable):
        $type = 'null'; 
    break;

    default:
    case is_array($variable):
        $type = 'array'; 
    break;
}
    echo "type is $type"

?>