<?php
echo "<h1>Random Fun</h1>";
echo "<p>Here is a random sentence, made up with words from my database!</p>";
$result = mysql_query("SELECT * FROM words WHERE status = 1 AND rating >= 1 ORDER BY RAND() LIMIT 5");
while($row = mysql_fetch_array($result))
{
	echo "&nbsp <a class=\"word\" href=\"word?w=" . $row['word'] . "\">" . $row['word'] . "</a>";
	$string .=  $row['word'] . " ";
}
include('modules/tts.php');
?>