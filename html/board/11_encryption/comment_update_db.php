<?php
$local_url = '../../';
$web_title = 'PHP 연습장 - 게시판';
$nav_array = array();
$nav_array['Home'] = $local_url.'index.php';
$nav_array['Board'] = $local_url.'board/10_comment/';
$css_array['board'] = 'style.css';
include $_SERVER['DOCUMENT_ROOT'].'/../section/header.php';
include 'function.php';
?>

<?php
start_session();
$conn = db_connect();
if (isset($_POST['comment_id'], $_POST['content'])) {
	$id = $_POST['comment_id'];
	$comment = $_POST['content'];
	$board_id = $_POST['board_id'];
	$post_id = $_POST['post_id'];
	
	$temp_query = sprintf("content = '%s'", $comment);
	if (isset($_POST['author'])) {
		$author = $_POST['author'];
		$temp_query .= sprintf(", author = '%s'", $author);
	}

	$update_query = sprintf("UPDATE comment SET %s WHERE id = %d", $temp_query, $id);
	if (mysqli_query($conn, $update_query) === false) {
		echo mysqli_error($conn);
	} else {
		echo 'comment DB UPDATE<br>';
		header("Location: view_post.php?board_id=".$board_id."&post_id=".$post_id);
	}
}
?>

<?php include $_SERVER['DOCUMENT_ROOT'].'/../section/footer.php'; ?>