<?php // 회원 가입 처리
require_once 'function.php';

if (isset($_POST['id'], $_POST['hash'])) {
	$id = $_POST['id'];
	$password = $_POST['hash'];
	
	$conn = db_connect();
	$query = sprintf("SELECT * FROM member WHERE name = '%s'", $id);
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
	if ($id == $row['name']) { // 이미 등록된 아이디
		header('Location: error.php?error_code=4');
	} else {
		$stmt = mysqli_prepare($conn, "INSERT INTO member (name, pw_hash) VALUES (?, ?)");
		mysqli_stmt_bind_param($stmt, "ss", $id, password_hash($password, PASSWORD_DEFAULT));
		mysqli_stmt_execute($stmt);
		// header('Location: index.php'); // 자동 이동
		echo '<h1>회원가입 성공</h1>';
		echo '<a href="index.php">돌아가기</a>';
	}
	mysqli_free_result($result);
	mysqli_close($conn);
} else {
    echo '회원가입 폼 에러';
}
?>