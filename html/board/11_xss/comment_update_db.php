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

<?php
start_session();
$conn = db_connect();
if (isset($_POST['comment_id'], $_POST['content'])) {
	$id = $_POST['comment_id'];
	$comment = $_POST['content'];

	$update_query = 'UPDATE comment SET content=? WHERE id=?';
	$stmt = mysqli_prepare($conn, $update_query);
	mysqli_stmt_bind_param($stmt, 'si', $comment, $id);
	if (!mysqli_stmt_execute($stmt)) {
		echo mysqli_error($conn);
	} else {
		echo 'comment DB UPDATE<br>';
		echo '<script>history.go(-1);</script>';
		// header("Location: view_post.php?board_id=".$board_id."&post_id=".$post_id);
	}
}
?>

<?php include $_SERVER['DOCUMENT_ROOT'].'/../section/footer.php'; ?>