<?php
$start = $core->clean($_GET['start']);
$finish = $start + 100;

$result = mysql_query("SELECT * FROM words WHERE status = 1 AND rating >= -10 ORDER BY id LIMIT " . $start . "," . $finish . "");
while($row = mysql_fetch_array($result))
{
	echo "<a class=\"word " . $core->color($row['rating']) . "\" href=\"word?w=" . $row['word'] . "\">" . $row['word'] . "</a>";
}
?>