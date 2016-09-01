<?php
$local_url = '../..';
$web_title = 'PHP 연습장 - Diff';
$nav_array = array();
$nav_array['Home'] = $local_url.'/index.php';
$css_array['diff'] = 'style.css';
include $_SERVER['DOCUMENT_ROOT'].'/../section/header.php';
?>

<?php
	include 'function.php';
	
	$text_a = 'jaxsbeh';
	$text_b = 'xxazbcddefg';
	
	$diff_a = str_arr($text_a); // str_split($text_a);
	$diff_b = str_arr($text_b);
	
	// Diff => 2차배열 저장
	$diff_array = array();
	foreach ($diff_a as $a => $str_a) {
		foreach ($diff_b as $b => $str_b) {
			if (!strcmp($str_a, $str_b)) {
				$diff_array[$a][$b] = 1;
			} else {
				$diff_array[$a][$b] = 0;
			}
		}
	}
	
	// Result_Diff
	$temp_array = array();
	$result = array();
	$path = array();
	for ($a = count($diff_array)-1; $a >= 0; $a -= 1) {
		for ($b = count($diff_array[$a])-1; $b >= 0; $b -= 1) {
			$temp_array = diff_cell($result, $diff_array, $a, $b);
			$result[$a][$b] = $temp_array[0];
			$path[$a][$b] = $temp_array[1];
		}
	}
	// best_path
	$best_path = array();
	$diff_check = array();
	$match_index_a = array();
	$match_index_b = array();
	
	$temp = -1;
	for ($a = 0; $a < count($diff_a); $a += 1) {
		for ($b = $temp + 1; $b < count($diff_b); $b += 1) {
			if ($path[$a][$b] == 3) {
				$best_path[$a][$b] = $diff_a[$a];
				$diff_check[$a][$b] = 'unchanged';
				$match_index_a[] = $a;
				$match_index_b[] = $b;
				$temp = $b;
				break;
			} else if ($path[$a][$b] == 1) {
				$best_path[$a][$b] = $diff_a[$a];
				$diff_check[$a][$b] = 'del';
				$temp = $b - 1;
				break;
			} else if ($path[$a][$b] == 2) { // $b > $temp;
				$best_path[$a][$b] = $diff_b[$b];
				$diff_check[$a][$b] = 'add';
				// echo $a.', '.$b.', '.$diff_check[$a][$b].'<br>';
			}
			// $b += 1;
		}
	}
	
	// match_index() function
	
	// diff_result
	$diff_result = array();
	$diff_result[0] = array();
	$diff_result[1] = array();
	for ($i = 0; $i <= count($match_index_a); $i += 1) {
		if ($i == count($match_index_a)) {
			$index_a = count($diff_a);
			$index_b = count($diff_b);
		} else {
			$index_a = $match_index_a[$i];
			$index_b = $match_index_b[$i];
		}
		
		if ($i == 0) {
			// 첫번째 배열
			$previous_index_a = -1;
			$previous_index_b = -1;
		} else {
			$previous_index_a = $match_index_a[$i - 1];
			$previous_index_b = $match_index_b[$i - 1];
		}
		
		$length_a = $index_a - $previous_index_a;
		$length_b = $index_b - $previous_index_b;
		
		$max_length = max($length_a, $length_b);
		
		$j = $previous_index_a + 1;
		$k = $previous_index_b + 1;
		
		// add, del, blank 관련
		for ($count = 0; $count < $max_length - 1; $count++) {
			if ($j < $index_a) {
				$diff_result[0][] = array('del', $diff_a[$j]);
			} else {
				$diff_result[0][] = array('blank', null);
			}
			
			if ($k < $index_b) {
				$diff_result[1][] = array('add', $diff_b[$k]);
			} else {
				$diff_result[1][] = array('blank', null);
			}
			
			$j += 1;
			$k += 1;
		}
		
		if ($i !== count($match_index_a)) {
			// 매칭된 대상
			$match_char = $diff_a[$index_a]; // = $diff_result[1][$index_b];
			$diff_result[0][] = array('unchanged', $match_char);
			$diff_result[1][] = array('unchanged', $match_char);
		}
	}
	
	/*
	$length = 0;
	foreach ($diff_b as $b => $_b) {
		foreach ($diff_a as $a => $_a) {
			echo $a.', '.$b.'<br>';
			if (isset($diff_check[$a][$b])) {
				if ($diff_check[$a][$b] == 'unchanged') {
					$diff_result[0][$length][0] = $diff_check[$a][$b];
					$diff_result[1][$length][0] = $diff_check[$a][$b];
					$length = $length + 1;
				} else if ($diff_check[$a][$b] == 'del') {
					$diff_result[0][$length][0] = $diff_check[$a][$b];
					$diff_result[1] = insert_blank($diff_result[1], $length);
					$length = $length + 1;
				} else if ($diff_check[$a][$b] == 'add') {
					$diff_result[1][$length][0] = $diff_check[$a][$b];
					$diff_result[0] = insert_blank($diff_result[0], $length);
					$length = $length + 1;
				}
			}
		}
	}
	*/
	
	echo '<br>';
?>
<div class="fix main_content">
	<div class="table_style">
		<p><?php echo 'StringA: '.$text_a.'<br>'; ?></p>
		<p><?php echo 'StringB: '.$text_b.'<br>'; ?></p>
		<br>
		
		<div>
			<p>Diff array</p>
			<ul>
				<li class="header floatleft">&nbsp;</li>
				<?php
				foreach ($diff_a as $key => $value) {
					printf('<li class="header floatleft">%s</li>', $value);
				}
				?>
			</ul>
			<?php
			foreach ($diff_b as $b => $str_b) {
				echo '<ul>';
				printf('<li class="floatleft">%s</li>', $str_b);
				foreach ($diff_a as $a => $str_a) {
					printf('<li class="floatleft">%d</li>', $diff_array[$a][$b]);
				}
				echo '</ul>';
			}
			?>
		</div>
		
		<br>
		
		<div>
			<p>Result array</p>
			<ul>
				<li class="header floatleft">&nbsp;</li>
				<?php
				foreach ($diff_a as $key => $value) {
					printf('<li class="header floatleft">%s</li>', $value);
				}
				?>
			</ul>
			<?php
			foreach ($diff_b as $b => $str_b) {
				echo '<ul>';
				printf('<li class="floatleft">%s</li>', $str_b);
				foreach ($diff_a as $a => $str_a) {
					printf('<li class="floatleft">%d</li>', $result[$a][$b]);
				}
				echo '</ul>';
			}
			?>
		</div>
		
		<br>
		
		<div>
			<p>Path</p>
			<ul>
				<li class="header floatleft">&nbsp;</li>
				<?php
				foreach ($diff_a as $key => $value) {
					printf('<li class="header path floatleft">%s</li>', $value);
				}
				?>
			</ul>
			<?php
			foreach ($diff_b as $b => $str_b) {
				echo '<ul>';
				printf('<li class="floatleft">%s</li>', $str_b);
				foreach ($diff_a as $a => $str_a) {
					$str = path_sc($path[$a][$b]);
					printf('<li class="path floatleft">%s</li>', $str);
					unset($str);
				}
				echo '</ul>';
			}
			?>
		</div>
		
		<br>
		
		<div>
			<p>Best Path</p>
			<ul>
				<li class="header floatleft">&nbsp;</li>
				<?php
				foreach ($diff_a as $key => $value) {
					printf('<li class="header path floatleft">%s</li>', $value);
				}
				?>
			</ul>
			<?php
			foreach ($diff_b as $b => $str_b) {
				echo '<ul>';
				printf('<li class="floatleft">%s</li>', $str_b);
				foreach ($diff_a as $a => $str_a) {
					if (isset($diff_check[$a][$b])) {
						printf('<li class="path floatleft">%s</li>', $best_path[$a][$b]);
					} else {
						printf('<li class="path floatleft"></li>');
					}
				}
				echo '</ul>';
			}
			?>
		</div>
		
		<br>
		
		<div class="diff">
			<p>Diff Cheak</p>
			<ul>
				<li class="header floatleft">&nbsp;</li>
				<?php
				foreach ($diff_a as $key => $value) {
					printf('<li class="header path floatleft">%s</li>', $value);
				}
				?>
			</ul>
			<?php
			foreach ($diff_b as $b => $str_b) {
				echo '<ul>';
				printf('<li class="floatleft">%s</li>', $str_b);
				foreach ($diff_a as $a => $str_a) {
					if (isset($diff_check[$a][$b])) {
						printf('<li class="path floatleft %s">%s</li>', $diff_check[$a][$b], $best_path[$a][$b]);
					} else {
						printf('<li class="path floatleft"></li>');
					}
				}
				echo '</ul>';
			}
			?>
		</div>
		
		<br>
		
		<div class="diff">
			<p>Diff Result</p>
			<ul>
				<?php
				for ($i = 0; $i < count($diff_result[0]); $i += 1) {
					printf('<li class="header path floatleft %s">%s</li>'
					, $diff_result[0][$i][0], $diff_result[0][$i][1]);
				}
				?>
			</ul>
			<ul>
				<?php
				for ($i = 0; $i < count($diff_result[1]); $i += 1) {
					printf('<li class="path floatleft %s">%s</li>'
					, $diff_result[1][$i][0], $diff_result[1][$i][1]);
				}
				?>
			</ul>
		</div>
		
		<br>
		
		<div>
			<a href="index.php">돌아가기</a>
		</div>
		
	</div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'].'/../section/footer.php'; ?>