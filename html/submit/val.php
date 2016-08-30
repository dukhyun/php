<?php
$local_url = '../';
$nav_array = array();
$nav_array['Home'] = $local_url.'/index.php';
include $local_url.'../section/header.php';
?>

<?php
$a = 0;
$b = 1;
echo '<br>정수타입: ';
var_dump($a, $b);
echo '<br>floatval: ';
var_dump(floatval($a), floatval($b));
echo '<br>strval: ';
var_dump(strval($a), strval($b));
echo '<br>boolval: ';
var_dump(boolval($a), boolval($b));
echo '<br><br>';
?>

<?php
$a = floatval(0.0);
$b = floatval(1.9);
echo '<br>float타입: ';
var_dump($a, $b);
echo '<br>intval: ';
var_dump(intval($a), intval($b));
echo '<br>strval: ';
var_dump(strval($a), strval($b));
echo '<br>boolval: ';
var_dump(boolval($a), boolval($b));
echo '<br><br>';
?>

<?php
$a = '';
$b = '0';
$c = '0.0';
$d = '1.9';
echo '<br>문자열타입: ';
var_dump($a, $b, $c, $d);
echo '<br>intval: ';
var_dump(intval($a), intval($b), intval($c), intval($d));
echo '<br>floatval: ';
var_dump(floatval($a), floatval($b), floatval($c), floatval($d));
echo '<br>boolval: ';
var_dump(boolval($a), boolval($b), boolval($c), boolval($d));
echo '<br><br>';
?>

<?php
$a = true;
$b = false;
echo '<br>논리타입: ';
var_dump($a, $b);
echo '<br>intval: ';
var_dump(intval($a), intval($b));
echo '<br>floatval: ';
var_dump(floatval($a), floatval($b));
echo '<br>strval: ';
var_dump(strval($a), strval($b));
echo '<br><br>';
?>

<?php
$arr = array('', 'a');
print_r($arr);
echo '<br>intval: ';
var_dump(intval($arr[0]), intval($arr[1]));
echo '<br>floatval: ';
var_dump(floatval($arr[0]), floatval($arr[1]));
echo '<br>strval: ';
var_dump(strval($arr[0]), strval($arr[1]));
echo '<br>boolval: ';
var_dump(boolval($arr[0]), boolval($arr[1]));
echo '<br><br>';
?>

<?php
$null = NULL;
var_dump($null);
echo '<br>intval: ';
var_dump(intval($null));
echo '<br>floatval: ';
var_dump(floatval($null));
echo '<br>strval: ';
var_dump(strval($null));
echo '<br>boolval: ';
var_dump(boolval($null));
echo '<br><br>';
?>


<?php include $local_url.'/../section/footer.php';