<?php
$local_url = '../';
$web_title = 'PHP 연습장';
$nav_array = array();
$nav_array[Home] = $local_url.'';
include $_SERVER['DOCUMENT_ROOT'].'/../section/header.php';
?>

<h1 id="hh">Script6</h1>
<br>
<header>
<script>
var somefunction = function alertButtonClicked() {
	alert('alert 클릭됨. 그냥 보고 닫으세요.');
}
function cofirmButtonClicked() {
	if (confirm('confirm 클릭됨. yes or no')) {
		document.getElementById('result').innerHTML = 'confirm에서 yes가 클릭되었음';
	} else {
		document.getElementById('result').innerHTML = 'confirm에서 no가 클릭되었음';
	}
}
function promptButtonClicked() {
	var input = prompt('prompt 클릭됨', '값을 입력해 주세요.');
	document.getElementById('result').innerHTML = input;
}
</script>
</header>

<span id="result">결과값은 여기에 나타남</span>
<br>
<button onclick="somefunction();">alert</button>
<button onclick="cofirmButtonClicked();">confirm</button>
<button onclick="promptButtonClicked();">prompt</button>
<script>
document.getElementById('result').onclick = somefunction;
// document.getElementById('result').onclick = otherFunction;
document.getElementById('result').style.color = "red";
document.getElementById('result').onmouseover = function() {
	this.style.color = "blue";
}
document.getElementById('result').onmouseleave = function() {
	this.style.color = "black";
}
</script>

<?php include $_SERVER['DOCUMENT_ROOT'].'/../section/footer.php'; ?>