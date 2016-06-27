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
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		$post_id = $_GET['post_id'];
	}
	
	$conn = db_connect();
	$query = "DELETE FROM post WHERE id = ".$post_id.";";
	if (mysqli_query($conn, $query) === false) {
		echo 'DELETE ERROR : '.mysqli_error($conn);
	} else {
		echo 'DB DELETE<br>';
	}
	echo $query.'<br>';
?>
	</div>
	
	<div class="fix">
		3 sec after... auto move.
	</div>
</div>


<?php include $_SERVER['DOCUMENT_ROOT'].'/../section/footer.php'; ?>