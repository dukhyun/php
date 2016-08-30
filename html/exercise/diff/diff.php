<?php
$local_url = '../..';
$web_title = 'PHP 연습장 - Diff';
$nav_array = array();
$nav_array['Home'] = $local_url.'/index.php';
$css_array[diff] = 'style.css';
include $_SERVER['DOCUMENT_ROOT'].'/../section/header.php';
?>

<?php
	include 'function.php';
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$diff_ori = $_POST['diff_ori'];
		$diff_cha = $_POST['diff_cha'];
	}
	
	
?>

<div class="fix main_content">
	<div class="diff_content">
		<div class="diff_text floatleft">
			<label>Orignal Text</label>
			<textarea readonly><?php echo $diff_ori; ?></textarea>
		</div>
		
		<div class="diff_text floatleft">
			<label>Changed Text</label>
			<textarea readonly><?php echo $diff_cha; ?></textarea>
		</div>
		
		<div>
			<a href="index.php">돌아가기</a>
		</div>
	</div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'].'/../section/footer.php'; ?>