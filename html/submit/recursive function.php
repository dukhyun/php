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