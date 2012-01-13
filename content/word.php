<?php
$dan = $core->clean($_GET['dan']);
$word = $core->clean($_GET['w']);
$result = mysql_query("SELECT * FROM words WHERE word LIKE '" . $word . "'");

while($row = mysql_fetch_array($result))
{
	$i++;
	echo "<h1> " . $row['word'] . "</h1>";
	echo "<h3>Date: " . date('m/d/Y', $row['stamp']) . "</h3>";
	echo "<h3>Added: " . $row['count'] . " time(s)</h3>";
	echo "<h3>Rating: " . $core->rating($row['rating']) . "</h3><br style=\"clear:both\">";
	echo "<a class=\"user\" href=\"users?u=" . $row['user'] . "\">" . $row['user'] . "</a>";
	echo "<div id=\"report\">Is this a word?: <a class=\"good\" href=\"rating?a=good&id=" . $row['id'] . "&w=" . $row['word'] . "\">Yes</a> <a class=\"report\" href=\"rating?a=bad&id=" . $row['id'] . "&w=" . $row['word'] . "\">No</a></div>";
	$id = $row['id'];
	?>
	<br style="clear:both" />
	<br style="clear:both" />
	<div id="tts">
	Text to speech: <div id='container'></div>
	(Doesn't work with Chrome atm)
	</div>
	<script type='text/javascript'>
	 var cnt = document.getElementById('container');
	 var src = 'wmvplayer.xaml';
	 var cfg = {height:'20',width:'200',duration:'30',file:'http://translate.google.com/translate_tts?tl=en&q=<?php echo $row['word']; ?>',overstretch:'true',usefullscreen:'false'};
	 var ply = new jeroenwijering.Player(cnt,src,cfg);
	</script>
	<div id="share">
		<a name="fb_share" class="facebook-share-button"></a> 
		<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" 
				type="text/javascript">
		</script>
		<div id="twitter-share-button">
			<a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		</div>
	</div>
	<?
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