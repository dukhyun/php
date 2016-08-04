<?php // 회원 가입 처리
require_once 'function.php';

start_session();
try_to_logout();
destroy_session();

if (isset($_SERVER["HTTP_REFERER"])) {
	header('Location: '.$_SERVER["HTTP_REFERER"]);
} else {
	header('Location: index.php');
}