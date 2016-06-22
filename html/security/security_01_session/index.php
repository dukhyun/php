<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="content">
<?php
	require_once 'session.php';
	start_session();
	if (check_login()) {
?>
	<h1>현재 로그인 되어 있는 상태입니다</h1>
	<form action="logout.php" method="get">
		<input type="submit" value="로그아웃">
	</form>	
<?php
	} else {
?>
	<h1>로그인 하십시오</h1>
	<form action="login.php" method="post">
		<div class="login_form center">
			<ul>
				<li>E-mail:</li>
				<li><input type="text" name="id"></li>
			</ul>
			<ul>
				<li>비번:</li>
				<li><input type="text" name="password"></li>
			</ul>
			<ul>
				<li></li>
				<li><input type="submit" value="로그인"></li>
			</ul>
		</div>
	</form>
<?php
	}
?>
</div>
</body>
</html>