<?php
$local_url = '../';
$web_title = 'PHP 연습장';
$nav_array = array();
$nav_array[Home] = $local_url.'';
include $_SERVER['DOCUMENT_ROOT'].'/../section/header.php';
?>

<h1 id="hh">Script5</h1>
<br>
<script>
function myFunction() {
	this.style.color = 'red';
}
function myFunction2() {
	this.style.color = 'blue';
}
</script>

<span id="on">onclick</span>
<script>
document.getElementById('on').onclick = myFunction;
document.getElementById('hh').onclick = myFunction2;
</script>

<?php include $_SERVER['DOCUMENT_ROOT'].'/../section/footer.php'; ?>