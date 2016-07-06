<?php
$local_url = '../';
$web_title = 'PHP 연습장';
$nav_array = array();
$nav_array[Home] = $local_url.'';
include $_SERVER['DOCUMENT_ROOT'].'/../section/header.php';
?>

<h1>Script3</h1>
<br>
<script>
function myFunction(inputString) {
	document.write(inputString);
}
function myFunction2(inputString) {
	document.write('Func2 ' + inputString);
}
var someFunction = myFunction2;
</script>

<?php
// $myFunction = function myFunction(input String) {}
?>
<script>myFunction('myFunction');</script>
<br>
<script>myFunction2('myFunction2');</script>
<br>
<script>someFunction('someFunction');</script>
<br>
<script>
someFunction = myFunction;
someFunction(Date());
</script>
<br>

<?php include $_SERVER['DOCUMENT_ROOT'].'/../section/footer.php'; ?>