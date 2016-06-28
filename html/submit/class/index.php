<?php
$local_url = '../../';
$nav_array = array();
$nav_array['Home'] = $local_url.'index.php';
include $_SERVER['DOCUMENT_ROOT'].'/../section/header.php';
?>

<?php
	class Car { // 
		public $modelName = '뉴소나타';
		public $modelNumber = 'abc123';
		public $maker = '현대';
		public $releaseDate = 2016;
		public $type = '중형';
		public $price = 2000;
	}	
	
	$model_name = '난 전역변수'; // 네이밍 컨벤션을 주의깊게 보자
	$car = new Car();
	echo '전역변수: '.$model_name.'<br>';
	echo '멤버변수: '.$car->modelName.'<br>';
?>

<?php include $_SERVER['DOCUMENT_ROOT'].'/../section/footer.php'; ?>