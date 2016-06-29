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
	// string => array
	function str_arr($str) {
		$arr = array();
		for ($index = 0; $index < strlen($str); $index += 1) {
			$arr[$index] = substr($str, $index, 1);
		}
		
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

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$input = $_POST['word'];
	}
	
	echo '입력한 문자 : '.$input.'<br>';
	
	$arr = array();
	
	$arr = str_arr($input);
	
	krsort($arr);
	
	echo '역순 문자 : '.arr_str($arr).'<br>';
?>

</html>