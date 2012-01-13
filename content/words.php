<div id="alpha">
<?php
$alphas = range('a', 'z');
foreach($alphas as $alpha) {
	echo "<a class=\"alpha " . $alpha . "\" href=\"#\">" . $alpha . "</a>";
}
?>
</div>
<div id="words">
<?php
$result = mysql_query("SELECT * FROM words WHERE status = 1 AND rating >= -10 ORDER BY RAND() LIMIT 0,100");
while($row = mysql_fetch_array($result))
{
	echo "<a class=\"word " . $core->color($row['rating']) . "\" href=\"word?w=" . $row['word'] . "\">" . $row['word'] . "</a>";
}
?>
</div>
<br style="clear:both" />
<a id="words-more" class="more" href="#more">More</a>
<a id="alpha-more" class="more" href="#more">More</a>