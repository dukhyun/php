<?php
$local_url = '../../';
$web_title = 'PHP 연습장 - 게시판';
$nav_array = array();
$nav_array['Home'] = $local_url.'index.php';
$nav_array['Board'] = $local_url.'board/09_login/';
$css_array['board'] = 'style.css';
include $_SERVER['DOCUMENT_ROOT'].'/../section/header.php';
include 'function.php';
?>

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
		}
		
		$conn = db_connect();
		
		// hit_count 증가
		$query = sprintf("UPDATE post SET hit_count = hit_count + 1 WHERE id = %d;", $post_id);
		$result = mysqli_query($conn, $query);
		if (!$result) {
			die ("Database access failed: ".mysqli_error());
		}
		
		// 게시판 내용 출력
		$query = sprintf("SELECT * FROM post WHERE board_id = %d AND id = %d;",
					$board_id, $post_id);
		$result = mysqli_query($conn, $query);
		if (!$result) {
			die ("Database access failed: ".mysqli_error());
		}
	
		while ($row = mysqli_fetch_assoc($result)) {
			if (isset($row['author'])) {
				$author = $row['author'];
			} else {
				$member_id = $row['member_id'];
			}
			$title = $row['title'];
			$date = $row['crea_dtm'];
			// $content = str_replace("\n", "<br>", $row['content']);
			$content = $row['content'];
			$hit_count = $row['hit_count'];
		}
	?>
	<div class="fix">
		<h1>보기 화면</h1>
	</div>
	
	<div class="text floatleft">번호</div>
	<div class="output floatleft"><?php echo $post_id; ?></div>

	<div class="text floatleft">작성자</div>
	<?php
	if ($author != NULL) {
		printf('<div class="output floatleft">%s</div>', $author);
	} else {
		printf('<div class="output floatleft">%s</div>', $member_id);
	}
	?>
	<div class="text floatleft">작성 날짜</div>
	<div class="output floatleft"><?php echo $date; ?></div>

	<div class="text floatleft">조회수</div>
	<div class="output floatleft"><?php echo $hit_count; ?></div>

	<div class="text floatleft">제목</div>
	<div class="output floatleft"><?php echo $title; ?></div>

	<div class="content clearboth">
		<textarea readonly><?php // 내용
			echo $content;
		?></textarea>
	</div>
	
	<div class="button">
		<a class="mark" href="write_post.php?board_id=<?php echo $board_id; ?>">글쓰기</a>
	<?php
	// echo $member_id.', '.$_SESSION['id'];
	$temp = sprintf('board_id=%d&post_id=%d', $board_id, $post_id);
	if ($member_id) {
		if ($member_id == $_SESSION['id']) {
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
	
<?php 
	mysqli_close($conn);
?>

</div> <!-- view_post //-->

<?php include $_SERVER['DOCUMENT_ROOT'].'/../section/footer.php'; ?>