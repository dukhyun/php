<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
	<style>
	div {
		width : 800px;
		margin : 0 auto;
	}
	input {
		width: 100%;
	}
	input[type=text] {
		padding: 10px 20px;
		box-sizing: border-box;
		border: 2px solid #ccc;
		border-radius: 4px;
		background-color: #f8f8f8;
		resize: none;
	}
	input[type=submit] {
		font-size : 16px;
		padding: 10px 20px;
		box-sizing: border-box;
		border: 2px solid #bbb;
		border-radius: 4px;
		resize: none;
	}
	textarea {
		width: 100%;
		height: 150px;
		padding: 12px 20px;
		box-sizing: border-box;
		border: 2px solid #ccc;
		border-radius: 4px;
		background-color: #f8f8f8;
		resize: none;
	}
	</style>
</head>
<body>

<?php
	$local_url = '../../';
	$navy = array();
	$navy[Home] = $local_url.'index.php';
	$navy[Board] = 'index.php';
	include $local_url.'savefrom/navybar.php';
?>

<div>
	<h1>작성</h1>
	<form action="write_file.php" method="post">
		이름 : <input type="text" name="name"><br>
		제목 : <input type="text" name="subject"><br>
		내용 : <br>
		<textarea name="content"></textarea><br>
		<input type="submit" value="제출">
	</form>
	
	<p>※ 내용은 한줄로 입력할 것! ※</p>
</div>

</body>
</html>