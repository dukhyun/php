<?php
function db_connect() {
	include $_SERVER['DOCUMENT_ROOT'].'/../section/db_login.php';
	
	$conn = mysqli_connect($hostname, $username, $password, $dbname);
	mysqli_query($conn, "SET NAMES 'utf8'");
	if (!$conn) {
		die('Mysql connection failed: '.mysqli_connect_error());
	}
	
	return $conn;
}

function get_boardid($conn, $title) {
	$query = "SELECT id FROM board WHERE title = '".$title."';";
	$result = mysqli_query($conn, $query);
	if (!$result) {
		die ("Database access failed: ".mysqli_error());
	} else {
		$row = mysqli_fetch_assoc($result);
		return $row['id'];
	}
}

function get_board_title($conn, $id) {
	$query = "SELECT title FROM board WHERE id = ".$id.";";
	$result = mysqli_query($conn, $query);
	if (!$result) {
		die ("Database access failed: ".mysqli_error());
	} else {
		$row = mysqli_fetch_assoc($result);
		return $row['title'];
	}
}

function time_set($date) {
	$timezone = 'GMT+0';
	$date = strtotime($date.' '.$timezone);
	$date = date('m-d H:i', $date);
	return $date;
}
?>