<?php
$date_begin = '2024-10-01';
$days       = date('t');

$datetime = DateTime::createFromFormat('Y-m-d', $date_begin);
$workday  = 2;
echo "date\ti\tday\twork" . PHP_EOL;
for ($i = 0; $i < $days; ++$i)
{
    ++$workday;
    if (date('N', strtotime($datetime->format('d-m-Y'))) < 6 and $workday > 2)
    {
        $workday = 0;
    }
    echo $datetime->format('d-m-Y') . "\t" . $i . "\t" . date('N', strtotime($datetime->format('d-m-Y')));
    if ($workday == 0)
        echo '+';
    echo PHP_EOL;
    $datetime->modify('+1 days');
}