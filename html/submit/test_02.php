<?php
	$numbers = array();
	$array_size = 100;
	$index = 0;
	$value = 1;
	$value_increase = 2;
	while ($index < $array_size) {
		$numbers[$index] = $value;
		$value += $value_increase;
		$index += 1;
	}
?>
크기가 100<br>
첫번째 (index = 0) 원소가 1<br>
두번째 이후의 칸의 값은 바로 왼쪽 칸의 + 2<br>
<?php print_r($numbers); ?>

=====================================================================
<?php
	// 2. 왼쪽 모든 원소의 합
	$numbers = array();
	$array_size = 100;
	$index = 0;
	$value = 1;
	while ($index < $array_size) {
		$numbers[$index] = $value;
		if ($index > 0)
		    $value += $numbers[$index];
	
		$index += 1;
	}
?>
크기가 100<br>
첫번째 (index = 0) 원소가 1<br>
두번째 이후의 원소는 자신의 왼쪽의 모든 원소의 합<br>
<?php print_r($numbers); ?>

=====================================================================
<?php
	// 배열의 원소를 2만큼 이동시키자.
	// 0번째 원소의 값을 2번째에 쓰고
	// 1번째 원소의 값을 3번째에 쓰고
	// 끝을 넘어가는 경우 앞으로 돌아와서...
	
	$numbers = array(1, 2, 3, 5);
	$size = count($numbers); // 배열 원소의 수
	$temp = array();
	$move = 2;

	$index = 0;
	while ($index < $size) {
		if (($index + $move) < $size)
			$temp[$index + $move] = $numbers[$index];
		else
			$temp[$index - ($size - $move)] = $numbers[$index];
		$index += 1;
	}
	
	$numbers = $temp;
	
	print_r($numbers);
	// Array ( [2] = 0 [3] = 2 [0] = 3 [1] = 5 )
?>