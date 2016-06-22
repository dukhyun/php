<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php
	$local_url = '../../';
	$navy = array();
	$navy[Home] = $local_url.'index.php';
	$navy[Board] = 'index.php';
	include $local_url.'from/navybar.php';
	include $local_url.'db_login.php';
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

</body>
</html>