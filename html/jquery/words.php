<?php
function get_words($input) {
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
			$rank = $wordAndRank[1];
		} else { // error
			// die('count was'.count($wordAndRank).' Error occured!');
			$rank = $last_rank + 1;
		}
		$words[$word] = $rank;
	}
	fclose($file_handle);
	asort($words);
	//print_r($words);
	
	$selected = array();
	// $input = $_GET['input'];
	foreach ($words as $word => $rank) {
		if (strpos($word, $input) !== false) {
			$selected[] = $word;
		}
	}
	
	return $selected;
}

// echo implode(' ', array_slice(get_words($_GET['input']), 0, 10));
echo implode(' ', get_words($_GET['input']));
