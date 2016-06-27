<?php
	$conn = mysqli_connect($hostname, $username, $password, $dbname);
	mysqli_query($conn, "SET NAMES 'utf8'");
	if (!$conn) {
		die('Mysql connection failed: '.mysqli_connect_error());
	}
	
	$query = sprintf('SELECT * FROM grade');
	$result = mysqli_query($conn, $query);
	if (!$result) {
		die('Database access failed: '.mysqli_error());
	}
	
	while ($row = mysqli_fetch_assoc($result)) {
		printf('');
	}
?>

<?php mysqli_close($conn); ?>