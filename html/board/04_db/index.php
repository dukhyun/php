<?php
$web_title = 'PHP 연습장 - home';
$nav_array = array();
$nav_array[Home] = $_SERVER['DOCUMENT_ROOT'].'/index.php';
$nav_array[Board] = $_SERVER['DOCUMENT_ROOT'].'/board/04_db/index.php';
include $_SERVER['DOCUMENT_ROOT'].'/header.php';
include $_SERVER['DOCUMENT_ROOT'].'/db_login.php';
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
	if (!$conn) {
		die('Mysql connection failed: '.mysqli_connect_error());
	}
	
	$query = "SELECT idx, title, author, crea_dtm FROM board";
	$result = mysqli_query($conn, $query);
	if (!$result) {
		die ("Database access failed: ".mysqli_error());
	}
	
	while($row = mysqli_fetch_assoc($result)) {
		echo '<ul>';
			echo '<li class="index floatleft">'.$row['idx'].'</li>';
			echo '<li class="title floatleft">'.
			'<a href="view_post.php?id='.$row['idx'].'">'.$row['title'].'</a>'.'</li>';
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

</body>
</html>