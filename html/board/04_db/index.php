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

<div class="fix main_content">
	
	<div class="fix">
		<h1>게시판</h1>
	</div>
	
	<div class="fix table_style">
		<ul class="header">
			<li class="index floatleft">번호</li>
			<li class="title floatleft">제목</li>
			<li class="author floatleft">작성자</li>
			<li class="dtm floatleft">작성일</li>
		</ul>

<?php
	$conn = mysqli_connect($hostname, $username, $password, $dbname);
	mysqli_query($conn, "SET NAMES 'utf8'");
	if (!$conn) {
		die('Mysql connection failed: '.mysqli_connect_error());
	}
	
	$query = "SELECT id, title, author, crea_dtm FROM post WHERE board_id = '1'";
	$result = mysqli_query($conn, $query);
	if (!$result) {
		die ("Database access failed: ".mysqli_error());
	}
	
	while($row = mysqli_fetch_assoc($result)) {
		echo '<ul>';
			echo '<li class="index floatleft">'.$row['id'].'</li>';
			echo '<li class="title floatleft">'.
			'<a href="view_post.php?id='.$row['id'].'">'.$row['title'].'</a>'.'</li>';
			echo '<li class="author floatleft">'.$row['author'].'</li>';
			echo '<li class="author floatleft">'
			.date("m-d H:i", strtotime($row['crea_dtm'])).'</li>';
		echo '</ul>';
	}
	
	echo '<div class="table_caption">전체 : '.mysqli_num_rows($result).'</div>';
?>

	</div>

	<div class="fix button">
		<a class="write floatright" href="write_post.php">글쓰기</a>
	</div>

</div>

<?php include $local_url.'/../section/footer.php'; ?>