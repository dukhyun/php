<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php
	$local_url = '../../';
	include $local_url.'from/navybar.php';
	include $local_url.'db_login.php';
?>

<div class="fix main_content">

<?php
	// 입력 내용
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$author = $_POST['author'];
		$title = $_POST['title'];
		$contents = $_POST['contents'];
	}
	
	$conn = mysqli_connect($hostname, $username, $password, $dbname);
	if (!$conn) {
		die('Mysql connection failed: '.mysqli_connect_error());
	}
	
	$insert_query = 'INSERT INTO board (author, title, contents) VALUES ("'
					.$author.'", "'.$title.'", "'.$contents.'")';
	if (mysqli_query($conn, $insert_query) === false) {
		echo mysqli_error($conn);
	} else {
		echo 'DB INSERT :'.$author.' '.$title.'<br>';
	}
?>
	<div class="fix">
		<a href="index.php">게시판 목록으로 이동</a>
	</div>

</div>

</body>
</html>