<?php
$local_url = '../../';
$web_title = 'PHP 연습장 - 게시판';
$nav_array = array();
$nav_array['Home'] = $local_url.'index.php';
$nav_array['Board'] = $local_url.'board/08_refactoring/index.php';
$css_array['board'] = 'style.css';
include $_SERVER['DOCUMENT_ROOT'].'/../section/header.php';
include 'function.php';
?>
<?php
$conn = db_connect();

$query = sprintf("SELECT * FROM board WHERE id != 0;");
$result_board = mysqli_query($conn, $query);
if (!$result_board) {
	die ("Database board table access failed: ".mysqli_error());
}

while ($row_board = mysqli_fetch_assoc($result_board)) {
	$board_id = $row_board['id'];
?>
<div class="fix main_content">
	
	<div class="fix">
		<h1><?php echo get_board_title($conn, $board_id); ?></h1>
	</div>
	
	<div class="fix table_style">
		<ul class="header">
			<li class="index floatleft">번호</li>
			<li class="title floatleft">제목</li>
			<li class="author floatleft">작성자</li>
			<li class="dtm floatleft">작성일</li>
		</ul>

<?php
	$query = "SELECT id, title, author, crea_dtm FROM post WHERE board_id = ".$board_id;
	$result = mysqli_query($conn, $query);
	if (!$result) {
		die ("Database access failed: ".mysqli_error());
	}
	
	while ($row = mysqli_fetch_assoc($result)) {
		echo '<ul>';
			printf('<li class="index floatleft">%s</li>', $row['id']);
			printf('<li class="title floatleft"><a href="view_post.php?board_id=%d&post_id=%d">%s</a></li>'
			, $board_id, $row['id'], $row['title']);
			printf('<li class="author floatleft">%s</li>', $row['author']);
			printf('<li class="dtm floatleft">%s</li>', time_set($row['crea_dtm']));
		echo '</ul>';
	}
	
	echo '<div class="table_caption">전체 : '.mysqli_num_rows($result).'</div>';
?>

	</div>

	<div class="fix button">
		<a class="write floatright" href="write_post.php?board_id=<?php echo $board_id; ?>">글쓰기</a>
	</div>
	
</div>

<?php
}
mysqli_close($conn);
?>

<?php include $_SERVER['DOCUMENT_ROOT'].'/../section/footer.php'; ?>