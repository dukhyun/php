<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>

<p><a href="index.php">돌아가기</a></p>

<h1>ord(), substr() 연습</h1>

<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$input = $_POST['word'];
	}
	
	// string => int
	// 대, 소문자 구분x
	function get_number($char) {
		if ($char >= 'a' && $char <= 'z') {
			return ord($char) - ord('a') + 1;
		}
		else if ($char >= 'A' && $char <= 'Z') {
			return ord($char) - ord('A') + 1;
		}
		
		return false;
	}
	
	// 문자열의 합
	function get_number_sum($str) {
		$sum = 0;
		
		for ($index = 0; $index < strlen($str); $index += 1) {
			$sum += get_number(substr($str, $index, 1));
		}
		
		return $sum;
	}
	
	echo $input.' 문자열 합 => '.get_number_sum($input).'<br>';
	echo '<br><br>';
	echo '문자->숫자<br>';
	for ($index = 0; $index < strlen($input); $index += 1) {
		echo substr($input, $index, 1).' => '.get_number(substr($input, $index, 1)).'<br>';
	}
?>

</html>