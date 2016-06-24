<!DOCTYPE HTML>
<meta charset="UTF-8">
<html>
<?php
// $css_array['key'] = 'link';
$css_array['main'] =  '/css/main.css';
$css_array['nav'] = '/css/nav.css';
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
include $nav_php;
?>