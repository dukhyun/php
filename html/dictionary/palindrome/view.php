<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<style>
	font#acc {
		// color: red;
		background-color: yellow;
	}
</style>

<p><a href="index.php">뒤로가기</a></p>

<?php
	// string => array => string
	function str_arr($str) {
		$arr = array();
		for ($index = 0; $index < strlen($str); $index += 1) {
			$arr[$index] = substr($str, $index, 1);
		}
		asort($arr);
		
		return $arr;
	}
	
	// array => string
	function arr_str($arr) {
		$str = '';
		foreach ($arr as $key => $valse) {
			$str .= $valse;
		}
		
		return $str;
	}
	
	// str => true&false
	function is_palin($str) {
		$len = strlen($str);
		
		$end = $len / 2;
		
		for ($i = 0; $i < $end; $i += 1) {
			if (substr($str, $i, 1) != substr($str, $len - $i - 1, 1)) {
				return false;
			}
		}
		
		return true;
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$input = $_POST['word'];
	}
	
	echo $input.'는 회문이 ';
	
	if (is_palin($input) === true) {
		echo '맞다';
	} else {
		echo '아니다';
	}
	
	
	echo '<br>';
	
	
	
	// $dic_array = array(); // 사전 Array

	// $file_name = 'dictionary.txt';
	// $file_handle = fopen($file_name, 'r') or die("읽기 실패!");
	
	// while (($line = fgets($file_handle)) !== false) {
		// $tmp = explode("\t", $line);
		// if (count($tmp) === 2) {
			// $dic_arr[$tmp[1]] = $tmp[0];
		// }
	// }
	
	// foreach ($dic_arr as $index => $word) {
		// if (strlen($input) == strlen($word)) {
			// if (is_anagram($input, $word) == true) {
				// echo $word.', ';
			// }
		// }
	// }
?>

</html>