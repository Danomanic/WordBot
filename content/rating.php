<?php
$action = $core->clean($_GET['a']);
$id = $core->clean($_GET['id']);
$word = $twitter->filter($_GET['w']);

if($action == "good") { 
	mysql_query("UPDATE words SET rating = rating + 1 WHERE id = " . $id . "");
	echo "<div id=\"loading-image\"><p>Rating the word!</p><img src=\"loading.gif\" alt=\"Loading...\" /></div>";
	echo $core->redirect("word?w=" . $word, 1);
} elseif($action == "bad") {
	mysql_query("UPDATE words SET rating = rating - 1 WHERE id = " . $id . "");
	echo "<div id=\"loading-image\"><p>Rating the word!</p><img src=\"loading.gif\" alt=\"Loading...\" /></div>";
	echo $core->redirect("word?w=" . $word, 1);
} else {
	echo "Oh no! Robot found an error!";
}
?>