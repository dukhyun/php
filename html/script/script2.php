<?php
$local_url = '../';
$web_title = 'PHP 연습장';
$nav_array = array();
$nav_array[Home] = $local_url.'';
include $_SERVER['DOCUMENT_ROOT'].'/../section/header.php';
?>

<script>
<!-- lecture 6-3 -->
var elements = document.getElementsByClassName('my_class');
for (i = 0; i < elements.length; i++ ) {
	elements[i].innerHTML = '자바스크립트가 나를 살렸다!';
}
<!-- lecture 6-4 -->
function goForward() {
	history.forward();
}
function goLink() {
	history.pushState(null, null, '<?php echo $local_url; ?>');
}
</script>

<a onclick="goLink();" href="script3.php">메인페이지로 가기</a>
<br>
<button onclick="goForward();">뒤로가기</button>

<?php include $_SERVER['DOCUMENT_ROOT'].'/../section/footer.php'; ?>