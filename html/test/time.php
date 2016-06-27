<?php
$local_url = '../';
$nav_array = array();
$nav_array['Home'] = $local_url.'index.php';
include $_SERVER['DOCUMENT_ROOT'].'/../section/header.php';
?>

<div class="main_content">
<?php
	$date = date('Y-m-d H:i:s');
	echo $date.'<br>';
	// echo date('m-d', strtotime($date)).'<br>';
	date_default_timezone_set('GMT+0');
	echo 'GMT : '.date('Y-m-d H:i:s').'<br>';
	date_default_timezone_set('Europe/London');
	echo 'UTC : '.date('Y-m-d H:i:s').'<br>';
	date_default_timezone_set('Pacific/Pitcairn');
	echo 'PST : '.date('Y-m-d H:i:s').'<br>';
	date_default_timezone_set("Asia/Seoul");
	echo '한국 : '.date('Y-m-d H:i:s').'<br>';
	
	// $date = new DateTime('NOW');
	// echo $date->format("Y M G i s");
	// $date = date_timezone_set($date, new DateTimeZone('Asia/Seoul'));
	
	$date = date('Y-m-d H:i:s', $date);
	$date = strtotime($date);
	echo $date.'<br>';
	$timezone = 'Asia/Seoul';
	$date = strtotime($date.' '.$timezone);
	echo $date.'<br>';
	echo ''.date('Y-m-d H:i:s', $date).'<br>';
?>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'].'/../section/footer.php'; ?>