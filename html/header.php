<!DOCTYPE HTML>
<meta charset="UTF-8">
<html>
<?php
if (!$local_url) {
	$local_url = '';
}
// $css_array['key'] = 'link';
// include $local_url.'header.php';
$css_array['main'] =  $local_url.'style.css';
$css_array['nav'] = $local_url.'from/nav.css';
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
$nav_php = 'from/navbar.php';
include $local_url.$nav_php;
?>