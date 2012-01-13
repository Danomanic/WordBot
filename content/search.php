<?php
$search = $core->clean($_GET['s']);
echo "<form action=\"search\" method=\"get\">
	Search:
	<input type=\"text\" name=\"s\" id=\"s\">
	<input type=\"submit\" class=\"button\" value=\"Search\">
	</form><br>";

if($search) {
	$result = mysql_query("SELECT * FROM words WHERE status = 1 AND word LIKE '%" . $search . "%'");
	while($row = mysql_fetch_array($result))
	{
		echo "<a class=\"word " . $core->color($row['rating']) . "\" href=\"word?w=" . $row['word'] . "\">" . $row['word'] . "</a>";
	}
} 
?>