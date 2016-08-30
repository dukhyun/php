<?php
$local_url = '../..';
$nav_array = array();
$nav_array['Home'] = $local_url.'/index.php';
$css_array['input'] = 'style.css';
include $local_url.'/../section/header.php';
include $local_url.'/../section/db_login.php';
?>

<div class="fix main_content">
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$student = $_POST['student'];
		$subject = $_POST['subject'];
		$score = $_POST['score'];
	}
	
	// db 접속
	$conn = mysqli_connect($hostname, $username, $password, $dbname);
	mysqli_query($conn, "SET NAMES 'utf8'");
	if (!$conn) {
		die('Mysql connection failed: '.mysqli_connect_error());
	}
	
	// get student_id
	$query = sprintf("SELECT * FROM student WHERE name='%s';", $student);
	$result = mysqli_query($conn, $query);
	if (mysqli_num_rows($result) == 0) {
		$query = sprintf("INSERT INTO student (name) VALUES ('%s');", $student);
		if (mysqli_query($conn, $query) === false) {
			die('INSERT failed : '.mysqli_error($conn));
		} else {
			$student_id = mysqli_insert_id($conn);
		}
	} else {
		$row = mysqli_fetch_assoc($result);
		$student_id = $row['id'];
	}
	
	if (isset($student_id)) {
		echo 'student_id: '.$student_id.'<br>';
	}
	
	// get subject_id
	$query = sprintf("SELECT * FROM subject WHERE subject='%s';", $subject);
	$result = mysqli_query($conn, $query);
	if (mysqli_num_rows($result) == 0) {
		$query = sprintf("INSERT INTO subject (subject) VALUES ('%s');", $subject);
		if (mysqli_query($conn, $query) === false) {
			die('INSERT failed : '.mysqli_error($conn));
		} else {
			$subject_id = mysqli_insert_id($conn);
		}
	} else {
		$row = mysqli_fetch_assoc($result);
		$subject_id = $row['id'];
	}
	
	if (isset($subject_id)) {
		echo 'subject_id: '.$subject_id.'<br>';
	}
	
	// 중복 검사
	$query = 'SELECT * FROM grade WHERE student=? AND subject=?;';
	$stmt = mysqli_prepare($conn, $query);
	mysqli_stmt_bind_param($stmt, 'ii', $student_id, $subject_id);
	mysqli_stmt_execute($stmt) or die(mysqli_error($conn));
	$result = mysqli_stmt_get_result($stmt);
	if (mysqli_num_rows($result) !== 0) {
		// update db
		$query = 'UPDATE grade SET score=? WHERE student=? AND subject=?;';
		$stmt = mysqli_prepare($conn, $query);
		mysqli_stmt_bind_param($stmt, 'iii', $score, $student_id, $subject_id);
		mysqli_stmt_execute($stmt) or die(mysqli_error($conn));
		echo 'update<br>';
		echo $student.', '.$subject.', '.$score.'<br>';
	} else {
		// insert db
		$query = 'INSERT INTO grade (student, subject, score) VALUES (?, ?, ?);';
		$stmt = mysqli_prepare($conn, $query);
		mysqli_stmt_bind_param($stmt, 'iii', $student_id, $subject_id, $score);
		mysqli_stmt_execute($stmt) or die(mysqli_error($conn));
		echo 'insert<br>';
		echo $student.', '.$subject.', '.$score.'<br>';
	}
?>
	<a href="index.php">이동..</a>
</div>

<?php include $local_url.'/../section/footer.php'; ?>