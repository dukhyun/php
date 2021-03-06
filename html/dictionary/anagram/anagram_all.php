<?php
$local_url = '../..';
$nav_array = array();
$nav_array['Home'] = $local_url.'/index.php';
include $local_url.'/../section/header.php';
?>

<h1>Anagram all</h1>

<?php
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
	if (strlen($str1) != strlen($str2)) {
		return false;
	}
	
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
		$dic_arr[$tmp[0]] = str_arr($tmp[0]);
	}
}

fclose($file_handle);

//print_r($dic_arr);

/* 
foreach ($dic_arr as $index1 => $word1) {
	echo $word1.'('.$index1.')'.' : ';
	foreach ($dic_arr as $index2 => $word2) {
		if ($index1 != $index2) {
			if (is_anagram($word1, $word2) == true) {
				echo $word2.'('.$index2.')'.', ';
			}
		}
	}
	echo '<br>';
}
*/

asort($dic_arr);
// print_r($dic_arr);
$temp = '';
$temp_array = array();
foreach ($dic_arr as $word => $value) {
	if ($temp == $value) { // 쌍인 문자를 찾으면 배열에 추가
		$temp_array[] = $word;
	} else { // 문자가 서로 쌍이 아니면 배열 출력 후 초기화
		if (count($temp_array) > 1) {
			print_r($temp_array);
			echo '<br>';
		}
		
		unset($temp_array);
		$temp = $value;
		$temp_array[] = $word;
	}
}
?>

<?php include $local_url.'/../section/footer.php'; ?>