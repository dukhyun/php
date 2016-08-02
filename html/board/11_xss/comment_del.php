<?php
$local_url = '../../';
$web_title = 'PHP 연습장 - 게시판';
$nav_array = array();
$nav_array['Home'] = $local_url.'index.php';
$nav_array['Board'] = $local_url.'board/11_xss/';
$css_array['board'] = 'style.css';
include $_SERVER['DOCUMENT_ROOT'].'/../section/header.php';
include 'function.php';
?>

<?php
start_session();
$conn = db_connect();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	$board_id = $_GET['board_id'];
	$post_id = $_GET['post_id'];
	$id = $_GET['cmt_id'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$board_id  = $_POST['board_id'];
	$post_id = $_POST['post_id'];
	$id = $_POST['comment_id'];
}

$query = sprintf("DELETE FROM comment WHERE id = %d;", $id);

if (mysqli_query($conn, $query) === false) {
	echo mysqli_error($conn);
} else {
	echo 'DB DELETE<br>';
	echo '<script>history.go(-1);</script>';
	// header("Location: view_post.php?board_id=".$board_id."&post_id=".$post_id);
}
mysqli_close($conn);
?>

<?php include $_SERVER['DOCUMENT_ROOT'].'/../section/footer.php'; ?>