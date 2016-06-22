<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<body>

<?php
	$local_url = '../../';
	$navy = array();
	$navy[Home] = $local_url.'index.php';
	include $local_url.'savefrom/navybar.php';
?>

<?php
	include $local_url.'db_login.php';
	$conn = mysqli_connect($hostname, $username, $password, $dbname);
	if (!$conn) {
		die('Mysql connection failed: '.mysqli_connect_error());
	} 	
	
	// DB에서 rank가 높은 상위 20개 단어를 출력해 보자
	$select_query = 'SELECT word FROM dictionary WHERE rank <= 20';
	// select 쿼리는 mysqli_query 함수의 반환값으로 결과를 받는다.
	$result = mysqli_query($conn, $select_query);
	while($row = mysqli_fetch_assoc($result)) {
		echo $row['word'].'<br>';
	}
	mysqli_free_result($result);
	mysqli_close($conn);
?>
</body>
</html>