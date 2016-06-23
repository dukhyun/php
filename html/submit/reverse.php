<?php
$local_url = '../';
$nav_array = array();
$nav_array['Home'] = $local_url.'index.php';
include $local_url.'header.php';
?>

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

<?php include $local_url.'footer.php'; ?>