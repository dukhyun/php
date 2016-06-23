<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/css/mystyle.css">
</head>
<body>

<h1>보기 화면</h1>

<table border="1">
	<tr>
		<th>이름</th>
		<th>제목</th>
		<th>내용</th>
	</tr>
<?php
	$file_name = 'data.txt';
	$file_handle = fopen($file_name, 'r');
	if (!$file_handle) {
		die("파일 읽기 실패");
	}
	
	while (($line = fgets($file_handle)) !== false) {
		$txt = explode("\t", $line);
		if (count($txt) === 3) {
			$name = $txt[0];
			$title = $txt[1];
			$comment = $txt[2];
		}
		echo '<tr>';
		echo '<td>'.$name.'</td>';
		echo '<td>'.$title.'</td>';
		echo '<td>'.$comment.'</td>';
		echo '</tr>';
	}
	fclose($file_handle);
?>
</table>

</body>
</html>