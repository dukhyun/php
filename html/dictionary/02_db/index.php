<?php
$local_url = '../..';
$nav_array = array();
$nav_array['Home'] = $local_url.'/index.php';
include $local_url.'/../section/header.php';
?>
<?php
ini_set('max_execution_time', 300); // 300 seconds = 5 minutes
include $local_url.'/../section/db_login.php';
// var_dump(function_exists('mysqli_connect'));
$conn = mysqli_connect($hostname, $username, $password, $dbname);
if (!$conn) {
	die('Mysql connection failed: '.mysqli_connect_error());
}
// 단어목록 파일을 DB 에 넣어보자
$file_name = '../dictionary.txt';
$file_handle = fopen($file_name, 'r') or die("파일 읽기 실패");
while (($line = fgets($file_handle)) !== false) {
	$wordAndRank = explode("\t", $line);
	if (count($wordAndRank) === 2) {
		$word = $wordAndRank[0];
		$rank = intval($wordAndRank[1]);
		// DB 작업
		$insert_query = 'INSERT INTO dictionary (word, rank) VALUES (?, ?)';
		$stmt = mysqli_prepare($conn, $insert_query);
		mysqli_stmt_bind_param($stmt, 'si', $word, $rank);
		if (!mysqli_stmt_execute($stmt)) {
			echo mysqli_error($conn);
		}
		echo ' DB INSERT: '.$word.' '.$rank.'<br>';
	} else { // error
		die('data file error');
	}
}
echo 'DB INSERT 성공<br>';
mysqli_close($conn);
?>
</body>
</html>