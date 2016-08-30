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
	
	function add_line($name, $subject, $content) {
		$file_name = 'data.txt';
		$fh = fopen($file_name, 'r') or die("파일 읽기 실패");
		
		$num = 0;
		$tmp = array();
		while (($line = fgets($fh)) !== false) {
			$num += 1;
			$tmp = explode("\t", $line);
			if ($name == $tmp[0] && $subject == $tmp[1] && $content == $tmp[2]) {
				return $num;
			}
		}
		
		return false;
	}
?>
<html>
<head>
	<style>
	table {
		
	}
	th, td {
		border-bottom : 1px solid #ddd;
		text-align : left;
		padding : 0.2em;
	}
	#num {
		width : 80px;
	}
	#subject {
		width : 600px;
	}
	#name {
		width : 170px;
	}
	</style>
</head>
<body>

<?php
	$local_url = '../..';
	$nav_array = array();
	$nav_array['Home'] = $local_url.'/index.php';
	$nav_array['Board'] = 'index.php';
	include $local_url.'/../section/header.php';
?>

<table>
	<tr>
		<th id="num">번호</th>
		<th id="subject">제목</th>
		<th id="name">글쓴이</th>
	</tr>
<?php
	$arr = array();
	
	$file_name = 'data.txt';
	$file_handle = fopen($file_name, 'r') or die("파일 읽기 실패");

	while (($line = fgets($file_handle)) !== false) {
		$tmp = explode("\t", $line);
		if (count($tmp) === 4) {
			$arr[$tmp[0]] = array($tmp[1], $tmp[2], $tmp[3]);
		} // ($name, $subject, $content)
	}
	
	foreach ($arr as $key => $value) {
		echo '<tr>';
		echo '<td>'.$key.'</td>';
		echo '<td>'.'<a href="view_post.php?post_id='.$key.'">'.$value[2].'</a>'.'</td>';
		echo '<td>'.$value[1].'</td>';
		echo '</tr>';
	}
	
	echo '</table>';
	
	echo '<br>'.'전체 : '.get_all_line().'<br>';
	
	fclose($file_handle);
?>

<p><a href="write_post.php">글쓰기</a></p>

</body>
</html>