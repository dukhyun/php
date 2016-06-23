<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>

<p><a href="../index.php">돌아가기</a></p>

<h1>strcmp 연습</h1>

<?php
	$str1 = 'abc';
	$str2 = 'ABC';
	
	echo 'str1 = '.$str1.'<br>';
	echo 'str2 = '.$str2.'<br>';
	echo 'strcmp = '.strcmp($str1, $str2).'<br>';
	// 바이너리 안전 문자열 비교
	echo 'strnatcmp = '.strnatcmp($str1, $str2).'<br>';
	// "자연순" 알고리즘을 이용한 문자열 비교
	echo 'strcasecmp = '.strcasecmp($str1, $str2).'<br>';
	// 대소문자 구분 없는 바이너리 안전 문자열 비교
	echo 'strnatcasecmp = '.strnatcasecmp($str1, $str2).'<br>';
	// "자연순" 알고리즘을 이용한 대소문자 구분 없는 문자열 비교
?>


</html>