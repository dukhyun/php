<?php
// text line to array
function line_array($txt) {
	$array = array();
	$array = explode("\r\n", $txt);
	
	return $array;
}

function match_index($diff_a, $diff_b) {
	// 서로같은 라인 체크
	$match_check = array();
	foreach ($diff_a as $a => $str_a) {
		foreach ($diff_b as $b => $str_b) {
			// strcmp(a, b) : 문자열이 일치하면 false
			if ($str_a == $str_b) {
				$match_check[$a][$b] = 1;
			} else {
				$match_check[$a][$b] = 0;
			}
		}
	}
	
	// 루트 라인 구하기
	$temp = array();
	$path_length = array();
	$path = array();
	for ($a = count($match_check) - 1; $a >= 0; $a -= 1) {
		for ($b = count($match_check[$a]) - 1; $b >= 0; $b -= 1) {
			$temp = diff_cell($path_length, $match_check, $a, $b);
			$path_length[$a][$b] = $temp[0];
			$path[$a][$b] = $temp[1];
		}
	}
	unset($temp);
	
	// 최적루트 구하기
	$match_index_a = array();
	$match_index_b = array();
	$temp = -1;
	foreach ($diff_a as $a => $str_a) {
		for ($b = $temp + 1; $b < count($diff_b); $b += 1) {
			if ($path[$a][$b] == 3) { // match
				// $match_index[] = array($a, $b);
				$match_index_a[] = $a;
				$match_index_b[] = $b;
				$temp = $b;
				break;
			} else if ($path[$a][$b] == 1) {
				$temp = $b - 1;
				break;
			}
		}
	}
	unset($temp);
	
	return array('a'=>$match_index_a, 'b'=>$match_index_b);
}

// array, array, int, int
function diff_cell($length, $match, $i, $j) {
	if (isset($length[$i+1][$j])) {
		$right = $length[$i+1][$j];
	} else {
		$right = 0;
	}
	
	if (isset($length[$i][$j+1])) {
		$bottom = $length[$i][$j+1];
	} else {
		$bottom = 0;
	}
	
	if (isset($length[$i+1][$j+1])) {
		$diagonal = $length[$i+1][$j+1];
	} else {
		$diagonal = 0;
	}

	if ($right > $bottom) {
		$path_length = $right;
		$path = 1;
	} else {
		$path_length = $bottom;
		$path = 2;
	}
	
	if ($match[$i][$j] === 1) {
		if ($diagonal + 1 > $path_length) {
			$path_length = $diagonal + 1;
			$path = 3;
		}
	}
	
	if ($path_length == 0) {
		$path = 0;
	}
	
	return array($path_length, $path);
}

function array_table($array) {
	foreach ($array as $b => $str_b) {
		echo '<ul class="clearboth">';
		// printf('<li class="floatleft">%d</li>', $str_b);
		foreach ($array[$b] as $a => $str_a) {
			printf('<li class="floatleft">%d</li>', $array[$a][$b]);
		}
		echo '</ul>';
	}
}