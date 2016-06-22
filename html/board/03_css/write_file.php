<!DOCTYPE html>
<html>
<head>
	<style>
	body {
		width : 800px;
		margin : 0 auto;
	}
	</style>
</head>
<body>

<?php
	// 입력 내용
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$name = $_POST['name'];
		$title = $_POST['title'];
		$content = $_POST['content'];
	}
	
	$file_name = 'data.txt';
	$file_handle = fopen($file_name, 'a') or die("파일 쓰기 실패");
	
	if ($name != null && $title != null && $content != null) {
		$txt = $name."\t".$title."\t".$content."\n";
		// $txt = "$name\t$title\t$content\n";
		fwrite($file_handle, $txt) or die("파일 쓰기 실패");
		
		echo '파일 쓰기 성공!<br>';
	} else {
		echo '칸을 모두 채워주세요.<br>';
	}
	fclose($file_handle);
?>

<p><a href="index.php">목록</a></p>

</body>
</html>