<?php
$local_url = '../../';
$web_title = 'PHP 연습장 - 게시판';
$nav_array = array();
$nav_array['Home'] = $local_url.'index.php';
$nav_array['Board'] = $local_url.'board/06_delete/index.php';
$css_array['board'] = 'style.css';
include $_SERVER['DOCUMENT_ROOT'].'/../section/header.php';
include 'function.php';
?>

<div class="fix main_content">
<?php
	// page 값이 존재하지 않으면 1page 출력
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		if ($_GET['page'] == false) {
			$page = 1;
		} else {
			$page = $_GET['page'];
		}
	}
	
	$conn = db_connect(); // DB 접속 함수
	$board_id = get_boardid($conn, 'board_test'); // 게시판 id
	
	// 게시판 갯수 구하기
	$query = sprintf("SELECT count(*) AS count FROM post WHERE board_id = %d;", $board_id);
	$result = mysqli_query($conn, $query);
	if (!$result) {
		echo $query.'<br>';
		die ("Database access failed: ".mysqli_error());
	}
	$row = mysqli_fetch_assoc($result);
	$post_all = $row['count']; // 전체 글 갯수
	
	$page_one = 5; // 한 페이지에 표시할 글의 갯수
	$page_all = ceil($post_all / $page_one); // 전체 페이지 수
	echo $post_all.' '.$page_all.'<br>';
	
	$post_limit = ($page_one * $page) - $page_one; // 표시할 글 위치
?>
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
	$query = sprintf("SELECT * FROM post WHERE board_id = %d LIMIT %d, %d;", $board_id, $post_limit, $page_one);
	$result = mysqli_query($conn, $query);
	if (!$result) {
		echo $query.'<br>';
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
	
	echo '<div class="table_caption">전체 : '.$post_all.'</div>';
?>

	</div>

	<div class="fix button">
		<a class="mark floatright" href="write_post.php?board_id=<?php echo $board_id; ?>">글쓰기</a>
	</div>
	
	<div class="fix page">
	<?php
		for ($i = 1; $i <= $page_all; $i += 1) {
			printf('<a href="index.php?page=%d">%d</a>', $i, $i);
		}
	?>
	</div>
</div>
<?php mysqli_close($conn); ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/../section/footer.php'; ?>