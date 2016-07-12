<?php
$local_url = '../';
$web_title = 'PHP 연습장';
$nav_array = array();
$nav_array[Home] = $local_url.'';
include $_SERVER['DOCUMENT_ROOT'].'/../section/header.php';
?>

<h1>Script13</h1>
<br>
<header>
<script>
// 문자열 ->어레이: PHP의 explode 기능
var words = ['you', 'apple', 'php', 'PHP', 'javascript', 'Calvin'];
var copy = ['you', 'apple', 'php', 'PHP', 'javascript', 'Calvin'];
words.sort();
copy.sort(function(a, b) { return a.length - b.length; });
</script>
</header>

<button onclick="alert('normallySorted is: ' + words);">기본 정렬 결과 보기</button>
<button onclick="alert('sortedByLength is: ' + copy);">단어 길이 순으로 정렬 결과 보기</button>

<script>
// 대소문자를 무시하고, 알파벳 순서로 정렬하려면?
// String.toUpperCase() 를 사용하자
var copy2 = ['you', 'apple', 'php', 'PHP', 'javascript', 'Calvin'];
copy2.sort(function(a, b) {
	if (a.toUpperCase() > b.toUpperCase()) {
		return 1;
	} else if (a.toUpperCase() < b.toUpperCase()) {
		return -1;
	} else {
		return 0;
	}
});

// 실제 사전에 단어가 나오는 순서대로 정렬해 보자
// 사전에서 'I' 는 'h'보다 늦게 나오고 'i' 보다 먼저 나와야 한다.
var copy3 = ['you', 'apple', 'php', 'PHP', 'javascript', 'Calvin'];
copy3.sort(function(a, b) {
	if (a.toUpperCase() > b.toUpperCase()) {
		if (a > b) {
			return 2;
		} else {
			return 1;
		}
	} else if (a.toUpperCase() < b.toUpperCase()) {
		if (a > b) {
			return -1;
		} else {
			return -2;
		}
	} else {
		return 0;
	}
});
</script>

<button onclick="alert('Sorted is: ' + copy2);">대소문자 무시하고 정렬하기</button>
<button onclick="alert('Sorted is: ' + copy3);">실제 사전에 나오는 순서대로 정렬하기</button>

<?php include $_SERVER['DOCUMENT_ROOT'].'/../section/footer.php'; ?>