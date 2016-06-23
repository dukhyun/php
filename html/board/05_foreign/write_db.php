<?php
$local_url = '../../';
$web_title = 'PHP 연습장 - 게시판';
$nav_array = array();
$nav_array['Home'] = $local_url.'index.php';
$nav_array['Board'] = $local_url.'board/04_db/index.php';
$css_array['board'] = $local_url.'board/04_db/style.css';
include $local_url.'header.php';
include $local_url.'db_login.php';
?>

<div class="fix main_content">

<?php
	// 입력 내용
	$board_id = 1;
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$author = $_POST['author'];
		$title = $_POST['title'];
		$content = $_POST['content'];
	}
	
	$conn = mysqli_connect($hostname, $username, $password, $dbname);
	if (!$conn) {
		die('Mysql connection failed: '.mysqli_connect_error());
	}
	
	$insert_query = 'INSERT INTO post (author, title, content, board_id) VALUES ("'
					.$author.'", "'.$title.'", "'.$content.'", "'.$board_id.'")';
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

<?php include $local_url.'footer.php'; ?>