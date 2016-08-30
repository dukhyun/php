<?php
$local_url = '../..';
$web_title = 'PHP 연습장 - 게시판';
$nav_array = array();
$nav_array['Home'] = $local_url.'/index.php';
$nav_array['Board'] = $local_url.'board/10_comment/';
$css_array['board'] = 'style.css';
include $_SERVER['DOCUMENT_ROOT'].'/../section/header.php';
require_once 'function.php';
?>

<div class="fix register">
	<h1>회원 가입</h1>
	<form class="form_style" action="register_db.php" method="post">
		<ul>
			<li>
				<lable>회원 id</lable>
				<input type="text" name="id">
			</li>
			<li>
				<lable>비밀번호</lable>
				<input type="password" name="password">
			</li>
			<li>
				<input type="submit" value="회원 가입">
			</li>
		</ul>
	</form>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'].'/../section/footer.php'; ?>