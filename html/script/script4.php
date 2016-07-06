<?php
$local_url = '../';
$web_title = 'PHP 연습장';
$nav_array = array();
$nav_array[Home] = $local_url.'';
include $_SERVER['DOCUMENT_ROOT'].'/../section/header.php';
?>

<h1 id="test">Script4</h1>
<br>
<span class="test">test class</span>
<script>
document.getElementById('test').innerHTML = 'java id';
document.getElementById('test').style.color = 'blue';
document.getElementById('test').style.fontSize = '16px';
document.getElementsByClassName('test')[0].innerHTML = 'java class';
document.getElementsByClassName('test')[0].style.color = 'red';
</script>

<?php include $_SERVER['DOCUMENT_ROOT'].'/../section/footer.php'; ?>