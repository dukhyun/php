<?php
$local_url = '..';
$nav_array = array();
$nav_array['Home'] = '/index.php';
include $local_url.'/../section/header.php';
?>

<?php
	function sum_total($array) {
		// 모든 원소의 값의 합을 반환
		$sum = 0;
		foreach ($array as $key => $value) {
			$sum += $value;
		}
		return $sum;
	}
?>

1 + 2 + 3 = <?php echo sum_total(array(1, 2, 3)); ?>
<br>
4 + 2 + 9 + 12 = <?php echo sum_total(array(4, 2, 9, 12)); ?>


<p>======================================================================</p>

<?php
	// 정렬된 배열 2개를 합쳐서 반환
	function sort_merge_array($arr1, $arr2) {
		$array = array_merge($arr1, $arr2);
		asort($array);
		return $array;
	}
?>

<?php
	print_r(sort_merge_array(array(2, 5, 3), array(4, 1, 6)));
?>

<p>======================================================================</p>

<?php
	// 정수 -> 모든 약수
	function divisor_number($number) {
		$array = array();
		for ($index = 1; $index < $number; $index += 1) {
			if ($number % $index == 0) {
				$array[] = $index;
			}
		}
		
		return $array;
	}
?>
<?php $num = 10; echo $num; ?>의 약수 : <?php print_r(divisor_number($num)); ?><br>

<p>======================================================================</p>

<?php
	// 정수 -> 완전수인가?
	// ※ 완전수 : A의 약수의 합 = A
	function perfect_number($number) {
		$array = divisor_number($number);
		
		$sum = sum_array($array);
		
		if ($number === $sum) {
			return '그렇다';
		}
		else {
			return '아니다';
		}
	}
	
	function perfect_number_array($number) {
		$array = divisor_number($number);
		
		$sum = sum_array($array);
		
		return $array;
	}
?>
<?php $num = 28; echo $num; ?>는 완전수 인가? 답 : <?php echo perfect_number($num); ?><br>
<?php print_r(perfect_number_array($num)); ?><br>

<p>======================================================================</p>

<?php
	// 정수 -> 친화수 (친화수의 쌍을 출력)
	// ※ 친화수 : A의 약수의 합 = B && B의 약수의 합 = A
	
	function friendly_number($i, $j) {
		$arr1 = divisor_number($i);
		$arr2 = divisor_number($j);
		
		$sum_arr1 = sum_array($arr1);
		$sum_arr2 = sum_array($arr2);
		
		if ($i === $sum_arr2 && $j === $sum_arr1) {
			return '그렇다';
		}
		else {
			return '아니다';
		}
	}
	
	function friendly_number_array($i, $j) {
		$arr1 = divisor_number($i);
		$arr2 = divisor_number($j);
		
		$sum_arr1 = sum_array($arr1);
		$sum_arr2 = sum_array($arr2);
		
		return $i.'의 약수의 합 : '.$sum_arr1.'<br>'.$j.'의 약수의 합 : '.$sum_arr2.'<br>';
	}
	
	function sum_array($array) {
		$sum = 0;
		foreach($array as $key => $value) {
			$sum += $value;
		}
		
		return $sum;
	}
?>
<?php $i = 284; $j = 220; echo $i.'와 '.$j; ?>는 친화수 인가? 답 : <?php echo friendly_number($i, $j); ?><br>
<?php echo friendly_number_array($i, $j); ?>

<p>======================================================================</p>

<?php
	// $number -> $array
	echo floor(4.5678); // 4, 소수점 내림
	echo '<br>';
	echo floor(4.5678 * 10 % 10); // 5
	echo '<br>';
	echo floor(4.5678 * 100 % 10); // 6
	echo '<br>';
	echo floor(4.5678 * 1000 % 10);
	echo '<br>';
	echo floor(4.5678 * 10000 % 10);
?>

<p>======================================================================</p>

<?php
	function arr_floor($number) {
		$array = array();
		
		while (floor($number % 10) > 0) {
			$array[] = floor($number % 10);
			$number = $number * 10;
		}
		
		return $array;
	} // 4.567799999999999268
?>

<?php
	echo 'arr_floor(4.5678): ';
	print_r(arr_floor(4.5678));
	echo '<br>';
?>

<p>======================================================================</p>

<?php
    $number = 4.5678;
    $array = array();
    
    echo 45678 % 10;
    echo '<br>';

    echo $number.'<br>';    
    $array[] = floor($number%10);
    echo floor($number%10).'<br>';
    print_r($array);
    echo '<br>';
    $number = $number * 10;

    echo $number.'<br>';    
    $array[] = floor($number%10);
    echo floor($number%10).'<br>';
    print_r($array);
    echo '<br>';
    $number = $number * 10;

    echo $number.'<br>';    
    $array[] = floor($number%10);
    echo floor($number%10).'<br>';
    print_r($array);
    echo '<br>';
    $number = $number * 10;

    echo $number.'<br>';    
    $array[] = floor($number%10);
    echo floor($number%10).'<br>';
    print_r($array);
    echo '<br>';
    $number = $number * 10;

    echo $number.'<br>';    
    $array[] = floor($number%10);
    echo floor($number%10).'<br>';
    print_r($array);
    echo '<br>';
    $number = $number * 10;
?>

<p>======================================================================</p>

<?php
	function arr_floor2($number) {
		$array = array();
		
		while (floor($number % 10) > 0) {
			$array[] = floor($number % 10);
			$number = $number / 10;
		}
		
		rsort($array);
		
		return $array;
	}
?>

<?php
	echo 'arr_floor2(45678): ';
	print_r(arr_floor2(45678));
	echo '<br>';
?>

<?php include $local_url.'/../section/footer.php'; ?>