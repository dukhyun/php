<!DOCTYPE html>

<?php
	function get_line($num) {
		$file_name = 'data.txt';
		$fh = fopen($file_name, 'r') or die("파일 읽기 실패");
		
		$index = 0;
		while (($line = fgets($fh)) !== false) {
			$index += 1;
			$tmp = explode("\t", $line);
			if ($index == $num) {
				return $tmp;
			}
		}
		
		return false;
	}
?>

<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="style.css">
<style>
</style>
</head>
<body>

<?php
	$local_url = '../../';
	$navy = array();
	$navy[Home] = $local_url.'index.php';
	$navy[Board] = 'index.php';
	include $local_url.'savefrom/navybar.php';
?>

<div class="view_post">
	<?php
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$number = $_GET['number'];
		}

		// $txt = array();
		$txt = get_line($number);
		
		$name = $txt[0];
		$title = $txt[1];
		$content = $txt[2];
	?>

	<h1>보기 화면</h1>

	<div class="text">번호</div>
	<div class="output"><?php echo $number; ?></div>

	<div class="text">작성자</div>
	<div class="output"><?php echo $name; ?></div>

	<div class="text">제목</div>
	<div class="output"><?php echo $title; ?></div>

	<div class="content">
		<?php echo $content; ?>
	</div>

	<p><a href="index.php">목록</a></p>

</div> <!-- view_post //-->

</body>
</html>