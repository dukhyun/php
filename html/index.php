<?php
$local_url = '';
$web_title = 'PHP 연습장';
$nav_array = array();
$nav_array[Home] = $local_url.'index.php';
include $local_url.'header.php';
?>

<div class="fix main_content">
	
	<div class="fix title">
		<h1>김덕현님의 PHP 연습장</h1>
	</div>

	<div class="fix box_content floatleft">
		<h2>게시판<span>Board</span></h2>
		<ul> <!-- 목록 //-->
			<li><a href="board/01_file/index.php">파일</a></li>
			<li><a href="board/02_arr/index.php">Array</a></li>
			<li><a href="board/03_css/index.php">CSS</a></li>
			<li><a href="board/04_db/index.php">DB</a></li>
			<li><a href="board/05_foreign/index.php">Foreign Key</a></li>
		</ul>
	</div>
	
	<div class="fix box_content floatleft">
		<h2>사전<span>Dictionary</span></h2>
		<ul> <!-- 목록 //-->
			<li><a href="dictionary/search/index.php">단어 찾기</a></li>
			<li><a href="dictionary/stringsum/index.php">문자열 코드합</a></li>
			<li><a href="dictionary/sort/index.php">문자열 정렬</a></li>
			<li><a href="dictionary/strpos/index.php">단어에 포함된 문자 찾기(strpos)</a></li>
			<li><a href="dictionary/anagram/index.php">애너그램</a></li>
			<li><a href="dictionary/palindrome/index.php">회문</a></li>
			<li><a href="dictionary/02_db/index.php">DB 입력</a></li>
			<li><a href="dictionary/02_db/where.php">DB 조건부 검색</a></li>
		</ul>
	</div>
	
	<div class="fix box_content floatleft">
		<h2>보안<span>Security</span></h2>
		<ul> <!-- 목록 //-->
			<li><a href="security/security_01_session">1-session</a></li>
			<li><a href="security/security_02_hashing">2-hashing</a></li>
		</ul>
	</div>
	
	<div class="fix box_content floatleft">
		<h2>예제<span>Exercise</span></h2>
		<ul> <!-- 목록 //-->
			<li><a href="exercise/login/index.php">로그인 폼</a></li>
			<li><a href="exercise/fget/string.php">파일 읽기</a></li>
			<li><a href="exercise/write/index.php">파일쓰기&읽기</a></li>
			<li><a href="exercise/calc/index.php">계산기</a></li>
			<li><a href="exercise/strcmp/index.php">strcmp 연습</a></li>
			<li><a href="exercise/recursion/index.php">재귀 함수 활용</a></li>
			<li><a href="exercise/reverse/index.php">문자 역순 정렬</a></li>
		</ul>
	</div>
	
	<div class="fix box_content floatleft">
		<h2>과제<span>Submit</span></h2>
		<ul> <!-- 목록 //-->
			<li><a href="submit/test_01.php">echo</a></li>
			<li><a href="submit/test_02.php">array</a></li>
			<li><a href="submit/test_03.php">while문</a></li>
			<li><a href="submit/test_04.php">for문</a></li>
			<li><a href="submit/test_05.php">print_r, sort</a></li>
			<li><a href="submit/test_06.php">function</a></li>
			<li><a href="submit/test_07.php">function2</a></li>
			<li><a href="submit/test_08.php">token</a></li>
			<li><a href="submit/algorithm_01.php">array_merge</a></li>
			<li><a href="submit/recursive function.php">recursive</a></li>
			<li><a href="submit/reverse.php">reverse</a></li>
		</ul>
	</div>
	
	<div class="fix box_content floatleft">
		<h2>연습<span>Test</span></h2>
		<ul> <!-- 목록 //-->
			<li><a href="test/time.php">Time</a></li>
			<li><a href="test/server_url.php">server_url</a></li>
		</ul>
	</div>
	
	<div class="fix box_content floatleft">
		<h2>폼<span>From</span></h2>
		<ul> <!-- 목록 //-->
			<li><a href="from/navbar.php">네비바</a></li>
			<li><a href="from/nav_test.php">네비바test</a></li>
		</ul>
	</div>
	
</div>

<?php include $local_url.'footer.php'; ?>