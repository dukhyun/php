<?php
$local_url = '../';
$nav_array = array();
$nav_array['Home'] = $local_url.'index.php';
include $local_url.'header.php';
?>

<?php
// 재귀함수 recursive function
function get_sum($n) {
    if ($n == 1) {
        return 1;
    } else {
        return $n + get_sum($n-1);
    }
}

echo get_sum(5);
?>

<?php include $local_url.'footer.php'; ?>