<?php
$local_url = '../';
$web_title = 'PHP 연습장';
$nav_array = array();
$nav_array['Home'] = $local_url.'';
include $_SERVER['DOCUMENT_ROOT'].'/../section/header.php';
?>

<h1 id="hh">Script8</h1>
<br>
<script>
var a = 1;
var b = 2;
function myFunc() {
	a = 5;
	var b = 5;
	var c = 5;
	d = 5;
}
</script>
<script>
document.write('javascript<br>');
myFunc();
document.write('a = ', a, '<br>');
document.write('b = ', b, '<br>');
document.write('c = ', c, '<br>');
document.write('d = ', d, '<br>');
</script>


<?php
$number = 4;
function my_function() {
	//global $number;
	$number = 3;
	return $number;
}
?>

<?php 
echo 'PHP<br>';
echo '지역변수 : '.my_function();
echo '<br>';
echo '전역변수 : '.$number;
?>

<?php include $_SERVER['DOCUMENT_ROOT'].'/../section/footer.php'; ?>