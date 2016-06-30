<?php
$local_url = '../../';
$web_title = 'PHP 연습장 - 게시판';
$nav_array = array();
$nav_array['Home'] = $local_url.'index.php';
$nav_array['Board'] = $local_url.'board/09_login/';
$css_array['board'] = 'style.css';
include $_SERVER['DOCUMENT_ROOT'].'/../section/header.php';
require_once 'function.php';
?>
<meta http-equiv="refresh" content="3; url='index.php'">

<div class="fix main_content">
	<?php
		start_session();
		if (check_login()) {
			echo "<h1>로그인 성공!</h1>";
	?>
	<form action="index.php">
		<input type="submit" value="메인메뉴로 돌아가기">
	</form>
	<?php
		} else {
			header("Location: error.php?error_code=3");
		}
	?>
</div>
<?php mysqli_close($conn); ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/../section/footer.php'; ?>