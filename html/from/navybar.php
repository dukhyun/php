<link rel="stylesheet" type="text/css" href="<?php echo $local_url; ?>style.css">
<link rel="stylesheet" type="text/css" href="<?php echo $local_url; ?>from/navy_style.css">

<div class="navy">
<?php
	foreach ($navy as $name => $link) {
		echo '<a class="vertical" title="Go to homepage"'
		.' href="'.$link.'">'.$name.'</a>';
	}
?>
</div>