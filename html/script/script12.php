<?php
$local_url = '../';
$web_title = 'PHP 연습장';
$nav_array = array();
$nav_array['Home'] = $local_url.'';
include $_SERVER['DOCUMENT_ROOT'].'/../section/header.php';
?>

<h1>Script13</h1>
<br>
<header>
<script>
// 문자열 -> 어레이: PHP의 explode 기능
var word = 'apple';
var charArray = word.split(''); // 인자에는 구분자를 넣는다

// 어레이 -> 문자열: PHP의 implode 기능
var newWord = ['y', 'o', 'u'].join(''); // 인자에는 접착제를 넣는다
</script>
</header>

<button onclick="alert('charArray is: ' + charArray);">문자열 -> 어레이 결과</button>
<button onclick="alert('newWord is: ' + newWord);">어레이 -> 문자열 결과</button>

<?php include $_SERVER['DOCUMENT_ROOT'].'/../section/footer.php'; ?>