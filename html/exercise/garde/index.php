<?php
$local_url = '../..';
$nav_array = array();
$nav_array['Home'] = $local_url.'/index.php';
$css_array['input'] = 'style.css';
include $local_url.'/../section/header.php';
include $local_url.'/../section/db_login.php';
?>

<div class="fix main_content">
	<h1>성적 입력</h1>
	<form action="input_db.php" method="post">
		<ul class ="from_style">
			<li><input type="text" name="student" value="이름" onfocus="this.value=''" onblur="if(this.value =='') this.value='이름';"></li>
			<li><input type="text" name="subject" value="과목" onfocus="this.value=''" onblur="if(this.value =='') this.value='과목';"></li>
			<li><input type="text" name="score" value="점수" onfocus="this.value=''" onblur="if(this.value =='') this.value='점수';"></li>
			<li><input type="submit" value="입력"></li>	
		</ul>
	</form>
	
	<br>
	<h2>테이블 A</h2>
	<?php include 'table_a.php' ?>
	
	<br>
	<h2>테이블 B</h2>
	<?php include 'table_b.php' ?>
</div>

<?php include $local_url.'/../section/footer.php'; ?>