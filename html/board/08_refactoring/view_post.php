<?php
$local_url = '../../';
$web_title = 'PHP 연습장 - 게시판';
$nav_array = array();
$nav_array['Home'] = $local_url.'index.php';
$nav_array['Board'] = $local_url.'board/05_foreign/index.php';
$css_array['board'] = $local_url.'board/05_foreign/style.css';
include $_SERVER['DOCUMENT_ROOT'].'/../section/header.php';
include 'function.php';
?>

<div class="view_post">
	<?php
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$board_id = $_GET['board_id'];
			$post_id = $_GET['post_id'];
		}
		
		$conn = db_connect();
		
		// hit_count 증가
		$query = "UPDATE post SET hit_count = hit_count + 1 WHERE id = ".$post_id.";";
		$result = mysqli_query($conn, $query);
		if (!$result) {
			die ("Database access failed: ".mysqli_error());
		}
		
		// 게시판 내용 출력
		$query = "SELECT * FROM post WHERE board_id = ".$board_id." AND id = ".$post_id.";";
		$result = mysqli_query($conn, $query);
		if (!$result) {
			die ("Database access failed: ".mysqli_error());
		}
	
		while($row = mysqli_fetch_assoc($result)) {
			$author = $row['author'];
			$title = $row['title'];
			$date = $row['crea_dtm'];
			$content = $row['content'];
			$hit_count = $row['hit_count'];
		}
	?>

	<h1>보기 화면</h1>

	<div class="text floatleft">번호</div>
	<div class="output floatleft"><?php echo $post_id; ?></div>

	<div class="text floatleft">작성자</div>
	<div class="output floatleft"><?php echo $author; ?></div>

	<div class="text floatleft">작성 날짜</div>
	<div class="output floatleft"><?php echo $date; ?></div>

	<div class="text floatleft">조회수</div>
	<div class="output floatleft"><?php echo $hit_count; ?></div>

	<div class="text floatleft">제목</div>
	<div class="output floatleft"><?php echo $title; ?></div>

	<div class="content clearboth">
		<?php // 내용
			echo $content;
		?>
	</div>
	
	<div class="button">
		<a href="write_post.php?board_id=<?php echo $board_id; ?>">글쓰기</a>
		<a href="update_post.php?post_id=<?php echo $post_id; ?>">수정</a>
		<a href="#">삭제</a>
		<a href="index.php">목록</a>
	</div>
	
<?php 
	mysqli_close($conn);
?>

</div> <!-- view_post //-->

<?php include $_SERVER['DOCUMENT_ROOT'].'/../section/footer.php'; ?>