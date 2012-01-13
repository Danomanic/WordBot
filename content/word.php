<?php
$dan = $core->clean($_GET['dan']);
$word = $core->clean($_GET['w']);
$result = mysql_query("SELECT * FROM words WHERE word LIKE '" . $word . "'");

while($row = mysql_fetch_array($result))
{
	$i++;
	echo "<h1 class=\"mword\"> " . $row['word'] . "</h1>";
	echo "<div id=\"report\">Is this a word?: <a class=\"good\" href=\"rating?a=good&id=" . $row['id'] . "&w=" . $row['word'] . "\">Yes</a> <a class=\"report\" href=\"rating?a=bad&id=" . $row['id'] . "&w=" . $row['word'] . "\">No</a></div>";
	echo "<h3>Date: " . date('m/d/Y', $row['stamp']) . "</h3>";
	echo "<h3>Added: " . $row['count'] . " time(s)</h3>";
	echo "<h3>Rating: " . $core->rating($row['rating']) . "</h3><br style=\"clear:both\">";
	$string =  $row['word'];
	include('modules/tts.php');
	echo "<a class=\"user\" href=\"users?u=" . $row['user'] . "\">" . $row['user'] . "</a>";
	$id = $row['id'];
}

echo "<br style=\"clear:both\" /><h2>Similar words</h2>";
$result = mysql_query("SELECT * FROM words WHERE status = 1 AND word LIKE '%" . $word . "%' ORDER BY rating DESC LIMIT 9");

while($row = mysql_fetch_array($result))
{
	echo "<a class=\"word " . $core->color($row['rating']) . "\" href=\"word?w=" . $row['word'] . "\">" . $row['word'] . "</a>";
}

if($dan == "drop") {
	mysql_query("UPDATE words SET status = 0 WHERE id = " . $id . "");
	echo "Disabled this word";
}
if(!$i){
	echo "<strong>Robot Error:</strong> Finding the word failed! I will fix this issue as soon as possible!";
}
?>