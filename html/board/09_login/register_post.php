<?php
$local_url = '../../';
$web_title = 'PHP 연습장 - 게시판';
$nav_array = array();
$nav_array['Home'] = $local_url.'index.php';
$nav_array['Board'] = $local_url.'board/09_login/';
$css_array['board'] = 'style.css';
include $_SERVER['DOCUMENT_ROOT'].'/../section/header.php';
include 'function.php';
?>

<div class="fix main_content">


</div>
<?php mysqli_close($conn); ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/../section/footer.php'; ?>