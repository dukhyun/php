<?php
$local_url = '../..';
$nav_array = array();
$nav_array['Home'] = $local_url.'/index.php';
$nav_array['Board'] = 'index.php';
$css_array = array();
$css_array['style'] = 'style.css';
include $local_url.'/../section/header.php';
?>

<div class="fix input_content">
	<h1>글 작성</h1>
	<form action="write_file.php" method="post">
		<ul class="form_style">
			<li>
				<label>이름</label>
				<input type="text" name="name">
			</li>
			<li>
				<label>제목</label>
				<input type="text" name="title">
			</li>
			<li>
				<label>내용<span>*한줄로 입력할 것!</span></label>
				<textarea name="content"></textarea>
			</li>
			<li>
				<input type="submit" value="제출">
			</li>
		</ul>
	</form>
</div>

</body>
</html>