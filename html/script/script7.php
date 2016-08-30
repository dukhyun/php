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
var global = 'global'; // 선언
function myFunction() {
	var loacal = 'local';
	local = 'new local'; // 사용1
	global = 'new global';
	mistake = 'value'; // 선언, var 없음
	function myFunction2() {
		var local2 = 'local2'; // 선언
		var local3 = local; // 선언&사용2
		global = 'new value'; // 사용
	}
}
</script>
</header>

<?php
$global = 'global';
function my_function() {
	$local = 'local';
	$local = 'new local';
	$global = 'new global';
}
my_function();
?>

<?php include $_SERVER['DOCUMENT_ROOT'].'/../section/footer.php'; ?>