<?php

$user = $core->clean($_GET['t']); // Get the twitter username!

$xml = $twitter->get($user,12); // Get the last 12 tweets!

foreach($xml->status as $status){ // For each status
	$words = explode(' ', $status->text ); // Turn the words into an array
	
	foreach($words as $word) {
		if(!preg_match("/(@|#|\?|http|[^a-zA-Z'])/", $word)) {
			$word = $core->clean(strtolower($word));
			
			$result = mysql_query("SELECT * FROM words WHERE word = '" . $word . "'"); // Check the database to see if the word is already there
			$num_rows = mysql_num_rows($result); 
	
			if(!$num_rows) { // If it isn't, add the word to the database!
					mysql_query("INSERT INTO words (word, user, stamp) VALUES ('" . $word . "', '" . $user . "','" . time() . "')");
					$learnt_words .= "<a class=\"word\" href=\"word?w=" . $core->filter($word) . "\">" . $core->clean($core->filter($word)) . "</a>"; 
					$learnt++;
			} else {
				mysql_query("UPDATE words SET count = count + 1 WHERE word = '" . $word . "'");
			}
		}
	}
}

if ($learnt) {
	echo "<p>I've learnt a total of " . $learnt . " new word(s) from your twitter!</p>";
	echo "<p>I learnt these words:</p>";
	echo "<p>" . $learnt_words . "</p>"; 
} else {
	echo "Sadly I didn't learn any new words from your twitter!";
}
?>