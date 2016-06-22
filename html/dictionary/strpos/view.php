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
	function acc_keyword($str, $key) {
		if (strpos($str, $key) > 0) {
			echo substr($str, 0, strpos($str, $key));
		}
		// font#acc { color:red; background-color:yellow; }
		echo '<font id="acc">'.substr($str, strpos($str, $key), strlen($key)).'</font>';
		if (strlen($str) > (strlen($key) + strpos($str, $key))) {
			echo substr($str, strlen($key) + strpos($str, $key), strlen($str) - (strlen($key) + strpos($str, $key)));
		}
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$input = $_POST['word'];
	}
	
	echo '찾을 문자 : '.$input.'<br>';
	
	//echo strlen($input).'<br>';

	$file_name = 'dictionary.txt';
	$file_handle = fopen($file_name, 'r') or die("읽기 실패!");
	
	while (($line = fgets($file_handle)) !== false) {
		$tmp = explode("\t", $line);
		if (strpos($tmp[0], $input) !== false) {
			//echo strpos($tmp[0], $input).' ';
			//echo $tmp[0].'<br>';
			echo acc_keyword($tmp[0], $input).'<br>';
		}
	}
?>

</html>