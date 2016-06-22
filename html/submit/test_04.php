<?php
	// 주어진 배열의 짝수번째(홀수번째) 원소들만 출력하기
	$numbers = array(1, 2, 4, 8, 16);
	$even = array();
	$odd = array();
	
	$length = count($numbers);
	for ($index = 0; $index < $length; $index += 1) {
		if ($index % 2 == 0) {
			$even[] = $numbers[$index];
		}
		else {
			$odd[] = $numbers[$index];
		}
	}
	
	echo '짝수번째 : ';
	for ($index = 0; $index < count($even); $index += 1) {
		echo $even[$index].', ';
	}
	echo '<br>';
	
	echo '홀수번째 : ';
	for ($index = 0; $index < count($odd); $index += 1) {
		echo $odd[$index].', ';
	}
?>

<p>------------------------------------------------------------------</p>

<?php
	// 주어진 배열의 짝수번째(홀수번째) 원소들만 출력하기
	$numbers = array(1, 2, 4, 8, 16);
	
	$length = count($numbers);
	
	echo '짝수번째 : ';
	for ($index = 0; $index < $length; $index += 1) {
		if ($index % 2 == 0) {
			echo $numbers[$index].', ';
		}
	} // 1, 4, 16
	echo '<br>';
	
	echo '홀수번째 : ';
	for ($index = 0; $index < $length; $index += 1) {
		if ($index % 2 == 1) {
			echo $numbers[$index].', ';
		}
	} // 2, 8
?>

<p>------------------------------------------------------------------</p>

<?php
	// 월, 화, 수, 0, 목 (0이면 break)
	$arr = array('월', '화', '0', 0, '목');
	
	echo '요일 : ';
	for ($index = 0; $index < count($arr); $index += 1) {
		if ($arr[$index] === 0) {
			break;
		}
		else {
			echo $arr[$index].' ';
		}
	}
?>