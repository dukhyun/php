<?php
$local_url = '../..';
$web_title = 'PHP 연습장 - 게시판';
$nav_array = array();
$nav_array['Home'] = $local_url.'/index.php';
$nav_array['Board'] = 'index.php';
$css_array['board'] = 'style.css';
include $_SERVER['DOCUMENT_ROOT'].'/../section/header.php';
include 'function.php';
?>
<meta http-equiv="refresh" content="3; url='index.php'">

<div class="fix main_content">

	<div class="fix">
<?php
if (isset($_POST['author'], $_POST['title'], $_POST['content'])) {
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
		echo 'DB INSERT('.$board_id.')<br>';
		echo $author.'<br>'.$title.'<br>'.$content.'<br>';
	}
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