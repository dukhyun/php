<?php
$local_url = '../';
$web_title = 'PHP 연습장';
$nav_array = array();
$nav_array[Home] = $local_url.'';
include $_SERVER['DOCUMENT_ROOT'].'/../section/header.php';
?>
<header>
<style>
input {
	border: 1px solid #444;
}
#result {
	width: 400px;
		word-break: break-all;
	overflow: hidden;
}
</style>
</header>
<h1>Script15</h1>
<br>
<script>
var words = [];
words.push('girl');
function buttonClicked() {
	var word = document.getElementById('word').value;
	words.push(word);
	words.sort();
	var sentence = '';
	for (var value of words) {
		sentence = sentence + value + ' ';
	}
	document.getElementById('result').innerHTML = sentence;
}
</script>

<input type="text" id="word" name="word" onfocus="this.value=''">
<button onclick="buttonClicked();">확인</button>
<div id="result"></div>



<?php include $_SERVER['DOCUMENT_ROOT'].'/../section/footer.php'; ?>