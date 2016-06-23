<!DOCTYPE html>

<?php
	// 1, 2, ..., n의 모든 순열 출력
	// ex) 3 => 123, 132, 213,... $n! 개
	function print_permutation($arr, $dep, $n) {
		
		if ($dep == $n) {
			//print_r($arr);
			print_arr($arr);
		}
		
		// echo 'not print : ';
		// print_arr($arr);
		
		for ($i = $dep; $i < $n; $i += 1) {
			$arr = swap($arr, $dep, $i);
			// 인자를 스왑
			print_permutation($arr, $dep+1, $n);
			// dep+1 -> $i
			$arr = swap($arr, $dep, $i);
			// 교환했던 인자를 복구
		}
	}
	
	function swap($arr, $a, $b) {
		$temp = $arr[$a];
		$arr[$a] = $arr[$b];
		$arr[$b] = $temp;
		
		// echo $a.'↔'.$b.' = ';
		// print_arr($arr);
		
		return $arr;
	}
	
	function print_arr($arr) {
		echo '<font id="perm">';
		foreach ($arr as $key => $value) {
			echo $value.'. ';
		}
		
		echo '</font><br>';
	}
?>
<html>
<style>
font#perm {
	color: red;
}
</style>
<body>

<p><a href="index.php">돌아가기</a></p>

<h1>순열 출력하기</h1>

<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$input = $_POST['input'];
	}
	
	$arr = array();
	
	for ($i = 1; $i <= $input; $i += 1) {
		$arr[] = $i;
	}
	
	//print_r($arr);
	
	print_permutation($arr, 0, $input);
?>

</body>
</html>
