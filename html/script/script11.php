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
var array = ['a', 'b', 'c'];
var person = { name: 'Dukhyun', age: 30 };
var sentence = '';

for (var i = 0; i< array.length; i++) {
	sentence = sentence + array[i] + ' ';
}
document.write('어레이 출력: ' + sentence, '<br>');
sentence = '';

for (var value of array) {
	sentence = sentence + value + ' ';
}
document.write('어레이 출력: ' + sentence, '<br>');
sentence = '';

for (var property in person) {
	sentence = sentence + property + ': ' + person[property] + ' ';
}
document.write('어레이 출력: ' + sentence, '<br>');
sentence = '';

for (var index in array) {
	sentence = sentence + array[index] + ' ';
}
document.write('어레이 출력: ' + sentence, '<br>');
sentence = '';

for (var value in array) {
	sentence = sentence + value + ' ';
}
document.write('어레이 출력: ' + sentence, '<br>');
</script>
</header>


<?php include $_SERVER['DOCUMENT_ROOT'].'/../section/footer.php'; ?>