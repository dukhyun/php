<?php
$local_url = '../../';
$web_title = 'PHP 연습장 - 게시판';
$nav_array = array();
$nav_array['Home'] = $local_url.'index.php';
$nav_array['Board'] = $local_url.'board/11_xss/';
$css_array['board'] = 'style.css';
include $_SERVER['DOCUMENT_ROOT'].'/../section/header.php';
include 'function.php';
?>
<script language="javascript" src="/jquery/jquery-1.11.2.js"></script>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
$(document).ready(function() {
	$('.content').on('keyup', 'textarea', 
		function (e){
			$(this).css('height', 'auto' );
			$(this).height(this.scrollHeight);
		});
	$('.content').find('textarea').keyup();
});
$(document).ready(function() {
	$('.comment').on('keyup', 'textarea', 
		function (e){
			$(this).css('height', 'auto' );
			$(this).height(this.scrollHeight);
		});
	$('.comment').find('textarea').keyup();
});
</script>

<div class="view_post">
	<?php
	start_session();
	include_once 'login.php';
	?>
	
	<?php
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$page = $_GET['page'];
			$board_id = $_GET['board_id'];
			$post_id = $_GET['post_id'];
			$temp = sprintf('board_id=%d&post_id=%d', $board_id, $post_id);
		}
		
		$conn = db_connect();
		
		// hit_count 증가
		$query = sprintf("UPDATE post SET hit_count = hit_count + 1 WHERE id = %d;", $post_id);
		$result = mysqli_query($conn, $query);
		if (!$result) {
			die ("Database access failed: ".mysqli_error());
		}
		
		// 게시판 내용 출력
		$query = sprintf("SELECT * FROM post WHERE id = %d;", $post_id);
		$result = mysqli_query($conn, $query);
		if (!$result) {
			die ("Database access failed: ".mysqli_error());
		}
		$row = mysqli_fetch_assoc($result);
		
		if (isset($row['author'])) {
			$author = $row['author'];
		} else {
			$post_member = get_member_name($conn, $row['member_id']);
		}
		$title = $row['title'];
		$date = $row['crea_dtm'];
		// $content = str_replace("\n", "<br>", $row['content']);
		$content = $row['content'];
		$hit_count = $row['hit_count'];
	?>
	<div class="fix">
		<h1>보기 화면</h1>
	</div>
	
	<div class="text floatleft">번호</div>
	<div class="output floatleft"><?php echo $post_id; ?></div>

	<div class="text floatleft">작성자</div>
	<?php
	if ($author != NULL) {
		printf('<div class="output floatleft">%s</div>', htmlspecialchars($author));
	} else {
		printf('<div class="output floatleft">%s</div>', htmlspecialchars($post_member));
	}
	?>
	<div class="text floatleft">작성 날짜</div>
	<div class="output floatleft"><?php echo $date; ?></div>

	<div class="text floatleft">조회수</div>
	<div class="output floatleft"><?php echo $hit_count; ?></div>

	<div class="text floatleft">제목</div>
	<div class="output floatleft"><?php echo htmlspecialchars($title); ?></div>

	<div class="content clearboth">
		<textarea readonly><?php // 내용
			echo htmlspecialchars($content);
		?></textarea>
	</div>
	
	<div class="button">
		<a class="mark" href="write_post.php?board_id=<?php echo $board_id; ?>">글쓰기</a>
	<?php
	// echo $member_id.', '.$_SESSION['id'];
	if ($post_member) {
		if ($post_member == $_SESSION['id']) {
	?>
		<a href="update_post.php?<?php echo $temp; ?>">수정</a>
		<a href="delete_post.php?<?php echo $temp; ?>">삭제</a>
	<?php
		}
	} else {
	?>
		<a href="update_post.php?<?php echo $temp; ?>">수정</a>
		<a href="delete_post.php?<?php echo $temp; ?>">삭제</a>
	<?php
	}
	?>
		<a href="index.php?page=<?php echo $page; ?>">목록</a>
	</div>
	
	<!-- comment //-->
	<div class="comment_list">
	<?php
		$query = sprintf("SELECT * FROM comment WHERE post_id=%d;", $post_id);
		$result = mysqli_query($conn, $query);
		if (!$result) {
			die ("comment load failed: ".mysqli_error());
		}
	
		while ($row = mysqli_fetch_assoc($result)) {
	?>
		<ul class="clearfix">
			<li>
			<?php
			if ($row['member_id'] !== NULL) {
				$comment_member = get_member_name($conn, $row['member_id']);
				printf("<label>%s</label>", htmlspecialchars($comment_member));
				if (check_login()) {
					if ($comment_member == $_SESSION['id']) {
						printf('<a href="comment_update.php?%s&cmt_id=%d">%s</a>',$temp, $row['id'], '수정');
						printf('<a href="comment_del.php?%s&cmt_id=%d">%s</a>',$temp, $row['id'], '삭제');
					}
				}
			} else {
				printf("<label>%s</label>", $row['author']);
				printf('<a href="comment_update.php?%s&cmt_id=%d">%s</a>',$temp, $row['id'], '수정');
				printf('<a href="comment_del.php?%s&cmt_id=%d">%s</a>', $temp, $row['id'], '삭제');
			}
			?>
			</li>
			<li class="comment">
				<textarea id="comment<?php echo $row['id']; ?>" readonly><?php echo htmlspecialchars($row['content']); ?></textarea>
				<input type="hidden" value="수정">
			</li>
		</ul>
	<?php
		}
	?>
	</div>
	
	<form action="comment_db.php" method="post">
	<ul class="comment_write">
		<li>
			<input type="hidden" name="board_id" value="<?php echo $board_id; ?>" readonly>
			<input type="hidden" name="post_id" value="<?php echo $post_id; ?>" readonly>
		</li>
		<li>
			<label>comment</label>
		</li>
		<?php
			if (!check_login()) {
		?>
		<li>
			<input type="text" name="author" value="author" onfocus="if(this.value =='author') { this.value=''; }" onblur="if(this.value =='') { this.value='author'; }">
		</li>
		<?php
			}
		?>
		<li class="cmt floatleft">
			<textarea type="text" name="content"></textarea>
		</li>
		<li class="floatright">
			<input type="submit" value="작성">
		</li>
	</ul>
	</form>
	
<?php 
	mysqli_close($conn);
?>

</div> <!-- view_post //-->

<?php include $_SERVER['DOCUMENT_ROOT'].'/../section/footer.php'; ?>