<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>

<p><a href="index.php">뒤로가기</a></p>

<h1>쌍 찾기</h1>

<?php
	//$start_time = array_sum(explode(' ', microtime()));

	// string => array => string
	function str_arr($str) {
		$arr = array();
		for ($index = 0; $index < strlen($str); $index += 1) {
			$arr[$index] = substr($str, $index, 1);
		}
		asort($arr);
		
		return arr_str($arr);
	}
	
	// array => string
	function arr_str($arr) {
		$str = '';
		foreach ($arr as $key => $valse) {
			$str .= $valse;
		}
		
		return $str;
	}
	
	// str, str => true&false
	function is_anagram($str1, $str2) {
		if (str_arr($str1) == str_arr($str2)) {
			return true;
		} else {
			return false;
		}
	}
	
	$dic_array = array(); // 사전 Array

	$file_name = 'dictionary.txt';
	$file_handle = fopen($file_name, 'r') or die("읽기 실패!");
	
	while (($line = fgets($file_handle)) !== false) {
		$tmp = explode("\t", $line);
		if (count($tmp) === 2) {
			$dic_arr[$tmp[1]] = $tmp[0];
		}
	}
	
	//print_r($dic_arr);
	
	foreach ($dic_arr as $index1 => $word1) {
		echo $word1.'('.$index1.')'.' : ';
		foreach ($dic_arr as $index2 => $word2) {
			if ($index1 != $index2 && strlen($word1) == strlen($word2)) {
				if (is_anagram($word1, $word2) == true) {
					echo $word2.'('.$index2.')'.', ';
				}
			}
		}
		echo '<br>';
	}
	
	//$end_time = array_sum(explode(' ', microtime()));

	//echo 'TIME : '.($end_time - $start_time);
?>

</html>