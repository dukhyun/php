<?php
$local_url = '../../';
$web_title = 'PHP 연습장 - 게시판';
$nav_array = array();
$nav_array['Home'] = $local_url.'index.php';
$nav_array['Board'] = $local_url.'board/10_comment/';
$css_array['board'] = 'style.css';
// include $_SERVER['DOCUMENT_ROOT'].'/../section/header.php';
include $local_url.'../section/header.php';
require_once 'function.php';
?>

<div class="fix main_content">

<?php
start_session();
include_once 'login.php';
?>

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
	$board_id = get_board_id($conn, 'board_test'); // 게시판 id
	
	$page_post = 10; // 한 페이지에 표시할 글의 갯수
	$post_limit = ($page_post * $page) - $page_post; // 표시할 글 위치
?>
	<div class="fix">
		<h1>게시판1</h1>
	</div>
	
<?php
	if (isset($_GET['search'])) {
		echo '<div>';
		printf('%s로 검색되었습니다. ', $_GET['search']);
		printf('<a href="index.php">최신목록</a>');
		echo '</div>';
	}
?>
	
	<div class="fix table_style">
		<ul class="header">
			<li class="index floatleft">번호</li>
			<li class="title floatleft">제목</li>
			<li class="author floatleft">작성자</li>
			<li class="dtm floatleft">작성일</li>
		</ul>

<?php
	$temp_query = sprintf("board_id = %d", $board_id);
	if (isset($_GET['search'])) {
		$search_word = $_GET['search'];
		$temp_query .= sprintf(" AND (title LIKE '%%%s%%' OR content LIKE '%%%s%%')", $search_word, $search_word);
	}
	$query = sprintf("SELECT * FROM post WHERE %s ORDER BY id DESC LIMIT %d, %d;", $temp_query, $post_limit, $page_post);
	$result = mysqli_query($conn, $query);
	if (!$result) {
		echo $query.'<br>';
		die ("Database access failed: ".mysqli_error());
	}
	
	while ($row = mysqli_fetch_assoc($result)) {
		echo '<ul>';
			printf('<li class="index floatleft">%s</li>', $row['id']);
			printf('<li class="title floatleft"><a href="view_post.php?page=%d&board_id=%d&post_id=%d">%s</a></li>'
			, $page, $board_id, $row['id'], $row['title']);
			if (isset($row['member_id'])) {
				printf('<li class="author floatleft">%s</li>', get_member_name($conn, $row['member_id']));
			} else {
				printf('<li class="author floatleft">%s</li>', $row['author']);
			}
			printf('<li class="dtm floatleft">%s</li>', time_set($row['crea_dtm']));
		echo '</ul>';
	}
	
	// 게시판 갯수 구하기
	$query = sprintf("SELECT count(*) AS count FROM post WHERE %s;", $temp_query);
	$result = mysqli_query($conn, $query);
	if (!$result) {
		echo $query.'<br>';
		die ("Database access failed: ".mysqli_error());
	}
	$row = mysqli_fetch_assoc($result);
	
	$post_all = $row['count']; // 전체 글 갯수
	echo '<div class="table_caption">전체 : '.$post_all.'</div>';
?>

	</div>

	<div class="fix button">
		<a class="mark floatright" href="write_post.php?board_id=<?php echo $board_id; ?>">글쓰기</a>
	</div>
	
	<div class="fix page">
<?php
	$get_url = sprintf('index.php?');
	if (isset($_GET['search'])) {
		$get_url .= sprintf('search=%s&', $_GET['search']);
	}

	$page_all = ceil($post_all / $page_post); // 전체 페이지 수
	$page_view = 5; // 한 페이지에 표시할 페이지 갯수
	
	$page_prev = (ceil($page / $page_view) - 1) * $page_view;
	if ($page_prev) {
		printf('<a href="%spage=%d">이전</a>', $get_url, $page_prev);
	}
	
	for ($i = ($page_prev + 1); $i <= ($page_prev + $page_view); $i += 1) {
		if ($i > $page_all) {
			break;
		} else if ($i == $page) {
			printf('<span class="now">%d</span>', $i, $i);
		} else {
			printf('<a href="%spage=%d">%d</a>', $get_url, $i, $i);
		}
	}
	
	$page_next = ceil($page / $page_view) * $page_view + 1;
	if ($page_next < $page_all) {
		printf('<a href="%spage=%d">다음</a>', $get_url, $page_next);
	}
?>
	</div>
	
	<!-- 검색 //-->
	<div class="search">
		<form action="search_process.php" method="post">
		<ul>
			<li class="floatleft">
				<input type="text" name="search">
			</li>
			<li class="floatleft">
				<input type="submit" value="검색">
			</li>
		</ul>
		</form>
	</div>
</div>
<?php mysqli_close($conn); ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/../section/footer.php'; ?>