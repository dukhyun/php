<?php
function db_connect($local_url) {
	include $local_url.'db_login.php';
	
	$conn = mysqli_connect($hostname, $username, $password, $dbname);
	mysqli_query($conn, "SET NAMES 'utf8'");
	if (!$conn) {
		die('Mysql connection failed: '.mysqli_connect_error());
	}
	
	return $conn;
}

function get_boardid($conn, $name) {
	//echo $name.'<br>';
	$query = "SELECT * FROM board WHERE name = '".$name."';";
	$result = mysqli_query($conn, $query);
	if (!$result) {
		die ("Database access failed: ".mysqli_error());
	} else {
		$row = mysqli_fetch_assoc($result);
		return $row['id'];
	}
}
?>