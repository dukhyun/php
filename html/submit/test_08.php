<?php
	$days = array('월요일', '화요일', '수요일', '목요일', '금요일', '토요일', '일요일');

	$days = implode('과 ', $days); // Array -> 문자열
	echo $days;
	echo '<br>';
	$days = explode('과 ', $days); // 문자열 -> Array
	print_r($days);
	echo '<br>';
?>

<?php
	$days = '월 화 수 목';
	$days_array = array();
	
	$token = strtok($days, ' ');
	while ($token != false) {
		$days_array[] = $token;
	    $token = strtok(' ');
	}
	
	print_r($days_array);
?>