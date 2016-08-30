<?php
$local_url = '..';
$nav_array = array();
$nav_array['Home'] = '/index.php';
include $local_url.'/../section/header.php';
?>

<?php
	function sum_total($array) {
		// ��� ������ ���� ���� ��ȯ
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
	// ���ĵ� �迭 2���� ���ļ� ��ȯ
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
	// ���� -> ��� ���
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
<?php $num = 10; echo $num; ?>�� ��� : <?php print_r(divisor_number($num)); ?><br>

<p>======================================================================</p>

<?php
	// ���� -> �������ΰ�?
	// �� ������ : A�� ����� �� = A
	function perfect_number($number) {
		$array = divisor_number($number);
		
		$sum = sum_array($array);
		
		if ($number === $sum) {
			return '�׷���';
		}
		else {
			return '�ƴϴ�';
		}
	}
	
	function perfect_number_array($number) {
		$array = divisor_number($number);
		
		$sum = sum_array($array);
		
		return $array;
	}
?>
<?php $num = 28; echo $num; ?>�� ������ �ΰ�? �� : <?php echo perfect_number($num); ?><br>
<?php print_r(perfect_number_array($num)); ?><br>

<p>======================================================================</p>

<?php
	// ���� -> ģȭ�� (ģȭ���� ���� ���)
	// �� ģȭ�� : A�� ����� �� = B && B�� ����� �� = A
	
	function friendly_number($i, $j) {
		$arr1 = divisor_number($i);
		$arr2 = divisor_number($j);
		
		$sum_arr1 = sum_array($arr1);
		$sum_arr2 = sum_array($arr2);
		
		if ($i === $sum_arr2 && $j === $sum_arr1) {
			return '�׷���';
		}
		else {
			return '�ƴϴ�';
		}
	}
	
	function friendly_number_array($i, $j) {
		$arr1 = divisor_number($i);
		$arr2 = divisor_number($j);
		
		$sum_arr1 = sum_array($arr1);
		$sum_arr2 = sum_array($arr2);
		
		return $i.'�� ����� �� : '.$sum_arr1.'<br>'.$j.'�� ����� �� : '.$sum_arr2.'<br>';
	}
	
	function sum_array($array) {
		$sum = 0;
		foreach($array as $key => $value) {
			$sum += $value;
		}
		
		return $sum;
	}
?>
<?php $i = 284; $j = 220; echo $i.'�� '.$j; ?>�� ģȭ�� �ΰ�? �� : <?php echo friendly_number($i, $j); ?><br>
<?php echo friendly_number_array($i, $j); ?>

<p>======================================================================</p>

<?php
	// $number -> $array
	echo floor(4.5678); // 4, �Ҽ��� ����
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