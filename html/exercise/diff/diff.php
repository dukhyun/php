<?php
$local_url = '../../';
$web_title = 'PHP 연습장 - Diff';
$nav_array = array();
$nav_array[Home] = $local_url.'index.php';
$css_array[diff] = 'style.css';
include $_SERVER['DOCUMENT_ROOT'].'/../section/header.php';
?>

<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$diff_ori = $_POST['diff_ori'];
		$diff_cha = $_POST['diff_cha'];
	}
	
	
?>

<div class="fix main_content">
	<div class="diff_result">
		<div class="diff_text floatleft">
			<?php echo str_replace("\n", "<br>", $diff_ori); ?>
		</div>
		
		<div class="diff_text floatleft">
			<?php echo str_replace("\n", "<br>", $diff_cha); ?>
		</div>
		
		<div>
			<a href="index.php">돌아가기</a>
		</div>
	</div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'].'/../section/footer.php'; ?>