<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<body>
<?php
	$regex = '/<([^>]+)>([^<]+)<\/\1>/';
	$text = '<span>elem1</span><span>elem2</span>';
	echo '예제 원문: '.htmlspecialchars($text).'<br>';
	
	$matches = array();
	preg_match($regex, $text, $matches);
	echo '전체 매칭: '.htmlspecialchars($matches[0]).'<br>';
	echo '괄호 1: '.htmlspecialchars($matches[1]).'<br>';
	echo '괄호 2: '.htmlspecialchars($matches[2]).'<br><br>';
		
	// preg_match_all($regex, $text, $matches);
	// echo '첫놈 전체매칭: '.htmlspecialchars($matches[0][0]).'<br>';
	// echo '둘째놈 전체매칭: '.htmlspecialchars($matches[0][1]).'<br>';
	// echo '첫놈 괄호 1: '.htmlspecialchars($matches[1][0]).'<br>';
	// echo '둘째놈 괄호 2: '.htmlspecialchars($matches[1][1]).'<br>';		
	// echo '첫놈 괄호 1: '.htmlspecialchars($matches[2][0]).'<br>';
	// echo '둘째놈 괄호 2: '.htmlspecialchars($matches[2][1]).'<br><br>';
	
	echo htmlspecialchars('치환 결과: '.preg_replace($regex, '<\1 color="red">\2</\1>', $text));
	echo '<br><br>';
	
	// 전화번호
	$regex = '/[-:]+/';
	$text = '01 0  - 6 605: 19 17';
	$result = implode('-', preg_split($regex, $text));
	echo '원래 값: '.$text.'<br>';
	echo 'split 하고 implode 한 결과: '.$result.'<br>';
	echo '최종 replace 결과: '.preg_replace('/\s+/', '', $result);
	echo '<br><br>';
	
	echo '1. 숫자만 출력<br>';
	// $regex = '/\D/';
	$text = 'bbc-77d:666';
	echo '원문: '.$text.'<br>';
	echo '결과: '.preg_replace('[\D]', '', $text);
	echo '<br><br>';
	
	echo '2. 숫자에 괄호넣기<br>';
	$text = 'a1234';
	echo '원문: '.$text.'<br>';
	echo '결과: '.preg_replace('/(\d)/', '<\1>', $text);
	echo '<br><br>';
	
	echo '3. 영어 대소문자. 내부에 여백<br>';
	$text = 'I am a boy. She is a boy.';
	// $replacement = '';
	echo '원문: '.$text.'<br>';
	$regex = '/\b([^\.]+)(\.)/';
	echo '3-1 결과: '.htmlspecialchars(preg_replace($regex, '<$1$2>', $text));
	echo '<br>';
	$regex = '/([\w]+\b)+/';
	echo '3-2 결과: '.htmlspecialchars(preg_replace($regex, '[$1]', $text));
	// echo '<br>';
	// $result = preg_replace($regex, '[$1]', $text);
	// $regex = '/([^\.]+)(\.)/';
	// echo '3-3 결과: '.htmlspecialchars(preg_replace($regex, '<$1$2>', $result));
	echo '<br><br>';
	
	$text = '<p  class = "my_class"   id = "a2" >4번    예제</p>';
	echo '원래 값: '.htmlspecialchars($text).'<br>';
	$regex = '/\s+\s/';
	$result = implode(' ', preg_split($regex, $text));
	$regex = '/\s(\S)\s/';
	$result = preg_replace($regex, '$1', $result);
	echo '공백제거1: '.htmlspecialchars($result).'<br>';
	$regex = '/\s>/';
	$result = implode('>', preg_split($regex, $result));
	echo '공백제거2: '.htmlspecialchars($result).'<br>';
	echo '결과: '.htmlspecialchars($result);
	echo '<br><br>';
	// echo "<script>alert('".$result."');</script>";
	
	// 정규표현식
	// class = "aaa bbb"
	// (?<=[^b])
	// [a-z-]+\s*=\s*["][^"\\]*["]
	// "[^"]*", [^"\\]
	// (?=\s*[a-z>])
	// (?<=[^b])[a-z-]+\s*=\s*["][^"\\]*["](?=\s*[a-z>])
?>
</body>
</html>