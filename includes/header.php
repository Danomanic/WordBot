<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>WordBot - The Word Archive Engine</title>
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type='text/javascript' src='silverlight.js'></script>
<script type='text/javascript' src='wmvplayer.js'></script>
<script>

	$(function() {
	
		var start = 100;
		$('#words-more').click(function() {
			$.get('ajax.php?page=words&start=' + start, function(data) {
				
				$('#words').append(data).show('slow');
				start = start + 100;
			});
		});
		var letter = 'a';
		
		var astart = 100;
		$('#alpha-more').click(function() {

			$.get('ajax.php?page=alpha&astart=' + start + '&letter=' + letter, function(data) {
		
				$('#words').append(data).show('slow');
				astart = astart + 100;
			});
		});
		
		$('.alpha').click(function() {
			$('#words-more').hide();
			$('#alpha-more').css("display","block");
			letter = $(this).text();
			$.get('ajax.php?page=alpha&letter=' + letter, function(data) {
				astart = 0;
				$('#words').html(data).show('slow');

			});

		});
		
		$('#player').click(function() {
			var url = $('#word').text();
			$('#container').empty();
			$('#container').html('<iframe src="http://translate.google.com/translate_tts?tl=en&q=' + url + '" width="0" height="0"></iframe>');
		});
	});
	
</script>
</head>
<body>
<div id="logo"><?php if($params['site']['dev']) { echo "DEV - "; } ?> Word<strong>Bot</strong>
<div id="known">
	<?php 
		$result = mysql_query("SELECT * FROM words WHERE status = 1");
		$total_rows = mysql_num_rows($result);
		echo $total_rows . " words!" ;
	?>
	/ <a href="stats"><?php echo $core->percent($total_rows, 171476); ?>% Complete!</a>
</div>
</div>
<div id="wrap">
<div id="links"><a href="./">Home</a> <a href="words">Words</a> <a href="users">Users</a> <a href="stats">Statistics</a> <a href="search">Search</a> <a href="fun">Fun</a> <a href="test">Teach</a> <a href="about">About</a>
</div>
<div id="content">