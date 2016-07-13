<?php
$local_url = '../';
$web_title = 'PHP 연습장';
$nav_array = array();
$nav_array[Home] = $local_url.'';
include $_SERVER['DOCUMENT_ROOT'].'/../section/header.php';
?>

<header>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
function buttonClicked() {	 
	$.ajax({ 
		url: 'jquery_time.php',
		async: false,
		success: function(result) {
			document.getElementById('result').innerHTML = result;
		},
		error: function(xhr) {
			alert('Error');
		},
		timeout : 3000
	});	
}
</script>
</header>
<body>
<span id="result">결과값은 여기에 나타남</span><br>
<button onclick="buttonClicked();">AJAX로 서버에서 현재시각 가져오기</button>

<?php include $_SERVER['DOCUMENT_ROOT'].'/../section/footer.php'; ?>