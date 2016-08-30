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
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php
	$local_url = '../..';
	$nav_array = array();
	$nav_array['Home'] = $local_url.'/index.php';
	$nav_array['Board'] = 'index.php';
	include $local_url.'/../section/header.php';
?>

<div class="fix main_content">
	
	<div class="fix">
		<h1>게시판</h1>
	</div>
	
	<div class="fix table_style">
		<ul class="header">
			<li class="index floatleft">번호</li>
			<li class="subject floatleft">제목</li>
			<li class="author floatleft">작성자</li>
		</ul>
		<?php
			$file_name = 'data.txt';
			$file_handle = fopen($file_name, 'r') or die("파일 읽기 실패");
			
			echo '<div class="table_caption">전체 : '.get_all_line($file_handle).'</div>';
			
			$index = 0;
			while (($line = fgets($file_handle)) !== false) {
				$index += 1;
				$txt = explode("\t", $line);
				if (count($txt) === 3) {
					//$index = $txt[0]
					$author = $txt[0];
					$subject = $txt[1];
					$content = $txt[2];
				}
				echo '<ul>'; // tr 대용
				echo '<li class="index floatleft">'.$index.'</li>';
				echo '<li class="subject floatleft">'.'<a href="view_post.php?number='.$index.'">'.$subject.'</a>'.'</li>';
				echo '<li class="author floatleft">'.$author.'</li>';
				echo '</ul>';
			}
			
			fclose($file_handle);
		?>
	</div>

	<div class="fix button">
		<a href="write_post.php">글쓰기</a>
	</div>
	<p class="clearboth">&nbsp;</p>

</div>

</body>
</html>