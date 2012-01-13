<h1>Statistics</h1>
<br style="clear:both" />
<h2>Most seen!</h2>
<p> I currently have <?php echo $total_rows; ?> words in my database! That means I have completed <?php echo $core->percent($total_rows, 171476); ?>% of the Oxford Dictionary, which has over 171,476 words!
<br style="clear:both" />
<br style="clear:both" />
<h2>Most seen!</h2>
<?php
$result = mysql_query("SELECT * FROM words WHERE status = 1 AND rating >= -10 ORDER BY count DESC LIMIT 0,10");
while($row = mysql_fetch_array($result))
{
	echo "<a class=\"word\" href=\"word?w=" . $row['word'] . "\">" . $row['word'] . "</a>";
}
?>
<br style="clear:both" />
<br style="clear:both" />
<h2>Dictionary Completion</h2>
<?php
$result = mysql_query("SELECT * FROM words WHERE status = 1 AND rating >= -10 ORDER BY rating DESC LIMIT 0,10");
while($row = mysql_fetch_array($result))
{
	echo "<a class=\"word\" href=\"word?w=" . $row['word'] . "\">" . $row['word'] . "</a>";
}
?>
<br style="clear:both" />
<br style="clear:both" />
<h2>Lowest rated</h2>
<?php
$result = mysql_query("SELECT * FROM words WHERE status = 1 ORDER BY rating ASC LIMIT 0,10");
while($row = mysql_fetch_array($result))
{
	echo "<a class=\"word\" href=\"word?w=" . $row['word'] . "\">" . $row['word'] . "</a>";
}
?>
<br style="clear:both" />
<br style="clear:both" />
<h2>Recently added</h2>
<?php
$result = mysql_query("SELECT * FROM words WHERE status = 1 AND rating >= -10 ORDER BY id DESC LIMIT 0,10");
while($row = mysql_fetch_array($result))
{
	echo "<a class=\"word\" href=\"word?w=" . $row['word'] . "\">" . $row['word'] . "</a>";
}
?>

<br style="clear:both" />
<br style="clear:both" />
<h2>Newest Users</h2>
<?php
$result = mysql_query("SELECT DISTINCT user FROM words WHERE status = 1 AND rating >= -10 ORDER BY id DESC LIMIT 0,10");
while($row = mysql_fetch_array($result))
{
	echo "<a class=\"user\" href=\"users?u=" . $row['user'] . "\">" . $row['user'] . "</a>";
}
?>