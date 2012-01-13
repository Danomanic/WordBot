<?php
echo "<h1>Random Fun</h1>";
echo "<p>Here is a random sentence, made up with words from my database!</p>";
$result = mysql_query("SELECT * FROM words WHERE status = 1 AND rating >= 1 ORDER BY RAND() LIMIT 5");
while($row = mysql_fetch_array($result))
{
	echo "&nbsp <a class=\"word\" href=\"word?w=" . $row['word'] . "\">" . $row['word'] . "</a>";
	$string .=  $row['word'] . " ";
}
?>
<br style="clear:both" />
<br style="clear:both" />
<div id="tts">
Text to speech: 
<div id='container'></div>
	 
<script type='text/javascript'>
 var cnt = document.getElementById('container');
 var src = 'wmvplayer.xaml';
 var cfg = {height:'20',width:'200',duration:'30',file:'http://translate.google.com/translate_tts?tl=en&q=<?php echo $string; ?>',overstretch:'true',usefullscreen:'false'};
 var ply = new jeroenwijering.Player(cnt,src,cfg);
</script>
(Doesn't work with Chrome atm)
</div>