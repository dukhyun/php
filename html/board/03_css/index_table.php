<!DOCTYPE html>

<?php
	function get_all_line() {
		$file_name = 'data.txt';
		$fh = fopen($file_name, 'r') or die("파일 읽기 실패");
		
		$all_line = 0;
		while (($line = fgets($fh)) !== false) {
			$all_line += 1;
		}
		
		//return count(file($file_name));
		return $all_line;
	}
	
	function add_line($name, $title, $content) {
		$file_name = 'data.txt';
		$fh = fopen($file_name, 'r') or die("파일 읽기 실패");
		
		$num = 0;
		$tmp = array();
		while (($line = fgets($fh)) !== false) {
			$num += 1;
			$tmp = explode("\t", $line);
			if ($name == $tmp[0] && $title == $tmp[1] && $content == $tmp[2]) {
				return $num;
			}
		}
		
		return false;
	}
?>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="fix main_content">
	
	<div class="fix">
		<a href="../index.php">홈</a>
	</div>
	<div class="fix">
		<h1>게시판</h1>
	</div>
	
<table>
	<tr>
		<th id="num">번호</th>
		<th id="title">제목</th>
		<th id="name">글쓴이</th>
	</tr>
<?php
	$file_name = 'data.txt';
	$file_handle = fopen($file_name, 'r') or die("파일 읽기 실패");
	$index = 0;
	while (($line = fgets($file_handle)) !== false) {
		$index += 1;
		$txt = explode("\t", $line);
		if (count($txt) === 3) {
			//$index = $txt[0]
			$name = $txt[0];
			$title = $txt[1];
			$content = $txt[2];
		}
		echo '<tr>';
		echo '<td>'.$index.'</td>';
		echo '<td>'.'<a href="view_post.php?number='.$index.'">'.$title.'</a>'.'</td>';
		//echo '<td>'.$content.'</td>';
		echo '<td>'.$name.'</td>';
		echo '</tr>';
	}
	
	echo '</table>';
	
	echo '<br>'.'전체 : '.get_all_line($file_handle).'<br>';
	
	fclose($file_handle);
?>
<div class="fix button">
	<a href="write_post.php">글쓰기</a>
</div>

</div>

</body>
</html>