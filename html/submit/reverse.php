<?php
$str = 'ear';
$arr = array();

for ($i = 0; $i < strlen($str); $i += 1) {
    $arr[] = substr($str, $i, 1);
}

//print_r($arr);

krsort($arr);

//print_r($arr);

$result = '';

foreach ($arr as $key => $value) {
    $result .= $value;
}

echo $result;
?>