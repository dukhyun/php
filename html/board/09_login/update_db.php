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

<div class="fix main_content">
	<div class="fix">
<?php
start_session();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$board_id = $_POST['board_id'];
	$post_id = $_POST['post_id'];
	$title = $_POST['title'];
	$content = $_POST['content'];
}

$conn = db_connect();
$member_id = get_member_id($conn, $post_id);

echo $post_id;

if (isset($_POST['author'])) { // 비회원이 작성한 글일 경우
	$author = $_POST['author'];
	
	$query = sprintf("UPDATE post SET author = '%s', title = '%s', content = '%s' 
				WHERE id = %d;", $author, $title, $content, $post_id);
	if (mysqli_query($conn, $query) === false) {
		echo 'UPDATE ERROR : '.mysqli_error($conn);
	} else {
		echo 'DB UPDATE<br>';
		$url = sprintf("Location: view_post.php?board_id=%d&post_id=%d", $board_id, $post_id);
		header($url);
	}
	echo $query.'<br>';
}
else if ($member_id == $_SESSION['id']) {
	$member_id = $_POST['member'];

	$query = sprintf("UPDATE post SET member_id = '%s', title = '%s', content = '%s' 
				WHERE id = %d;", $member_id, $title, $content, $post_id);
	if (mysqli_query($conn, $query) === false) {
		echo 'UPDATE ERROR : '.mysqli_error($conn);
	} else {
		echo 'DB UPDATE<br>';
		$url = sprintf("Location: view_post.php?board_id=%d&post_id=%d", $board_id, $post_id);
		header($url);
	}
	echo $query.'<br>';
} else {
	echo '게시글 수정에 실패했습니다.';
}
mysqli_close($conn);
?>
	</div>
	
	<div class="fix">
		<!-- <span>3 sec after... auto move.</span> //-->
		<a href="index.php">돌아가기</a>
	</div>
</div>


<?php include $_SERVER['DOCUMENT_ROOT'].'/../section/footer.php'; ?>