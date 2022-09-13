<?php

$array = [20,65,682,1050,1558,4032,5065,5095,6063,15000];

$j=1;
for ($i=0; $i < 9; $i++) { 
    $diff[] = $array[$j] - $array[$i];
    $j++;
}

foreach ($diff as $value) {
    if ($value % 4 == 0) {
        $result[] = $value;
    }
}

print_r($result);
