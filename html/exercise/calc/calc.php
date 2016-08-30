<!DOCTYPE html>
<html>

<p><a href="index.php">돌아가기</a></p>

<?php
	// 문자열 => 문자
	function get_operator($string) {
		$token = strtok($string, '+-*/');
		
	}
?>

<h1>계산 결과</h1>

<div class="content">
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$input_string = $_POST['calc'];
	}

	$result = 0;
	// 덧셈
	$calc_plus = explode("+", $input_string);
	for ($index = 0; $index < count($calc_plus); $index += 1) {
		//곱셈
		$calc_multi = explode("*", $calc_plus[$index]);
		//echo $calc_plus[$index].' '.count($calc_multi).'<br>';
		if (count($calc_multi) > 1) {			
			$value_multi = 1;
			for ($i_multi = 0; $i_multi < count($calc_multi); $i_multi += 1) {
				$value_multi *= $calc_multi[$i_multi];
			}
			$calc_plus[$index] = $value_multi;
		}
		//$calc_plus[$index] = get_mul_div_array($input);
		$result += $calc_plus[$index];
	}

	echo $input_string.' = '.$result;
?>
</div>

</html>