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

<div class="fix input_content">
	<?php
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$post_id = $_GET['post_id'];
		}
		$conn = db_connect();
		$query = sprintf("SELECT * FROM post WHERE id = %d;", $post_id);
		$result = mysqli_query($conn, $query);
		if (!$result) {
			die ("Database access failed: ".mysqli_error());
		}
		$row = mysqli_fetch_assoc($result);
	?>
	
	<h1>글 작성</h1>
	<form action="update_db.php" method="post">
		<ul class="form_style">
			<li>
				<input type="hidden" name="post" value="<?php echo $post_id; ?>" readonly>
			</li>
			<li>
				<label>이름</label>
				<input type="text" name="author" value="<?php echo $row['author']; ?>">
			</li>
			<li>
				<label>제목</label>
				<input type="text" name="title" value="<?php echo $row['title']; ?>">
			</li>
			<li>
				<label>내용</label>
				<textarea name="content"><?php echo $row['content']; ?></textarea>
			</li>
			<li>
				<input type="submit" value="제출">
			</li>
		</ul>
	</form>
</div>


<?php include $_SERVER['DOCUMENT_ROOT'].'/../section/footer.php'; ?>