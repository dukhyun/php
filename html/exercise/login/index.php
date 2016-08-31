<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/css/mystyle.css">
</head>
<body>
<div class="content">
	<h1>폼 예시</h1>
	<form action="login.php" method="post">
		이름: <input type="text" name="name"><br>
		E-mail: <input type="text" name="email"><br>
		Website: <input type="text" name="website">
		<br>
		Comment: <br>
		<textarea name="comment" rows="5" cols="40"></textarea>
		<br>
		성별: <?php // echo 'input type="radio"<br>'; ?>
		Female<input type="radio" name="gender" value="female">
		Male<input type="radio" name="gender" value="male">
		<br>
		<input type="submit" value="제출">
	</form>
</div>
</body>
</html>