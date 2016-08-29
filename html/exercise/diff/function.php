<?php
// string => array => string
function str_arr($str) {
	$arr = array();
	for ($index = 0; $index < strlen($str); $index += 1) {
		$arr[$index] = substr($str, $index, 1);
	}
	
	return $arr;
}

// Array(class, char)
function str_arr_diff($str) {
	$arr = array();
	for ($index = 0; $index < strlen($str); $index += 1) {
		$arr[] = array('', substr($str, $index, 1));
	}
	
	return $arr;
}

// str insert from array to index
function insert_blank($array, $index) {
	for ($i = count($array)-1; $i >= $index; $i -= 1) {
		$array[$i+1] = $array[$i];
	}
	
	$array[$index] = array('blank', null);
	
	return $array;
}

// $arr : 현재까지 계산된 부분
// $match_array : 0, 1의 2차원 array
function diff_cell($arr, $match_array, $i, $j) {
	// $result : result array value
	// $path : 방향
	if (isset($arr[$i+1][$j])) {
		$right = $arr[$i+1][$j];
	} else {
		$right = 0;
	}
	
	if (isset($arr[$i][$j+1])) {
		$bottom = $arr[$i][$j+1];
	} else {
		$bottom = 0;
	}
	
	if (isset($arr[$i+1][$j+1])) {
		$diagonal = $arr[$i+1][$j+1];
	} else {
		$diagonal = 0;
	}

	if ($right > $bottom) {
		$result = $right;
		$path = 1;
	} else {
		$result = $bottom;
		$path = 2;
	}
	
	if ($match_array[$i][$j] === 1) {
		if ($diagonal + 1 > $result) {
			$result = $diagonal + 1;
			$path = 3;
		}
	}
	
	if ($result == 0) {
		$path = 0;
	}
	
	return array($result, $path);
}

function path_sc($a) {
	if ($a == 1) {
		$str = '→';
	}
	else if ($a == 2) {
		$str = '↓';
	}
	else if ($a == 3) {
		$str = '↘';
	}
	else {
		$str = '＊';
	}
	
	return $str;
}
?>