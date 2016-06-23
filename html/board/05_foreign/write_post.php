<?php
$local_url = '../../';
$web_title = 'PHP 연습장 - 게시판';
$nav_array = array();
$nav_array['Home'] = $local_url.'index.php';
$nav_array['Board'] = $local_url.'board/05_foreign/index.php';
$css_array['board'] = $local_url.'board/05_foreign/style.css';
include $local_url.'header.php';
?>

<div class="fix input_content">
	<?php
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$board_id = $_GET['board_id'];
		}
	?>
	<h1>글 작성</h1>
	<form action="write_db.php" method="post">
		<ul class="form_style">
			<li>
				<label>게시판</label>
				<input type="text" name="board" value="<?php echo $board_id; ?>">
			</li>
			<li>
				<label>이름</label>
				<input type="text" name="author">
			</li>
			<li>
				<label>제목</label>
				<input type="text" name="title">
			</li>
			<li>
				<label>내용</label>
				<textarea name="content"></textarea>
			</li>
			<li>
				<input type="submit" value="제출">
			</li>
		</ul>
	</form>
</div>

<?php include $local_url.'footer.php'; ?>