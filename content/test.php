<?php
// Get the user input.
$id = $core->clean($_GET['id']);
$action = $core->clean($_GET['a']);

// If ID and Action is set, then update the database.
if(isset($id)) 
{
	if(0 == $action)
		mysql_query("UPDATE words SET rating = rating +1 WHERE id = $id");
		
	if(1 == $action)
		mysql_query("UPDATE words SET rating = rating -1 WHERE id = $id");
}

$rs = mysql_query("SELECT * FROM words WHERE status = 1 AND rating >= -1 AND rating <= 1 ORDER BY RAND() LIMIT 1");
if(!$rs){
    echo 'Fire! Fire!';
	exit;
}
$r = mysql_fetch_assoc($rs);

?>
	<a class="word" target="_blank" href="word?w=<?php echo $r['word'];?>"><?php echo $r['word'];?></a>
	<br style="clear:both" />
	<br style="clear:both" />
	
	<div id="test">
		Is <?php echo $r['word']; ?> a word? 
		<br style="clear:both" />
		<br style="clear:both" />
		<a class="good" href="test?a=0&id=<?php echo $r['id'];?>&w=<?php echo $r['word'];?>">Yes</a> 
		<a class="report" href="test?a=1&id=<?php echo $r['id'];?>&w=<?php echo $r['word'];?>">No </a>
	</div>
	
	<br style="clear:both" />
	
	<?php
	$string = $r['word'];
	include('modules/tts.php');
	?>

	<br style="clear:both" />
	<a target="_blank" href="http://www.google.co.uk/search?ix=hca&sourceid=chrome&ie=UTF-8&q=define%3A+<? echo $r['word']; ?>">Ask Google</a>
	<br style="clear:both" />
	<br style="clear:both" />