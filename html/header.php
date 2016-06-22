<!DOCTYPE HTML>
<meta charset="UTF-8">
<html>
<?php
// $local_url = '';
// $css_array['key'] = 'link';
// include $local_url.'header.php';
$css_array['main'] =  $_SERVER['DOCUMENT_ROOT'].'/style.css';
$css_array['nav'] = $_SERVER['DOCUMENT_ROOT'].'/from/nav.css';
?>

<head>
<?php // title
if (!$web_title) {
	echo '</title>'.$web_title.'</title>';
}
?>
<?php // css
foreach ($css_array as $key => $link) {
	echo '<link rel="stylesheet" type="text/css" href="'.$link.'">';
}
?>
</head>

<body>
<?php // navbar
$nav_php = '/from/navbar.php';
include $_SERVER['DOCUMENT_ROOT'].$nav_php;
// echo $_SERVER['DOCUMENT_ROOT'];
?>