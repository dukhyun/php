<?php
$local_url = '../../';
$web_title = 'PHP 연습장 - Diff';
$nav_array = array();
$nav_array[Home] = $local_url.'index.php';
$css_array[diff] = 'style.css';
include $_SERVER['DOCUMENT_ROOT'].'/../section/header.php';
?>

<?php
	include 'function.php';
	
	$text_a = 'abcd';
	$text_b = 'axcbcbe';
	
	$diff_a = str_arr($text_a);
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
	$result = array();
	$path = array();
	for ($a = count($diff_array); $a >= 0; $a -= 1) {
		for ($b = count($diff_array[$a]); $b >= 0; $b -= 1) {
			$path[$a][$b] = diff($result, $diff_array, $a, $b);
			$result[$a][$b] = $path[$a][$b][0];
		}
	}
	
	// best_path
	$best_path = array();
	foreach ($diff_a as $a => $str_a) {
		foreach ($diff_b as $b => $str_b) {
			if ($path[$a][$b][1] == 3) {
				$best_path[$a][$b] = $diff_a[$a];
				break;
			}
		}
	}
	
	// diff_result
	$diff_result = array();
?>

<div class="fix main_content">
	<div class="table_style">
		<p><?php echo 'Orignal : '.$text_a.'<br>'; ?></p>
		<p><?php echo 'Diffcheak : '.$text_b.'<br>'; ?></p>
		<br>
		
		<div>
			<p>Diff array</p>
			<ul>
				<li class="header floatleft">&nbsp;</li>
				<?php
				foreach ($diff_b as $key => $value) {
					printf('<li class="header floatleft">%s</li>', $value);
				}
				?>
			</ul>
			<?php
			foreach ($diff_a as $a => $str_a) {
				echo '<ul>';
				printf('<li class="floatleft">%s</li>', $str_a);
				foreach ($diff_b as $b => $str_b) {
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
				foreach ($diff_b as $key => $value) {
					printf('<li class="header floatleft">%s</li>', $value);
				}
				?>
			</ul>
			<?php
			foreach ($diff_a as $a => $str_a) {
				echo '<ul>';
				printf('<li class="floatleft">%s</li>', $str_a);
				foreach ($diff_b as $b => $str_b) {
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
				foreach ($diff_b as $key => $value) {
					printf('<li class="header path floatleft">%s</li>', $value);
				}
				?>
			</ul>
			<?php
			foreach ($diff_a as $a => $str_a) {
				echo '<ul>';
				printf('<li class="floatleft">%s</li>', $str_a);
				foreach ($diff_b as $b => $str_b) {
					$str = path_sc($path[$a][$b][1]);
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
				foreach ($diff_b as $key => $value) {
					printf('<li class="header path floatleft">%s</li>', $value);
				}
				?>
			</ul>
			<?php
			foreach ($diff_a as $a => $str_a) {
				echo '<ul>';
				printf('<li class="floatleft">%s</li>', $str_a);
				foreach ($diff_b as $b => $str_b) {
					printf('<li class="path floatleft">%s</li>', $best_path[$a][$b]);
				}
				echo '</ul>';
			}
			?>
		</div>
		
		<br>
		
		<div class="diff">
			<p>Diff Cheak</p>
			<ul>
				<li class="header floatleft"><?php echo $text_a; ?></li>
				<?php
				for ($i = 0; $i < count($diff_result[0]); $i += 1) {
					printf('<li class="header path floatleft %s">%s</li>', $diff_result[0][0], $diff_result[0][1]);
				}
				?>
			</ul>
			<ul>
				<li class="floatleft"><?php echo $text_b; ?></li>
				<?php
				for ($i = 0; $i < count($diff_result[1]); $i += 1) {
					printf('<li class="path floatleft %s">%s</li>', $diff_result[1][0], $diff_result[1][1]);
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