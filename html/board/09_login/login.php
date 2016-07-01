<header>
	<?php
	// start_session();
	if (check_login()) {
		$user_id = $_SESSION['id'];
	?>
	<span class="fix floatleft">
		<?php echo $user_id; ?>님이 로그인되어 있습니다.
	</span>
	<form class="fix floatleft" action="logout_process.php" method="get">
		<input type="submit" value="logout">
	</form>
	<?php
	} else {
	?>
	<form action="login_process.php" method="post">
		<ul>
			<li class="floatleft">
				<input type="text" name="id" value="E-mail" onfocus="if(this.value =='E-mail') this.value=''" onblur="if(this.value =='') this.value='E-mail';">
			</li>
			<li class="floatleft">
				<input type="text" name="password" value="password" onfocus="if(this.value =='password') { this.value=''; this.type='password'; }" onblur="if(this.value =='') { this.value='password'; this.type='text'; }">
			</li>
			<li class="floatleft">
				<input type="submit" value="로그인">
			</li>	
		</ul>
	</form>
	<form action="register_post.php" method="get">
		<input type="submit" value="회원가입">
	</form>
	<?php
	}
	?>
</header>