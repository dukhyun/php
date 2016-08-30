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

<?php
start_session();
$conn = db_connect();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	$board_id = $_GET['board_id'];
	$post_id = $_GET['post_id'];
	$id = $_GET['cmt_id'];
}

$query = sprintf("SELECT * FROM comment WHERE id = %d;", $id);

$result = mysqli_query($conn, $query);
if (!$result) {
	die ("Database access failed: ".mysqli_error());
}
$row = mysqli_fetch_assoc($result);
?>
<div class="fix view_post">
	<form action="comment_update_db.php" method="post">
	<ul class="comment_write">
		<li>
			<input type="hidden" name="board_id" value="<?php echo $board_id; ?>">
			<input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
			<input type="hidden" name="comment_id" value="<?php echo $id; ?>">
		</li>
		<li>
			<label>comment</label>
		</li>
		<?php
			if ($row['member_id'] === NULL) {
		?>
		<li>
			<input type="text" name="author" value="<?php echo $row['author']; ?>">
		</li>
		<?php
			}
		?>
		<li class="cmt floatleft">
			<textarea maxlength="400" name="content"><?php
				echo $row['content'];
			?></textarea>
		</li>
		<li class="floatright">
			<input type="submit" value="수정">
		</li>
	</ul>
	</form>
</div>
<?php
mysqli_close($conn);
?>

<?php include $_SERVER['DOCUMENT_ROOT'].'/../section/footer.php'; ?>