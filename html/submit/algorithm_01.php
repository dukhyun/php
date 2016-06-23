<?php
$local_url = '../';
$nav_array = array();
$nav_array['Home'] = $local_url.'index.php';
include $local_url.'header.php';
?>

<?php
	// (0, 1, 2) = 3
	// count($array); // 배열 길이 length
	// print_r($array);
	// array_merge(...); // 배열 이어 붙이기
?>

<p>======================================================================</p>

배열 이어 붙이기<br>
<?php
	$arr1 = array(1, 1, -100, 1, 1, 1);
	$arr2 = array(1, -1, 1, -1, 1);
	$arr3 = array(-1, 1, -1);
	
	echo count($arr1).'<br>';
	echo count($arr2).'<br>';
	echo count($arr3).'<br>';
	
	$array = array_merge($arr1, $arr2, $arr3);
	
	//print_r($array);
	echo count($array).'<br>';
?>

<p>======================================================================</p>

같은 원소가 연속된 길이 구하기<br>
<?php
	// subarray
	$arr1 = array(1, 1, -100, 1, 1, 1);
	$arr2 = array(1, -1, 1, -1, 1);
	$arr3 = array(-1, 1, -1);
	$subarray = array();
	$temp = array();
	
	$length = count($arr1);
	for ($index = 0; $index < $length; $index += 1) {
		if (count($temp) == 0) {
			$temp[] = $arr1[$index];
		}
		else if ($temp[count($temp) - 1] == $arr1[$index]) {
			$temp[] = $arr1[$index];
		}
		else {
			$temp = array();
		}
		
		if (count($temp) > count($subarray)) {
			$subarray = $temp;
		}
	}
	echo 'arr1 subarray = '.count($subarray).'<br>';
	$subarray = array();
	$temp = array();
	
	$length = count($arr2);
	for ($index = 0; $index < $length; $index += 1) {
		if (count($temp) == 0) {
			$temp[] = $arr2[$index];
		}
		else if ($temp[count($temp) - 1] == $arr2[$index]) {
			$temp[] = $arr2[$index];
		}
		else {
			$temp = array();
		}
		
		if (count($temp) > count($subarray)) {
			$subarray = $temp;
		}
	}
	echo 'arr2 subarray = '.count($subarray).'<br>';
	$subarray = array();
	$temp = array();
	
	$length = count($arr3);
	for ($index = 0; $index < $length; $index += 1) {
		if (count($temp) == 0) {
			$temp[] = $arr3[$index];
		}
		else if ($temp[count($temp) - 1] == $arr3[$index]) {
			$temp[] = $arr3[$index];
		}
		else {
			$temp = array();
		}
		
		if (count($temp) > count($subarray)) {
			$subarray = $temp;
		}
	}
	echo 'arr3 subarray = '.count($subarray).'<br>';
	//$subarray = array();
	//$temp = array();
?>

<p>======================================================================</p>

연속된 원소의 값의 최대, 최소값<br>
<?php
	// subarray
	$arr1 = array(1, 1, -100, 1, 1, 1);
	$arr2 = array(1, -1, 1, -1, 1);
	$arr3 = array(-1, 1, -1);
	
	$arr_max = array();
	$arr_min = array();
	
	$sum = 0;
	$max = 0;
	$min = 0;
	
	for ($index = 0; $index < count($arr1); $index += 1) {
		for ($length = $index; $length < count($arr1); $length += 1) {
			$sum += $arr1[$length]; // $index 부터 $length 만큼 원소를 더한 값
			
			if ($min >= $sum) {
				$min = $sum;
				$arr_min = array_slice($arr1, $index, $length+1-$index);
			}
			if ($max <= $sum) {
				$max = $sum;
				$arr_max = array_slice($arr1, $index, $length+1-$index);
			}
		}
		$sum = 0;
	}
	
	echo 'arr1 max : ';
	print_r($arr_max);
	echo '<br>';
	echo 'arr1 min : ';
	print_r($arr_min);
	echo '<br>';
	
	$arr_max = array();
	$arr_min = array();
	
	$sum = 0;
	$max = 0;
	$min = 0;
	
	for ($index = 0; $index < count($arr2); $index += 1) {
		for ($length = $index; $length < count($arr2); $length += 1) {
			$sum += $arr2[$length];
			
			if ($min >= $sum) {
				$min = $sum;
				$arr_min = array_slice($arr2, $index, $length+1-$index);
			}
			if ($max <= $sum) {
				$max = $sum;
				$arr_max = array_slice($arr2, $index, $length+1-$index);
			}
		}
		$sum = 0;
	}
	
	echo 'arr2 max : ';
	print_r($arr_max);
	echo '<br>';
	echo 'arr2 min : ';
	print_r($arr_min);
	echo '<br>';
	
	$arr_max = array();
	$arr_min = array();
	
	$sum = 0;
	$max = 0;
	$min = 0;
	
	for ($index = 0; $index < count($arr3); $index += 1) {
		for ($length = $index; $length < count($arr3); $length += 1) {
			$sum += $arr3[$length];
			
			if ($min >= $sum) {
				$min = $sum;
				$arr_min = array_slice($arr3, $index, $length+1-$index);
			}
			if ($max <= $sum) {
				$max = $sum;
				$arr_max = array_slice($arr3, $index, $length+1-$index);
			}
		}
		$sum = 0;
	}
	
	echo 'arr3 max : ';
	print_r($arr_max);
	echo '<br>';
	echo 'arr3 min : ';
	print_r($arr_min);
	echo '<br>';
?>

<p>======================================================================</p>

<?php
	// subarray
	$arr1 = array(1, 1, -100, 1, 1, 1);
	$arr2 = array(1, -1, 1, -1, 1);
	$arr3 = array(-1, 1, -1);
	
	function subarray($array) {
		$arr_max = array();
		$sum = 0;
		$max = 0;
		for ($index = 0; $index < count($array); $index += 1) {
			for ($leng = $index; $leng < count($array); $leng += 1) {
				$sum += $array[$leng];
				
				if ($max <= $sum) {
					$max = $sum;
					$arr_max = array_slice($array, $index, ($leng-$index)+1);
				}
			}
			$sum = 0;
		}
		
		//return $max;
		return $arr_max;
	}
	
	//echo subarray($arr1).'<br>';
	//echo subarray($arr2).'<br>';
	//echo subarray($arr3).'<br>';
?>

arr1 : <?php print_r(subarray($arr1)); ?><br>
arr2 : <?php print_r(subarray($arr2)); ?><br>
arr3 : <?php print_r(subarray($arr3)); ?><br>

<?php include $local_url.'footer.php'; ?>