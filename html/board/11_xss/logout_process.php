<?php // 회원 가입 처리
require_once 'function.php';

start_session();
try_to_logout();
destroy_session();

header('Location: index.php');
?>