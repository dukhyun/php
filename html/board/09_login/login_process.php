<?php // 회원 가입 처리
require_once 'function.php';

start_session();
 
if (isset($_POST['id'], $_POST['password'])) {
    $id = $_POST['id'];
    $password = $_POST['password']; 
	echo "login.php";
	
    if (try_to_login($id, $password) == true) {
        header('Location: protected.php');
    } else {
		// 이멜주소 또는 비번이 등록되지 않았거나 틀림
        header('Location: error.php?error_code=1');
    }
} else {
	header('Location: error.php?error_code=5');
}

?>