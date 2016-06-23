<?php
$local_url = '../';
$nav_array = array();
$nav_array['Home'] = $local_url.'index.php';
include $local_url.'header.php';
?>

<?php
	$data_per_day = 200;
	$data_change_per_day = -5;
	$days = 31;
	$data_total = 0;
	
	while ($days > 0) {
		$data_total += $data_per_day;
		$data_per_day += $data_change_per_day;
		$days -= 1;
	}
?>
첫날 데이터를 200MiB 사용하고, 이후 매일 5MiB씩 적게 사용하였다.
한달이 31일일 때, 한달 총 소비량은 <?php echo $data_total, 'MiB'; ?>이다.

<?php include $local_url.'footer.php'; ?>