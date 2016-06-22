<?php
// $local_url = '';
// $css_array['key'] = 'file';
// include $local_url.'header.php';
if (!$local_url) {
    $local_url = '';
}
$nav_php = 'from/navybar.php';
$css_array['main'] = 'style.css';
$css_array['nav'] = 'from/nav.css';
?>
<!DOCTYPE HTML>
<html>

<head>
<?php // title
if ($web_title != '') {
	echo '</title>'.$web_title.'</title>';
}
?>
<meta charset="UTF-8">
<?php // css
foreach ($css_array as $key => $file) {
	echo '<link rel="stylesheet" type="text/css" href="'$local_url.$file.'">';
}
?>
</head>
<body>
<?php // navbar
include $local_url.$nav_php;
?>