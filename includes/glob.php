<?php

error_reporting(0);

$params['db']['hostname']  = "localhost";
$params['db']['username']  = "wordboto_words";
$params['db']['password']  = ")~{7u._ERM&x";
$params['db']['database']  = "wordboto_words";
$params['site']['status']  = false;

session_start();
putenv( "TZ=Europe/London" );

require_once( "./classes/db.inc.php" );
require_once( "./classes/core.inc.php" );
require_once( "./classes/twitter.inc.php" );

?>