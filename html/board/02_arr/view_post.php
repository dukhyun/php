<!DOCTYPE html>

<?php
	function get_line($num) {
		$file_name = 'data.txt';
		$fh = fopen($file_name, 'r') or die("파일 읽기 실패");
		
		while (($line = fgets($fh)) !== false) {
			$tmp = explode("\t", $line);
			// tmp[0] = number
			// tmp[1] = name, temp[2] = subject, temp[3] = content
			if ($tmp[0] == $num && count($tmp) == 4) {
				return $tmp;
			}
		}
		
		return false;
	}
?>

<html>
<head>
<style>
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
	$local_url = '../../';
	$navy = array();
	$navy[Home] = $local_url.'index.php';
	$navy[Board] = 'index.php';
	include $local_url.'savefrom/navybar.php';
?>

<?php
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		$post_id = $_GET['post_id'];
	}

	// $txt = array();
	$txt = get_line($post_id);
	
	$name = $txt[1];
	$subject = $txt[2];
	$content = $txt[3];
	
	// $file_name = 'data.txt';
	// $fh = fopen($file_name, 'r') or die("파일 읽기 실패");
	
	// $index = 0;
	// while (($line = fgets($fh)) !== false) {
		// $index += 1;
		// $tmp = explode("\t", $line);
		// if ($index == $num) {
			// $name = $tmp[0];
			// $subject = $tmp[1];
			// $content = $tmp[2];
		// }
	// }
?>

<h1>보기 화면</h1>

<div class="text" id="number">번호</div>

<div class="output"><?php echo $post_id; ?></div>

<div class="text" id="name">글쓴이</div>

<div class="output"><?php echo $name; ?></div>

<div class="text" id="subject">제목</div>

<div class="output"><?php echo $subject; ?></div>

<div id="content">
	<?php echo $content; ?>
</div>

<p><a href="index.php">목록</a></p>

</body>
</html>