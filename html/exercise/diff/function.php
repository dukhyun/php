<?php
// string => array => string
function str_arr($str) {
	$arr = array();
	for ($index = 0; $index < strlen($str); $index += 1) {
		$arr[$index] = substr($str, $index, 1);
	}
	
	return $arr;
}

function str_arr_diff($str) {
	$arr = array();
	for ($index = 0; $index < strlen($str); $index += 1) {
		$arr[] = array('', substr($str, $index, 1));
	}
	
	return $arr;
}

// str insert from array to index
function insert_blank($array, $index) {
	// if ($array)
	
	for ($i = count($array)-1; $i >= $index; $i -= 1) {
		$array[$i+1] = $array[$i];
	}
	
	$array[$index] = array('blank', '');
	
	return $array;
}

function diff($arr, $diff, $i, $j) {
	$result = 0;
	$path = 0;
	
	if (!$diff[$i][$j]) { // diff not
		if ($arr[$i+1][$j] > 0 || $arr[$i][$j+1] > 0) {
			if ($arr[$i+1][$j] > $arr[$i][$j+1]) {
				$result = $arr[$i+1][$j];
				$path = 1;
			} else {
				$result = $arr[$i][$j+1];
				$path = 2;
			}
		}
	} else { // diff ok
		if ($arr[$i+1][$j+1] > 0) {
			$result = $diff[$i][$j] + $arr[$i+1][$j+1];
			$path = 3;
		} else if ($arr[$i+1][$j] > 0 || $arr[$i][$j+1] > 0) {
			if ($arr[$i+1][$j] > $arr[$i][$j+1]) {
				$result = $arr[$i+1][$j];
				$path = 1;
			} else {
				$result = $arr[$i][$j+1];
				$path = 2;
			}
		} else {
			$result = $diff[$i][$j];
			$path = 3;
		}
	}
	
	return array($result, $path);
}

function path_sc($a) {
	if ($a == 1) {
		$str = '↓';
	}
	else if ($a == 2) {
		$str = '→';
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