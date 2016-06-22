<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>

<p><a href="index.php">돌아가기</a></p>

<h1>정렬하기</h1>

<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$input = $_POST['word'];
	}
	
	// string => int
	// 대, 소문자 구분x
	function get_number($str) {
		$char = substr($str, 0, 1);
		
		if ($char >= 'a' && $char <= 'z') {
			return ord($char) - ord('a') + 1;
		}
		else if ($char >= 'A' && $char <= 'Z') {
			return ord($char) - ord('A') + 1;
		}
		
		return false;
	}

	$input_file = 'dictionary.txt';
	$file_handle = fopen($input_file, 'r') or die("읽기 실패!");
	$arr_temp = array();
	while (($line = fgets($file_handle)) !== false) {
		$arr_temp = explode("\t", $line);
		if (count($arr_temp) === 2) {
			//$dic_arr[$arr_temp[0]] = $arr_temp[1];
			$dic_arr[$arr_temp[0]] = get_number($arr_temp[0]);
		}
	}
	
	$output_file = 'dic_sort.txt';
	// 이전 파일 삭제
	if (file_exists($output_file) == true) {
		// is_file($file_name) ?
		unlink($output_file);
	}
	$file_handle = fopen($output_file, 'a') or die("쓰기 실패!");
	
	// 정렬하기
	asort($dic_arr); // $value 값으로 정렬
	foreach ($dic_arr as $key => $value) {
		echo "$key => $value<br>";
		fwrite($file_handle, "$key\t$value\n") or die("Could not write to file");
	}
	fclose($file_handle);
?>

</html>