<?php
$local_url = '..';
$nav_array = array();
$nav_array['Home'] = '/index.php';
include $local_url.'/../section/header.php';
?>

<?php
	// array_slice(('a', 'b', 'c', 'd'), 1, 2) => ('b', 'c')
	// array_slice(배열, 시작index, length)
	$subarray = array_slice(array('a', 'b', 'c', 'd'), 1, 2);
	
	print_r($subarray);
?>

<p>------------------------------------------------------------------</p>

<?php
	$number = array(1, 2, 5, 6, 8);
	$result1 = array_slice($number, 0, 2); // 1, 2
	$result2 = array_slice($number, 2, 3); // 5, 6, 8
	
	echo '$result1 = ';
	print_r($result1);
	echo '<br>';
	echo '$result2 = ';
	print_r($result2);
?>

<p>------------------------------------------------------------------</p>

<?php
	$numbers = array(1, 2, 5, 6, 8, 10);
	$length = count($numbers) / 2;
	$result1 = array_slice($numbers, 0, $length);
	$result2 = array_slice($numbers, 3, $length);
	
	echo '$result1 = ';
	print_r($result1);
	echo '<br>';
	echo '$result2 = ';
	print_r($result2);
?>

<p>------------------------------------------------------------------</p>

<?php
	$arr1 = array(1, 2, 3);
	$arr2 = array(4, 5, 6);
	
	$array = array_merge($arr1, $arr2);
	
	print_r($array);
?>

<p>------------------------------------------------------------------</p>

<?php
	$array = array();
	$array[1] = '가';
	$array[0] = '나';
	
	print_r($array);
?>

<p>------------------------------------------------------------------</p>

<?php
	$exam_score['가'] = 5;
	$exam_score['라'] = 6;
	$exam_score['다'] = 2;
	$exam_score['나'] = 9;
	
	print_r($exam_score);
	
	ksort($exam_score); // key순 정렬
	print_r($exam_score); // '가', '나', '다', '라'
	asort($exam_score); // 인텍스 정렬
	print_r($exam_score); // 2, 3, 6, 9
	
	// 역순정렬
	krsort($exam_score);
	print_r($exam_score);
	arsort($exam_score);
	print_r($exam_score);
?>

<p>------------------------------------------------------------------</p>

<?php
	// 배열 순서대로 출력 foreach문 활용
	$array['가'] = 5;
	$array['라'] = 6;
	$array['다'] = 2;
	$array['나'] = 9;
	
	foreach($array as $key => $value) {
		echo $key.' '.$value.'<br>';
	} 
?>

<?php include $local_url.'/../section/footer.php'; ?>