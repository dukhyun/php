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
	// 입력 내용
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$post_id = $_POST['post'];
		$author = $_POST['author'];
		$title = $_POST['title'];
		$content = $_POST['content'];
	}
	
	$conn = db_connect();
	$board_id = get_boardid($conn, $board_title);

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
?>
	</div>
	
	<div class="fix">
		<a href="<?php echo 'view_post.php?board_id='.$board_id.'&post_id='.$post_id; ?>">3 sec after... auto move.</a>
	</div>
</div>


<?php include $local_url.'/../section/footer.php'; ?>