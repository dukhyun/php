<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>

<p><a href="index.php">뒤로가기</a></p>

<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$input = $_POST['word'];
	}
	
	echo '단어 : '.$input.'<br>';

	$dic_arr = array();

	$file_name = 'dictionary.txt';
	$file_handle = fopen($file_name, 'r') or die("읽기 실패!");
	
	while (($line = fgets($file_handle)) !== false) {
		$arr_temp = explode("\t", $line);
		if (count($arr_temp) === 2) {
			$dic_arr[$arr_temp[0]] = $arr_temp[1];
			//$dic_arr[$word] = $rank
		}
	}
	
	echo $dic_arr[$input].'번째 단어입니다.<br>';
	
	
	function get_value($char) {
		return ord($char);
	}
?>

</html>