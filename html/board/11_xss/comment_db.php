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
if (isset($_POST['content'])) {
	$comment = $_POST['content'];
	$board_id = $_POST['board_id'];
	$post_id = $_POST['post_id'];
	if (check_login()) {
		$user_id = get_member_id($conn, $_SESSION['id']);
		$insert_query = 'INSERT INTO comment (content, post_id, member_id) VALUES (?, ?, ?)';
		$stmt = mysqli_prepare($conn, $insert_query);
		mysqli_stmt_bind_param($stmt, 'sii', $comment, $post_id, $user_id);
	} else {
		$author = $_POST['author'];
		$insert_query = 'INSERT INTO comment (content, post_id, author) VALUES (?, ?, ?)';
		$stmt = mysqli_prepare($conn, $insert_query);
		mysqli_stmt_bind_param($stmt, 'sis', $comment, $post_id, $author);
	}

	if (!mysqli_stmt_execute($stmt)) {
		echo mysqli_error($conn);
	} else {
		echo 'comment DB INSERT<br>';
		echo '<script>history.go(-1);</script>';
		// header("Location: view_post.php?board_id=".$board_id."&post_id=".$post_id);
	}
}
?>

<?php include $_SERVER['DOCUMENT_ROOT'].'/../section/footer.php'; ?>