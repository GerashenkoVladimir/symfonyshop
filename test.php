<?php
$j = 0;
$k=0;
for ($i = 5; $i<= 80; $i++ ) {
    $j = $j + $i*$i;
    $k++;
    echo $k." => $i\n";
}

echo ($j/75)."\n";
echo (5*5 + 80*80)/2;