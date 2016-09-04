<?php
$local_url = '.';
$web_title = 'PHP 연습장';
$nav_array = array();
$nav_array['Home'] = $local_url.'';
include $_SERVER['DOCUMENT_ROOT'].'/../section/header.php';
?>

<div class="fix main_content">
	
	<div class="fix title">
		<h1>김덕현님의 PHP 연습장</h1>
	</div>
	
	<div class="fix box_content floatleft">
		<h2>게시판<span>Board</span></h2>
		<ul> <!-- 목록 //-->
			<li><a href="board/01_file/">파일</a></li>
			<li><a href="board/02_arr/">Array</a></li>
			<li><a href="board/03_css/">CSS</a></li>
			<li><a href="board/04_db/">DB</a></li>
			<li><a href="board/05_foreign/">Foreign Key</a></li>
			<li><a href="board/06_delete/">Delete</a></li>
			<li><a href="board/07_page/">Page</a></li>
			<li><a href="board/08_refactoring/">Refactoring</a></li>
			<li><a href="board/09_login/">Login</a></li>
			<li><a href="board/10_comment/">Comment</a></li>
			<li><a href="board/11_xss/">XSS(DB, HTML)</a></li>
			<li><a href="board/12_ajax/">AJAX</a></li>
		</ul>
	</div>
	
	<div class="fix box_content floatleft">
		<h2>사전<span>Dictionary</span></h2>
		<ul> <!-- 목록 //-->
			<li><a href="dictionary/search/">단어 찾기</a></li>
			<li><a href="dictionary/stringsum/">문자열 코드합</a></li>
			<li><a href="dictionary/sort/">문자열 정렬</a></li>
			<li><a href="dictionary/strpos/">단어에 포함된 문자 찾기(strpos)</a></li>
			<li><a href="dictionary/anagram/">애너그램</a></li>
			<li><a href="dictionary/palindrome/">회문</a></li>
			<li><a href="dictionary/02_db/">DB 입력</a></li>
			<li><a href="dictionary/02_db/where.php">DB 조건부 검색</a></li>
		</ul>
	</div>
	
	<div class="fix box_content floatleft">
		<h2>보안<span>Security</span></h2>
		<ul> <!-- 목록 //-->
			<li><a href="security/security_01_session/">1-session</a></li>
			<li><a href="security/security_02_hashing/">2-hashing</a></li>
			<li><a href="security/security_03_db/">3-db</a></li>
		</ul>
	</div>
	
	<div class="fix box_content floatleft">
		<h2>예제<span>Exercise</span></h2>
		<ul> <!-- 목록 //-->
			<li><a href="exercise/login/">로그인 폼</a></li>
			<li><a href="exercise/fget/string.php">파일 읽기</a></li>
			<li><a href="exercise/write/">파일쓰기&읽기</a></li>
			<li><a href="exercise/calc/">계산기</a></li>
			<li><a href="exercise/strcmp/">strcmp 연습</a></li>
			<li><a href="exercise/recursion/">재귀 함수 활용</a></li>
			<li><a href="exercise/reverse/">문자 역순 정렬</a></li>
			<li><a href="exercise/garde/">성적 입력</a></li>
			<li><a href="exercise/diff/">Diff</a></li>
			<li><a href="exercise/regex/php_regex.php">정규표현식(php)</a></li>
			<li><a href="exercise/regex/js_regex.php">정규표현식(js)</a></li>
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
			<li><a href="submit/class/">class</a></li>
			<li><a href="submit/val.php">타입 변환</a></li>
		</ul>
	</div>
	
	<!--
	<div class="fix box_content floatleft">
		<h2>연습<span>Test</span></h2>
		<ul>
			<li><a href="test/nav_test.php">네비바test</a></li>
			<li><a href="test/time.php">Time</a></li>
			<li><a href="test/server_url.php">server_url</a></li>
			<li><a href="test/a_link.php">a_link</a></li>
		</ul>
	</div>
	-->
	
	<div class="fix box_content floatleft">
		<h2>자바스크립트<span>Script</span></h2>
		<ul> <!-- 목록 //-->
			<li><a href="/script/script2.php">history</a></li>
			<li><a href="/script/script3.php">함수 변수지정</a></li>
			<li><a href="/script/script4.php">js style</a></li>
			<li><a href="/script/script5.php">onclick event</a></li>
			<li><a href="/script/script6.php">알림창</a></li>
			<li><a href="/script/script8.php">js global 변수</a></li>
			<li><a href="/script/script9.php">js array</a></li>
			<li><a href="/script/script10.php">버튼</a></li>
			<li><a href="/script/script11.php">array 반복문</a></li>
			<li><a href="/script/script12.php">split, join</a></li>
			<li><a href="/script/script13.php">sort()</a></li>
			<li><a href="/script/script14.php">js 함수</a></li>
			<li><a href="/script/script15.php">push()</a></li>
		</ul>
	</div>
	
	<div class="fix box_content floatleft">
		<h2>J쿼리<span>Jquery</span></h2>
		<ul> <!-- 목록 //-->
			<li><a href="/jquery/jquery_1.php">jquery_1</a></li>
			<li><a href="/jquery/jquery_2.php">jquery_2</a></li>
			<li><a href="/jquery/jquery_time.php">jquery_time</a></li>
			<li><a href="/jquery/jquery_autocomplete_1.php">jquery_autocomplete_1</a></li>
			<li><a href="/jquery/jquery_autocomplete_2.php">jquery_autocomplete_2</a></li>
			<li><a href="/jquery/js_dom.php">js_dom</a></li>
			<li><a href="/jquery/js_table.php">js_table</a></li>
			<li><a href="/jquery/js_timer.php">js_timer</a></li>
			<li><a href="/jquery/jquery_countdown.php">jquery_countdown</a></li>
		</ul>
	</div>
	
</div>

<?php include $_SERVER['DOCUMENT_ROOT'].'/../section/footer.php'; ?>