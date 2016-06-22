<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>

<p><a href="index.php">돌아가기</a></p>

<h1>ord(), substr() 연습</h1>

<?php
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

	$file_name = 'dictionary.txt';
	$file_handle = fopen($file_name, 'r') or die("읽기 실패!");
	
	while (($line = fgets($file_handle)) !== false) {
		$arr_temp = explode("\t", $line);
		if (count($arr_temp) === 2) {
			$dic_arr[$arr_temp[0]] = $arr_temp[1];
			//$dic_arr[$word] = $rank
		}
	}
	
	foreach ($dic_arr as $key => $value) {
		echo $key.' 문자열 합 => '.get_number_sum($key).'<br>';
	}
?>

</html>