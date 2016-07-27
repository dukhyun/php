<?php
function get_words($input, $slice) {
	$words = array();
	$file_name = './100k_combined.txt';
	$file_handle = fopen($file_name, 'r');
	if (!$file_handle) {
		die('file could not be opened!');
	}
	$last_rank = 5000;
	while (($line = fgets($file_handle)) !== false ) {
		$wordAndRank = explode("\t", $line);
		$word = $wordAndRank[0];
		if (count($wordAndRank) === 2) {
			$rank = intval($wordAndRank[1]);
		} else { // error
			// die('count was'.count($wordAndRank).' Error occured!');
			$rank = $last_rank;
		}
		$words[$word] = $rank;
	}
	// asort($words);
	
	$selected = array();
	$count = 0;
	// $input = $_GET['input'];
	foreach ($words as $word => $rank) {
		if (strpos($word, $input) !== false) {
			$selected[] = $word;
			$count = $count + 1;
			if ($count == $slice) {
				break;
			}
		}
	}
	asort($selected);
	
	fclose($file_handle);
	return $selected;
}

function get_words_db($input, $num) {
	include_once '../../section/db_login.php';
	$conn = mysqli_connect($hostname, $username, $password, $dbname);
	mysqli_query($conn, "SET NAMES 'utf8'");
	if (!$conn) {
		die('Mysql connection failed: '.mysqli_connect_error());
	}
	
	$words = array();
	$last_rank = 5000;
	
	// $query = sprintf("SELECT * FROM calvin.dictionary2 WHERE word LIKE '%%%s%%' ORDER BY (CASE WHEN rank IS NOT NULL THEN rank ELSE %d END) LIMIT %d;", $input, $last_rank, $num);
	// $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	
	$query = sprintf("CREATE OR REPLACE VIEW dukhyun.temp AS (SELECT * FROM calvin.dictionary2 WHERE word LIKE '%%%s%%' ORDER BY (CASE WHEN rank IS NOT NULL THEN rank ELSE %s END) LIMIT %d);", $input, $last_rank, $num);
	// CREATE TEMPORARY TABLE : db table create
	// CREATE TABLE IF NOT EXISTS
	$query .= sprintf("SELECT * FROM dukhyun.temp ORDER BY word;");
	mysqli_multi_query($conn, $query) or die(mysqli_error($conn));
	mysqli_next_result($conn);
	$result = mysqli_store_result($conn);
	while ($row = mysqli_fetch_assoc($result)) {
		$words[] = $row['word'];
	}
	
	return json_encode($words);
}

// echo implode(' ', get_words($_GET['input'], 10));
echo get_words_db($_GET['input'], 20);