<?php
$conn = mysqli_connect($hostname, $username, $password, $dbname);
mysqli_query($conn, "SET NAMES 'utf8'");
if (!$conn) {
	die('Mysql connection failed: '.mysqli_connect_error());
}
?>

<table>
</table>

<?php mysqli_close($conn); ?>