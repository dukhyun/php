<?php
$local_url = '../';
$nav_array = array();
$nav_array['Home'] = $local_url.'index.php';
include $_SERVER['DOCUMENT_ROOT'].'/../section/header.php';
?>


<?php include $_SERVER['DOCUMENT_ROOT'].'/../section/footer.php'; ?>



<?php // db_login
include $_SERVER['DOCUMENT_ROOT'].'/../section/db_login.php';
?>