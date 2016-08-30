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
</script>

<div class="view_post">
	<?php
	start_session();
	include_once 'login.php';
	?>
	
	<?php
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			if (isset($_GET['page'])) {
				$page = $_GET['page'];
			}
			
			$board_id = $_GET['board_id'];
			$post_id = $_GET['post_id'];
			$temp = sprintf('board_id=%d&post_id=%d', $board_id, $post_id);
		}
		
		$conn = db_connect();
		
		// hit_count 증가
		$query = 'UPDATE post SET hit_count = hit_count + 1 WHERE id = ?;';
		$stmt = mysqli_prepare($conn, $query);
		mysqli_stmt_bind_param($stmt, 'i', $post_id);
		if (!mysqli_stmt_execute($stmt)) {
			echo mysqli_error($conn);
		}
		
		// 게시판 내용 출력
		$query = sprintf("SELECT * FROM post WHERE id = %d;", $post_id);
		$result = mysqli_query($conn, $query);
		if (!$result) {
			die ("post view failed: ".mysqli_error($conn));
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
	<br>
	<div class="text floatleft">번호</div>
	<div class="output floatleft"><?php echo $post_id; ?></div>

	<div class="text floatleft">작성자</div>
	<?php
	if (isset($author)) {
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
	if (isset($post_member)) {
		if (isset($_SESSION['id']) && $post_member == $_SESSION['id']) {
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
	
	if (isset($page)) {
	?>
		<a href="index.php?page=<?php echo $page; ?>">목록</a>
	<?php
	} else {
	?>
		<a href="index.php">목록</a>
	<?php
	}
	?>
	</div>
	
<!-- comment //-->
<?php
	include_once 'comment_view.php';
?>
	
<?php 
	mysqli_close($conn);
?>

</div> <!-- view_post //-->

<?php include $local_url.'/../section/footer.php'; ?>