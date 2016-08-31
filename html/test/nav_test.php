<?php
if (!isset($local_url)) {
	$local_url = $_SERVER['DOCUMENT_ROOT'];
}
?>

<link rel="stylesheet" type="text/css" href="<?php echo $local_url; ?>style.css">
<link rel="stylesheet" type="text/css" href="<?php echo $local_url; ?>from/navy_style.css">

<ul class="navy">
	<li>
		<a class="vertical" title="Go to homepage" href="<?php echo $local_url; ?>">Home</a>
	</li>
</ul>