<!DOCTYPE html>
<html>
<?php
// $css_array['key'] = 'link';
$css_array['main'] =  '/css/main.css';
$css_array['nav'] = '/css/nav.css';
?>

<head>
<meta charset="UTF-8">
<meta name="theme-color" content="#000000">
<?php // title
if (isset($web_title)) {
	echo '<title>'.$web_title.'</title>';
}
?>
<?php // css
foreach ($css_array as $key => $link) {
	printf('<link rel="stylesheet" type="text/css" href="%s">', $link);
}
?>
</head>

<body>
<?php // navbar
if (isset($local_url)) {
	include $local_url.'/../section/navbar.php';
} else {
	include $_SERVER['DOCUMENT_ROOT'].'/../section/navbar.php';
}
?>