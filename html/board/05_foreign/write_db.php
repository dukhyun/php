<?php
$local_url = '../../';
$web_title = 'PHP 연습장 - 게시판';
$nav_array = array();
$nav_array['Home'] = $local_url.'index.php';
$nav_array['Board'] = $local_url.'board/05_foreign/index.php';
$css_array['board'] = $local_url.'board/05_foreign/style.css';
include $local_url.'header.php';
include 'function.php';
?>

<div class="fix main_content">

<?php
	// 입력 내용	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$board_id = $_POST['board_id'];
		$author = $_POST['author'];
		$title = $_POST['title'];
		$content = $_POST['content'];
	}
	
	$conn = db_connect($local_url);
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