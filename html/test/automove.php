<meta http-equiv="refresh" content="3; url='index.php'">

<?php
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		$prev_url = $_GET['purl'];
	}
	printf('<meta http-equiv="refresh" content="3; url=\'%s\'">', $prev_url);
	echo $prev_url.'<br>';
?>