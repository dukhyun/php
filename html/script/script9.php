<?php
$local_url = '../';
$web_title = 'PHP 연습장';
$nav_array = array();
$nav_array['Home'] = $local_url.'';
include $_SERVER['DOCUMENT_ROOT'].'/../section/header.php';
?>

<h1 id="hh">Script9</h1>
<br>
<header>
<script>
function myFunction() {
	var array = [1, 2, 3];
	var map = { member1 : 'string value', member2 : 2345 };
	document.write(array, '<br>');
	// document.write(map, '<br>');
	document.write(map.member1, '<br>');
	document.write(map.member2, '<br>');
}
</script>
</header>

<script>
myFunction();
</script>
<?php
	$array = array(1, 2, 3);
	$map = array('member1' => 'string value', 'member2' => 2345);
	var_dump($array);
	echo '<br>';
	var_dump($map);
?>

<?php include $_SERVER['DOCUMENT_ROOT'].'/../section/footer.php'; ?>