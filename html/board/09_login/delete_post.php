<?php
$local_url = '../..';
$web_title = 'PHP 연습장 - 게시판';
$nav_array = array();
$nav_array['Home'] = $local_url.'/index.php';
$nav_array['Board'] = 'index.php';
$css_array['board'] = 'style.css';
include $local_url.'/../section/header.php';
include 'function.php';
?>

<div class="fix input_content">
	<?php
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$board_id = $_GET['board_id'];
			$post_id = $_GET['post_id'];
		}
		
		$prev_page = $_SERVER['HTTP_REFERER'];
	?>
	
	<div class="center">
		<h2>정말로 삭제하시겠습니까?</h2>
		<div class="button">
			<a class="mark" href="delete_db.php?post_id=<?php echo $post_id; ?>">Yes</a>
			<a href="<?php echo $prev_page; ?>">No</a>
		</div>
	</div>
</div>


<?php include $_SERVER['DOCUMENT_ROOT'].'/../section/footer.php'; ?>