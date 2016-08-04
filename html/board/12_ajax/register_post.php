<?php
$local_url = '../../';
$web_title = 'PHP 연습장 - 게시판';
$nav_array = array();
$nav_array['Home'] = $local_url.'index.php';
$nav_array['Board'] = $local_url.'board/12_ajax/';
$css_array['board'] = 'style.css';
include $_SERVER['DOCUMENT_ROOT'].'/../section/header.php';
require_once 'function.php';
?>
<script src="sha512.js"></script>
<script src="check_form.js"></script>

<div class="fix register">
	<h1>회원 가입</h1>
	<form class="form_style" action="register_db.php" method="post">
		<ul>
			<li>
				<label>회원 id</label>
				<input type="text" name="id">
			</li>
			<li>
				<label>비밀번호</label>
				<input type="password" name="password">
			</li>
			<li>
				<label>비밀번호 확인</label>
				<input type="password" name="password2">
			</li>
			<li>
				<!-- <input type="submit" value="회원 가입"> -->
				<input type="button" value="회원 가입" onclick="checkRegisterForm(this.form, this.form.id, this.form.password, this.form.password2);">
			</li>
		</ul>
	</form>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'].'/../section/footer.php'; ?>