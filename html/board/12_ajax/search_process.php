<?php
if (isset($_POST['search'])) {
	$search = $_POST['search'];
	
	header("Location: index.php?search=".$search);
} else {
	header("Location: index.php");
}
?>