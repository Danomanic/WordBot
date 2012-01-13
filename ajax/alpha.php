<?php
$letter = $core->clean($_GET['letter']);
$start = $core->clean($_GET['astart']);

if(!$start) {
	$start = 0;
}

$finish = $start + 100;

$result = mysql_query("SELECT * FROM words WHERE status = 1 AND rating >= -10 AND word LIKE '" . $letter . "%' ORDER BY word LIMIT " . $start . "," . $finish . "");
while($row = mysql_fetch_array($result))
{
	echo "<a class=\"word " . $core->color($row['rating']) . "\" href=\"word?w=" . $row['word'] . "\">" . $row['word'] . "</a>";
}
?>