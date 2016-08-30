<?php
$local_url = '../..';
$web_title = 'PHP 연습장 - 게시판';
$nav_array = array();
$nav_array['Home'] = $local_url.'/index.php';
$nav_array['Board'] = 'index.php';
$css_array['style'] = 'style.css';
include $local_url.'/../section/header.php';
include $local_url.'/../section/db_login.php';
?>

<div class="fix input_content">
	<h1>글 작성</h1>
	<form action="write_db.php" method="post">
		<ul class="form_style">
			<li>
				<label>이름</label>
				<input type="text" name="author">
			</li>
			<li>
				<label>제목</label>
				<input type="text" name="title">
			</li>
			<li>
				<label>내용</label>
				<textarea name="contents"></textarea>
			</li>
			<li>
				<input type="submit" value="제출">
			</li>
		</ul>
	</form>
</div>

<?php include $local_url.'/../section/footer.php'; ?>