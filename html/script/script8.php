<?php
$local_url = '../';
$web_title = 'PHP 연습장';
$nav_array = array();
$nav_array['Home'] = $local_url.'';
include $_SERVER['DOCUMENT_ROOT'].'/../section/header.php';
?>

<h1 id="hh">Script7</h1>
<br>
<header>
<script>
var number = 5;
</script>
</header>

<?php
$number = 4;
function my_function() {
	//global $number;
	$number = 3;
	return $number;
}
?>

<?php 
echo '지역변수 : '.my_function();
echo '<br>';
echo '전역변수 : '.$number;
?>

<?php include $_SERVER['DOCUMENT_ROOT'].'/../section/footer.php'; ?>