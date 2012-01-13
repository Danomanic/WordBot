<?php
	class Twitter {

		/* 
		 * Constructor - connects to database.
		 * @global $params - core parameters from glob.php
		 */
		public function __construct() {

			global $params;

		}
		
		public function get($userid, $count){
			$url = "http://twitter.com/statuses/user_timeline/{$userid}.xml?count={$count}";
			$xml = simplexml_load_file($url) or die("<p>Error: Twitter Username does not exist or has private tweets enabled!</p>");

			return $xml;
		}

		 
		private function limit($user,$summary) {
			$limit = 80;
			if (strlen($summary) > $limit) {
				$summary = substr($summary, 0, strrpos(substr($summary, 0, $limit), ' ')) . '... <a href="http://twitter.com/zfast" target="_blank">[more]</a>';
			} else {
				$summary = $summary . "... <a href=\"http://twitter.com/{$user}\" target=\"_blank\">[more]</a>";
			}
			return $summary;
		}


	}

	$twitter = new Twitter();
?>