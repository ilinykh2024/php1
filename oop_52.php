<?php
echo "напишите номар мсяца : " . PHP_EOL;
$a = (int) trim(fgets(STDIN));
echo "напишите год : " . PHP_EOL;
$d = (int) trim(fgets(STDIN));

$date_begin = date('Y-m-d', mktime(0, 0, 0, $a, 01, $d));
$days       = cal_days_in_month(CAL_GREGORIAN, date($a), date($d));

$datetime = DateTime::createFromFormat('Y-m-d', $date_begin);

echo date('F', mktime(0, 0, 0, $a+1, 0, 0)). PHP_EOL;
echo "date\ti\tday\twork" . PHP_EOL;

dayWorks($datetime, $days);

function dayWorks ($datetime, $days) {
    $datetime1 = $datetime;
    $timing = $days;
    $workday  = 2;
    for ($i = 1; $i <= $timing; ++$i)
{
    ++$workday;
    if (date('N', strtotime($datetime1->format('d-m-Y'))) < 6 and $workday > 2)
    {
        $workday = 0;
    }
    echo $datetime1->format('d-m-Y') . "\t" . $i . "\t" . date('N', strtotime($datetime1->format('d-m-Y')));
    if ($workday == 0)
        echo '+';
    echo PHP_EOL;
    $datetime1->modify('+1 days');
}
}