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
<style>
	body {
		width : 800px;
		margin : 0 auto;
	}
	div.text {
		width: 200px;
		height: 2em;
		float: left;
		padding: 2px;
		box-sizing: border-box;
		border: 1px solid #bbb;
		background-color: #eee;
	}
	div.output {
		width: 100%;
		height: 2em;
		padding: 2px;
		box-sizing: border-box;
		border: 1px solid #bbb;
	}
	div#content {
		width: 100%;
		height: 200px;
		padding: 10px;
		box-sizing: border-box;
		border: 1px solid #bbb;
	}
</style>
</head>
<body>

<?php
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		$number = $_GET['number'];
	}

	// $txt = array();
	$txt = get_line($number);
	
	$name = $txt[0];
	$title = $txt[1];
	$content = $txt[2];
	
	// $file_name = 'data.txt';
	// $fh = fopen($file_name, 'r') or die("파일 읽기 실패");
	
	// $index = 0;
	// while (($line = fgets($fh)) !== false) {
		// $index += 1;
		// $tmp = explode("\t", $line);
		// if ($index == $num) {
			// $name = $tmp[0];
			// $title = $tmp[1];
			// $content = $tmp[2];
		// }
	// }
?>

<h1>보기 화면</h1>

<div class="text" id="number">번호</div>

<div class="output"><?php echo $number; ?></div>

<div class="text" id="name">글쓴이</div>

<div class="output"><?php echo $name; ?></div>

<div class="text" id="title">제목</div>

<div class="output"><?php echo $title; ?></div>

<div id="content">
	<?php echo $content; ?>
</div>

<p><a href="index.php">목록</a></p>

</body>
</html>