<?php
$local_url = '../';
$nav_array = array();
$nav_array['Home'] = $local_url.'index.php';
include $local_url.'header.php';
?>

<?php
	// 구구단 2단
	$index = 2;
	while ($index <= 9) {
		echo '2 * '.$index.' = '.(2 * $index).'<br>';
		$index += 1;
	}
?>


<?php
	// 구구단 출력하기
	$i = 2;
	
	while ($i <= 9) {
		$j = 1; // $j = 2;
		while ($j <= 9) {
			$multiply = $i * $j;
			echo $i.' * '.$j.' = '.$multiply.'<br>';
			$j += 1;
		}
		$i += 1;
	}
?>

<p>====================================================</p>

<?php
	// 주어진 수의 모든 약수 구하기
	$value = 12;
	$index = 1;
	while ($index <= $value) {
		if (($value % $index) == 0)
			echo $index.' ';
		
		$index += 1;
	}
?>
<br>
<?php
	$divisor = array();
	$value = 12;
	$index = 1;
	while ($index <= $value) {
		if(($value % $index) == 0)
			$devisor[] = $index; // array_push()
		
		$index += 1;
	}
	
	print_r($devisor);
?>

<p>====================================================</p>

<?php
	$array = array();
	$index = 0;
	while (count($array) < 10) {
		$array[] = $index;
		$index += 1;
	}
?>
<br>
<?php
	// A % B 나머지 연산자
	$array = array(0, 1, 3, 4, 6, 7, 8);
	
	print_r($array);
	echo '<br>';
	
	$length = count($array);
	$index = 0;
	while ($index < $length) {
		if ($array[$index]%2 == 0)
			$even[] = $array[$index];
		else
			$odd[] = $array[$index];
		
		$index += 1;
	}
	
	echo '짝수 = ';
	$index = 0;
	while ($index < count($even)) {
		echo $even[$index].', ';
		$index += 1;
	}
	echo '입니다.';
	echo '<br>';
	echo '홀수 = ';
	$index = 0;
	while ($index < count($odd)) {
		echo $odd[$index].', ';
		$index += 1;
	}
	echo '입니다.';
?>

<?php include $local_url.'footer.php'; ?>