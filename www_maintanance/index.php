<!DOCTYPE html>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>kebaparis.ch</title>
		<style type="text/css">
		
			body {
				font-family:Verdana;
				background-color:#BD0000;
				font-size:50px;
				padding-top:150px;
				padding-left:200px;
				letter-spacing:1px;
				color:white;
			}
			
			
			a:link, a:visited, a:link {
				color:white;
				text-decoration:underline;			
			}
			
			#caption {
     			font-size:35px;
			
			}
			
			#latesttweet {
     			font-size:25px;
			
			
			}
			
			
		</style>
	</head>
	<body>
		
			<p>coming soon <a href="mailto:info@kebaparis.ch">...</a></p>
			<p id="caption">or later</p>
			
			<p id="latesttweet"> latest tweet: 
			<?php
				function text2links($str) 
				{
						if($str=='' or !preg_match('/(http|www\.|@)/i', $str)) 
							{
								return $str; 
							}
						$lines = explode("\n", $str); $new_text = '';

						while (list($k,$l) = each($lines)) { 
							// replace links:
							$l = preg_replace("/http:\/\/([^ )\r\n!]+)/i", 
								"<a href=\"http://\\1\">\\1</a>", $l);
							$l = preg_replace("/https:\/\/([^ )\r\n!]+)/i", 
								"<a href=\"https://\\1\">\\1</a>", $l);
							$l = preg_replace(
								"/@([a-z0-9A-Z_]{1,15})/", 
								"<a href=\"http://twitter.com/\\1\">@\\1</a>", $l);
							$new_text .= $l."\n";
						}
						return $new_text;
				}


				$username='kebaparisch'; // set user name
				$format='json'; // set format
				$tweet=json_decode(file_get_contents("http://api.twitter.com/1/statuses/user_timeline/{$username}.{$format}")); // get tweets and decode them into a variable

				echo text2links($tweet[0]->text); // show latest tweet

			?>
		</p>
		
	</body>
</html>
