<!DOCTYPE html>
<html>

<p><a href="../index.php">돌아가기</a></p>

<p><a href="write_post.php">Write</a></p>

<p><a href="view_post.php">View</a></p>

<p>
<?php
	$file_name = 'data.txt';
	$file_handle = fopen($file_name, 'a');
	if (!$file_handle) {
		die("파일 쓰기 실패");
	}
	// 입력 내용
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$name = $_POST['name'];
		$title = $_POST['title'];
		$comment = $_POST['comment'];
	}
	//$txt = $name."\t".$title."\t".$comment."\n";
	$txt = "$name\t$title\t$comment\n";
	fwrite($file_handle, $txt) or die("Could not write to file");
	fclose($file_handle);
?>
</p>

<!--
<table>
	<tr>
		<th>develop</th>
		<th>title</th>
	</tr>
	<tr>
		<td>call1</td>
		<td>call2</td>
	</tr>
	<tr>
		<td>call1</td>
		<td>call2</td>
	</tr>
	<tr>
		<td>call1</td>
		<td>call2</td>
	</tr>
	<tr>
		<td>call1</td>
		<td>call2</td>
	</tr>
</table>
-->
</html>