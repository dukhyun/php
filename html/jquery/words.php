<?php
function get_words() {
	$words = array();
	$file_name = './5k_ansi.txt';
	$file_handle = fopen($file_name, 'r');
	if (!$file_handle) {
		die('file could not be opened!');
	}
	while (($line = fgets($file_handle)) !== false) {
		$wordAndRank = explode("\t", $line);
		if (count($wordAndRank) === 2) {
			$word = $wordAndRank[0];
			$rank = $wordAndRank[1];
			$words[$word] = $rank;
		} else { // error
			die('count was'.count($wordAndRank).' Error occured!');
		}
	}
	fclose($file_handle);
	asort($words);
	//print_r($words);
	
	$selected = array();
	$input = $_GET['input'];
	foreach ($words as $word => $rank) {
		if (strpos($word, $input) !== false) {
			$selected[] = $word;
		}
	}
	
	return $selected;
}

echo implode(' ', array_slice(get_words(), 0, 10));
// echo implode(' ', get_words());
