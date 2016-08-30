<?php
$local_url = '../..';
$web_title = 'PHP 연습장 - 게시판';
$nav_array = array();
$nav_array['Home'] = $local_url.'/index.php';
$nav_array['Board'] = 'index.php';
$css_array['style'] = 'style.css';
include $local_url.'/../section/header.php';
include $local_url.'/../section/db_login.php';
?>

<div class="view_post">
	<?php
		$board_id = 1;
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$post_id = $_GET['id'];
		}
		
		$conn = mysqli_connect($hostname, $username, $password, $dbname);
		mysqli_query($conn, "SET NAMES 'utf8'");
		if (!$conn) {
			die('Mysql connection failed: '.mysqli_connect_error());
		}
		
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
		<?php echo $content; ?>
	</div>
	
	<div class="button">
		<a href="/">글쓰기</a>
		<a href="/">수정</a>
		<a href="/">삭제</a>
		<a href="/">목록</a>
	</div>
	
<?php 
	mysqli_close($conn);
?>

</div> <!-- view_post //-->

<?php include $local_url.'/../section/footer.php'; ?>