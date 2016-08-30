<?php
$local_url = '..';
$nav_array = array();
$nav_array['Home'] = '/index.php';
include $local_url.'/../section/header.php';
?>

<?php
	function get_bigger($num1, $num2) {
		// 더 큰 숫자를 리턴
		if ($num1 > $num2) {
			return $num1;
		}
		else {
			return $num2;
		}
	}
?>

<?php echo get_bigger(3, 5); ?>

<p>======================================================================</p>

<?php
	// 구구단 함수를 이용해서 출력하기
	function print_gugudan($number) {
		for ($index = 2; $index <= 9; $index += 1) {
			echo $number.' * '.$index.' = '.$number * $index.'<br>';
		}
	}
	
	for ($num = 2; $num <= 9; $num += 1) {
		print_gugudan($num);
	}
?>

<p>======================================================================</p>


<?php include $local_url.'/../section/footer.php'; ?>