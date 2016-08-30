<?php
$conn = mysqli_connect($hostname, $username, $password, $dbname);
mysqli_query($conn, "SET NAMES 'utf8'");
if (!$conn) {
	die('Mysql connection failed: '.mysqli_connect_error());
}

$query = 'SELECT student.name AS student,
	subject.subject AS subject, score FROM grade
	INNER JOIN student ON (student.id = grade.student)
	INNER JOIN subject ON (subject.id = grade.subject);';
// $query = 'SELECT count(*) as count FROM grade WHERE student=4';
$stmt = mysqli_prepare($conn, $query);
// mysqli_stmt_bind_param($stmt);
mysqli_stmt_execute($stmt) or die(mysqli_error($conn));
$result = mysqli_stmt_get_result($stmt);
//echo mysqli_num_rows($result); // 쿼리 결과값의 갯수
if ($result === false) {
	die('Database access failed: '.mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);
if (isset($row['count'])) {
	echo $row['count'];
} else {
?>
<div id="grade">
	<ul>
		<li>이름</li>
		<li>과목</li>
		<li>점수</li>
	<ul>
<?php
	mysqli_data_seek($result, 0); // 인텍스 설정
	while ($row = mysqli_fetch_assoc($result)) {
?>
	<ul>
		<li><?php echo $row['student'] ?></li>
		<li><?php echo $row['subject'] ?></li>
		<li><?php echo $row['score'] ?></li>
	<ul>
<?php
	}
}
?>
</div>

<?php mysqli_close($conn); ?>