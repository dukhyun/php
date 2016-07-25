<?php
$local_url = '../../';
$web_title = 'PHP 연습장 - 게시판';
$nav_array = array();
$nav_array['Home'] = $local_url.'index.php';
$nav_array['Board'] = $local_url.'board/11_xss/index.php';
$css_array['board'] = $local_url.'board/11_xss/style.css';
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
	
	$query = 'UPDATE post SET author=?, title=?, content=? WHERE id=?;';
	$stmt = mysqli_prepare($conn, $query);
	mysqli_stmt_bind_param($stmt, 'sssi', $author, $title, $content, $post_id);
	if (!mysqli_stmt_execute($stmt)) {
		echo 'UPDATE ERROR : '.mysqli_error($conn);
	} else {
		echo 'DB UPDATE<br>';
		$url = sprintf("Location: view_post.php?board_id=%d&post_id=%d", $board_id, $post_id);
		header($url);
	}
	echo $query.'<br>';
} else if (isset($_POST['member_id'])) {
	$query = 'UPDATE post SET title=?, content=? WHERE id=?;';
	$stmt = mysqli_prepare($conn, $query);
	mysqli_stmt_bind_param($stmt, 'ssi', $title, $content, $post_id);
	if (!mysqli_stmt_execute($stmt)) {
		echo 'UPDATE ERROR : '.mysqli_error($conn);
	} else {
		echo 'DB UPDATE<br>';
		$url = sprintf("Location: view_post.php?board_id=%d&post_id=%d", $board_id, $post_id);
		header($url);
	}
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