<?php
$local_url = '../..';
$web_title = 'PHP 연습장 - Diff';
$nav_array = array();
$nav_array['Home'] = $local_url.'/index.php';
$css_array['diff'] = 'style.css';
include $_SERVER['DOCUMENT_ROOT'].'/../section/header.php';
?>

<div class="fix main_content">
	<div class="diff_content">
		<form action="diff.php" method="post">
			<ul>
				<li class="diff_text floatleft">
					<label>Orignal Text</label>
					<textarea name="txt_a"></textarea>
				</li>
				<li class="diff_text floatleft">
					<label>Changed Text</label>
					<textarea name="txt_b"></textarea>
				</li>
			</ul>
			<ul>
				<li>
					<input type="submit" value="Diff Go">
				</li>
			</ul>
		</form>
		
		<br>
		<div>
			<a href="test_lcs.php">LCS Test</a>
		</div>
	</div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'].'/../section/footer.php'; ?>