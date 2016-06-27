<?php
$local_url = '../../';
$nav_array = array();
$nav_array['Home'] = $local_url.'index.php';
$css_array['input'] = 'style.css';
include $_SERVER['DOCUMENT_ROOT'].'/../section/header.php';
include $_SERVER['DOCUMENT_ROOT'].'/../section/db_login.php';
?>

<div class="fix main_content">
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$student = $_POST['student'];
		$subject = $_POST['subject'];
		$score = $_POST['score'];
	}
	
	$conn = mysqli_connect($hostname, $username, $password, $dbname);
	mysqli_query($conn, "SET NAMES 'utf8'");
	if (!$conn) {
		die('Mysql connection failed: '.mysqli_connect_error());
	}
	
	$query = sprintf('INSERT INTO garde (student, subject, score) VALUES (\'%s\', \'%s\', %d);', $student, $subject, $score);
	if (mysqli_query($conn, $query) === false) {
		echo 'INSERT failed : '.mysqli_error($conn);
	} else {
		echo 'INSERT<br>';
		echo '이름 : '.$student.'<br>';
		echo '과목 : '.$subject.'<br>';
		echo '점수 : '.$score.'<br>';
	}
?>
	<a href="index.php">이동..</a>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'].'/../section/footer.php'; ?>