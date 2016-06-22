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
?>
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
	// $broad_arr = array();
	
	// 입력 내용
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$name = $_POST['name'];
		$subject = $_POST['subject'];
		$content = $_POST['content'];
	}
	
	$file_name = 'data.txt';
	$file_handle = fopen($file_name, 'a') or die("파일 쓰기 실패");
	
	if ($name != null && $subject != null && $content != null) {
		$input_string = get_all_line()."\t".$name."\t".$subject."\t".$content."\n";
		fwrite($file_handle, $input_string) or die("파일 쓰기 실패");
		
		$broad_arr[get_all_line()] = array($name, $subject, $content);
		//print_r($broad_arr);
		echo '파일 쓰기 성공!<br>';
	} else {
		echo '칸을 모두 채워주세요.<br>';
	}
	fclose($file_handle);
?>

<p><a href="index.php">목록</a></p>

</body>
</html>