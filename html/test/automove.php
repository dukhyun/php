<meta http-equiv="refresh" content="3; url='index.php'">

<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	if (isset($_GET['purl'])) {
		$prev_url = $_GET['purl'];
	}
}

isset($prev_url) or die('$prev_url is not value.');
printf('<meta http-equiv="refresh" content="3; url=\'%s\'">', $prev_url);
echo $prev_url.'<br>';
?>