<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>

<?php
	$local_url = '../';
	$navy = array();
	$navy[Home] = $local_url.'index.php';
	include $local_url.'savefrom/navybar.php';
?>

<div class="main_content">
<?php
	$date = date('Y-m-d H:i:s');
	echo $date.'<br>';
	echo date('m-d', strtotime($date)).'<br>';
	date_default_timezone_set('Europe/London');
	echo 'UTC : '.date('Y-m-d H:i:s').'<br>';
	date_default_timezone_set('Pacific/Pitcairn');
	echo 'PST : '.date('Y-m-d H:i:s').'<br>';
	date_default_timezone_set("Asia/Seoul");
?>
</div>

</body>
</html>