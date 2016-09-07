<?php
function db_connect() {
	include_once $_SERVER['DOCUMENT_ROOT'].'/../section/db_login.php';
	
	$conn = mysqli_connect($hostname, $username, $password, $dbname);
	mysqli_query($conn, "SET NAMES 'utf8'");
	if (!$conn) {
		die('Mysql connection failed: '.mysqli_connect_error());
	}
	
	return $conn;
}

function get_member_id($conn, $member) {
	$query = sprintf("SELECT id FROM member WHERE name = '%s'", $member);
	$result = mysqli_query($conn, $query);
	if ($result === false) {
		die ("Database access failed: ".mysqli_error());
	}
	$row = mysqli_fetch_assoc($result);
	return $row['id'];
}

function get_member_name($conn, $member_id) {
	$query = sprintf("SELECT name FROM member WHERE id = %d", $member_id);
	$result = mysqli_query($conn, $query);
	if ($result === false) {
		die ("Database access failed: ".mysqli_error());
	}
	$row = mysqli_fetch_assoc($result);
	return $row['name'];
}

function get_board_id($conn, $title) {
	$query = sprintf("SELECT id FROM board WHERE title = '%s';", $title);
	$result = mysqli_query($conn, $query);
	if (!$result) {
		echo $query.'<br>';
		die ("Database access failed: ".mysqli_error());
	} else {
		$row = mysqli_fetch_assoc($result);
		return $row['id'];
	}
}

function get_board_title($conn, $id) {
	$query = sprintf("SELECT title FROM board WHERE id = %d;", $id);
	$result = mysqli_query($conn, $query);
	if (!$result) {
		echo $query.'<br>';
		die ("Database access failed: ".mysqli_error());
	} else {
		$row = mysqli_fetch_assoc($result);
		return $row['title'];
	}
}

function get_post_member_id($conn, $post_id) {
	$query = sprintf("SELECT member_id FROM post WHERE id = %d;", $post_id);
	$result = mysqli_query($conn, $query);
	if (!$result) {
		echo $query.'<br>';
		die ("Database access failed: ".mysqli_error());
	} else {
		$row = mysqli_fetch_assoc($result);
		return $row['member_id'];
	}
}

function time_set($date) {
	$timezone = 'GMT+0';
	$date = strtotime($date.' '.$timezone);
	$date = date('m-d H:i', $date);
	return $date;
}

// 쿠키 생성
function start_session() {
	$secure = false;
	$httponly = true;
	
	if (ini_set('session.use_only_cookies', 1) === false) {
		header("Location: error.php?error_code=2");
		exit();
	}
	
    $params = session_get_cookie_params();
    session_set_cookie_params($params["lifetime"],
        $params["path"], 
        $params["domain"], 
        $secure,
        $httponly);
 
    session_start();
    session_regenerate_id();
}

// 쿠키 삭제
function destroy_session() {
	$_SESSION = array();
	$params = session_get_cookie_params();
	
	setcookie(session_name(), '', 0, 
		$params['path'], $params['domain'], $params['secure'], isset($params['httponly'])); 
	session_destroy();
}

function try_to_login($id, $password) {
	if (check_user_account($id, $password)) {
		$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
		$_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
		$_SESSION['id'] = $id;
		$_SESSION['password'] = $password;
		$_SESSION['login_status'] = true;
		return true;
	} else {
		return false;
	}
}

function try_to_logout() {
	if (check_login()) {
		$_SESSION['login_status'] = false;
	} else {
	}
}

function check_login() {
	return isset($_SESSION['ip'], $_SESSION['user_agent'], $_SESSION['login_status']) && 
		$_SESSION['ip'] == $_SERVER['REMOTE_ADDR'] && 
		$_SESSION['user_agent'] == $_SERVER['HTTP_USER_AGENT'] &&
		$_SESSION['login_status'];
}

function check_user_account($id, $password) {
	$conn = db_connect();
	// statement : 명제
	$stmt = mysqli_prepare($conn, "SELECT pw_hash FROM member WHERE name = ?");
	mysqli_stmt_bind_param($stmt, "s", $id);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	if (mysqli_num_rows($result) === 0) {
		header('Location: error.php?error_code=1');
	} else {
		$row = mysqli_fetch_assoc($result);
		$hash = $row["pw_hash"];
		return password_verify($password, $hash);
	}
	mysqli_free_result($result);
	mysqli_close($conn);
}
?>