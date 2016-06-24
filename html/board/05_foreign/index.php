<?php
$local_url = '../../';
$web_title = 'PHP 연습장 - 게시판';
$nav_array = array();
$nav_array['Home'] = $local_url.'index.php';
$nav_array['Board'] = $local_url.'board/05_foreign/index.php';
$css_array['board'] = $local_url.'board/05_foreign/style.css';
include $local_url.'header.php';
// include $local_url.'db_login.php';
include 'function.php';
?>

<div class="fix main_content">
	
	<div class="fix">
		<h1>게시판1</h1>
	</div>
	
	<div class="fix table_style">
		<ul class="header">
			<li class="index floatleft">번호</li>
			<li class="title floatleft">제목</li>
			<li class="author floatleft">작성자</li>
			<li class="dtm floatleft">작성일</li>
		</ul>

<?php
	$conn = db_connect($local_url);
	$board_id = get_boardid($conn, 'board_test');

	$query = "SELECT id, title, author, crea_dtm FROM post WHERE board_id = ".$board_id;
	$result = mysqli_query($conn, $query);
	if (!$result) {
		die ("Database access failed: ".mysqli_error());
	}
	
	while($row = mysqli_fetch_assoc($result)) {
		echo '<ul>';
			echo '<li class="index floatleft">'.$row['id'].'</li>';
			echo '<li class="title floatleft">'.
			'<a href="view_post.php?board_id='.$board_id.'&post_id='.$row['id'].'">'.
			$row['title'].'</a>'.'</li>';
			echo '<li class="author floatleft">'.$row['author'].'</li>';
			// echo '<li class="dtm floatleft">'.strtotime($row['crea_dtm']).'</li>';
			echo '<li class="dtm floatleft">'.time_set($row['crea_dtm']).'</li>';
		echo '</ul>';
	}
	
	echo '<div class="table_caption">전체 : '.mysqli_num_rows($result).'</div>';
?>

	</div>

	<div class="fix button">
		<a class="write floatright" href="write_post.php?board_id=<?php echo $board_id; ?>">글쓰기</a>
	</div>
<?php mysqli_close($conn); ?>
</div>

<div class="fix main_content">
	
	<div class="fix">
		<h1>게시판2</h1>
	</div>
	
	<div class="fix table_style">
		<ul class="header">
			<li class="index floatleft">번호</li>
			<li class="title floatleft">제목</li>
			<li class="author floatleft">작성자</li>
			<li class="dtm floatleft">작성일</li>
		</ul>

<?php
	$conn = db_connect($local_url);
	$board_id = get_boardid($conn, 'board_test2');
	
	$query = "SELECT id, title, author, crea_dtm FROM post WHERE board_id = ".$board_id;
	$result = mysqli_query($conn, $query);
	if (!$result) {
		die ("Database access failed: ".mysqli_error());
	}
	
	while($row = mysqli_fetch_assoc($result)) {
		echo '<ul>';
			echo '<li class="index floatleft">'.$row['id'].'</li>';
			echo '<li class="title floatleft">'.
			'<a href="view_post.php?board_id='.$board_id.'&post_id='.$row['id'].'">'.
			$row['title'].'</a>'.'</li>';
			echo '<li class="author floatleft">'.$row['author'].'</li>';
			echo '<li class="dtm floatleft">'.time_set($row['crea_dtm']).'</li>';
		echo '</ul>';
	}
	
	echo '<div class="table_caption">전체 : '.mysqli_num_rows($result).'</div>';
?>

	</div>

	<div class="fix button">
		<a class="write floatright" href="write_post.php?board_id=<?php echo $board_id; ?>">글쓰기</a>
	</div>
<?php mysqli_close($conn); ?>
</div>

<?php include $local_url.'footer.php'; ?>