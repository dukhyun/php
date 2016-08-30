<?php
$local_url = '../';
$web_title = 'PHP 연습장';
$nav_array = array();
$nav_array['Home'] = $local_url.'';
include $_SERVER['DOCUMENT_ROOT'].'/../section/header.php';
?>

<h1>Script10</h1>
<br>
<header>
<script>
function buttonClicked() {
	var myObject = { name: 'Calvin', age: 32 };
	document.getElementById('result').innerHTML = 'My name is ' + myObject.name + '. I am ' + myObject.age + 'years old';
}
function Person(name, age) {
	this.name = name;
	this.age = age;
	this.introduce = function() {
		return 'My name is ' + this.name + '. I am ' + this.age + 'years old';
	}
}
function buttonClicked2() {
	var someFunction = new Person('Dukhyun', 30);
	document.getElementById('result2').innerHTML = someFunction.introduce();
}
</script>
</header>

<span id="result">결과값1</span>
<br>
<span id="result2">결과값2</span>
<br>
<button onclick="buttonClicked();">버튼1</button>
<button onclick="buttonClicked2();">버튼2</button>

<?php include $_SERVER['DOCUMENT_ROOT'].'/../section/footer.php'; ?>