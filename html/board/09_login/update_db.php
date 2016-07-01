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
$conn = db_connect();
if (isset($_POST['post'])) {
	$post_id = $_POST['post'];
}
$member_id = get_member_id($conn, $post_id);

if ($member_id == NULL) { // 비회원이 작성한 글일 경우
	if (isset($_POST['title'], $_POST['content'])) {
		$author = $_POST['author'];
		$title = $_POST['title'];
		$content = $_POST['content'];
	}
	
	$query = "UPDATE post SET 
				author = '".$author."',
				title = '".$title."',
				content = '".$content."' 
				WHERE id = ".$post_id.";";
	if (mysqli_query($conn, $query) === false) {
		echo 'UPDATE ERROR : '.mysqli_error($conn);
	} else {
		echo 'DB UPDATE<br>';
	}
	echo $query.'<br>';
}
else if ($member_id == $_SESSION['id']) {
	if (isset($_POST['title'], $_POST['content'])) {
		$member_id = $_POST['member'];
		$title = $_POST['title'];
		$content = $_POST['content'];
	}

	$query = "UPDATE post SET 
				member_id = '".$member_id."',
				title = '".$title."',
				content = '".$content."' 
				WHERE id = ".$post_id.";";
	if (mysqli_query($conn, $query) === false) {
		echo 'UPDATE ERROR : '.mysqli_error($conn);
	} else {
		echo 'DB UPDATE<br>';
	}
	echo $query.'<br>';
} else {
	echo '게시글 수정에 실패했습니다.';
}
mysqli_close($conn);
?>
	</div>
	
	<div class="fix">
		3 sec after... auto move.
	</div>
</div>


<?php include $_SERVER['DOCUMENT_ROOT'].'/../section/footer.php'; ?>