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
start_session();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	$post_id = $_GET['post_id'];
}
$conn = db_connect();
$member_id = get_member_id($conn, $post_id);

if (isset($member_id)) {
	echo '다른 회원의 글은 삭제할 수 없습니다.';
} else {
	$query = sprintf("DELETE FROM post WHERE id = %d;", $post_id);
	if (mysqli_query($conn, $query) === false) {
		echo 'DELETE ERROR : '.mysqli_error($conn);
	} else {
		echo 'DB DELETE<br>';
	}
	echo $query.'<br>';
}
mysqli_close($conn);
?>
	</div>
	
	<div class="fix">
		3 sec after... auto move.
	</div>
</div>


<?php include $_SERVER['DOCUMENT_ROOT'].'/../section/footer.php'; ?>