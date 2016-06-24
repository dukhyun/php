<?php
$local_url = '../';
$nav_array = array();
$nav_array['Home'] = $local_url.'index.php';
include $local_url.'header.php';
?>

<style>
a:link { color:black; }
a:visited { color:green; }
a:hover { color: blue; }
a:active { color: red; }
</style>

<div class="fix main_content">
	<h1><?php echo '<a> link tag Test page'; ?></h1>
	<a href="/">link'/'</a>
</div>

<?php include $local_url.'footer.php'; ?>