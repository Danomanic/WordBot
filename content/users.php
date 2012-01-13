<?php
$user = $core->clean($_GET['u']);
if($user){
	echo "<h1>" . $user . "</h1>";
	echo "<p>Twitter: <a href=\"http://twitter.com/" . $user . "\" target=\"_blank\">" . $user . "</a></p>";
	echo "<p>Thanks you " . $user . ", who has added these words!</p>";
	$result = mysql_query("SELECT * FROM words WHERE status = 1 AND rating >= -10 AND user = '" . $user . "' ORDER BY word");
	while($row = mysql_fetch_array($result))
	{
		echo "<a class=\"word\" href=\"word?w=" . $row['word'] . "\">" . $row['word'] . "</a>";
	}
} else {
	echo "<h1>Users</h1>";
	echo "<p>Thank you to everyone who has added words! WORD!</p>";
	$result = mysql_query("SELECT DISTINCT user FROM words ORDER BY user");
	while($row = mysql_fetch_array($result))
	{
		#echo $row['user'] . "<br>";
		echo "<a class=\"user\" href=\"users?u=" . $row['user'] . "\">" . $row['user'] . "</a>";
		$i++;
	}
	echo "<br style=\"clear:both\" /><p style=\"text-align:center;\">A total of $i users have added words to my Database!</p>";
}
?>