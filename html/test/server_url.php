<?php
$local_url = '../';
$nav_array = array();
$nav_array['Home'] = $local_url.'/index.php';
include $local_url.'/header.php';
?>

<?php
echo 'DOCUMENT_ROOT : '.$_SERVER['DOCUMENT_ROOT'].'<br>';
echo 'HTTP_HOST : '.$_SERVER['HTTP_HOST'].'<br>';
echo 'PHP_SELF : '.$_SERVER['PHP_SELF'].'<br>';
echo dirname($_SERVER['DOCUMENT_ROOT']."/nothing");
?>

<?php include $local_url.'/../section/footer.php'; ?>