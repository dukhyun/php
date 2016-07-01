<?php
$local_url = '../../';
$web_title = 'PHP 연습장 - 게시판';
$nav_array = array();
$nav_array['Home'] = $local_url.'index.php';
$nav_array['Board'] = $local_url.'board/06_delete/index.php';
$css_array['board'] = $local_url.'board/06_delete/style.css';
include $_SERVER['DOCUMENT_ROOT'].'/../section/header.php';
include 'function.php';
?>
<meta http-equiv="refresh" content="3; url='index.php'">

<div class="fix main_content">

	<div class="fix">
<?php
start_session();
if (check_login()) {
	if (isset($_POST['title'], $_POST['content'])) {
		$board_title = $_POST['board'];
		$member = $_POST['member'];
		$title = $_POST['title'];
		$content = $_POST['content'];
	}

	$conn = db_connect();
	$board_id = get_boardid($conn, $board_title);

	$insert_query = sprintf("INSERT INTO post (member_id, title, content, board_id) VALUES ('%s', '%s', '%s', '%d');", $member, $title, $content, $board_id);
	if (mysqli_query($conn, $insert_query) === false) {
		echo mysqli_error($conn);
	} else {
		echo 'DB INSERT('.$board_id.') : ['.$member.'] <'.$title.'> {'.$content.'}<br>';
	}
	mysqli_close($conn);
}
else if (!check_login()) {
	if (isset($_POST['title'], $_POST['content'])) {
		$board_title = $_POST['board'];
		$author = $_POST['author'];
		$title = $_POST['title'];
		$content = $_POST['content'];
	}

	$conn = db_connect();
	$board_id = get_boardid($conn, $board_title);

	$insert_query = sprintf("INSERT INTO post (author, title, content, board_id) VALUES ('%s', '%s', '%s', '%d');", $author, $title, $content, $board_id);
	if (mysqli_query($conn, $insert_query) === false) {
		echo mysqli_error($conn);
	} else {
		echo 'DB INSERT('.$board_id.') : ['.$author.'] <'.$title.'> {'.$content.'}<br>';
	}
	mysqli_close($conn);
} else {
	echo '게시글 작성에 실패했습니다.';
}
?>
	</div>
	
	<div class="fix">
		<a href="index.php">3 sec after... auto move.</a>
	</div>

</div>

<?php include $_SERVER['DOCUMENT_ROOT'].'/../section/footer.php'; ?>