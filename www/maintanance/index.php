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
     			font-size:35px;
			
			
			}
			
			
		</style>
	</head>
	<body>
		
			<p>coming soon <a href="mailto:info@kebaparis.ch">...</a></p>
			<p id="caption">or later</p>
			
			<p id="latesttweet">
		<?php
              
              /*// Your twitter username.
              $username = "kebaparisch";
              
              // Prefix - some text you want displayed before your latest tweet.
              // (HTML is OK, but be sure to escape quotes with backslashes: for example href=\"link.html\")
              $prefix = "";
              
              // Suffix - some text you want display after your latest tweet. (Same rules as the prefix.)
              $suffix = "";
              
              $feed = "http://search.twitter.com/search.atom?q=from:" . $username . "&rpp=1";
              
              function parse_feed($feed) {
                  $stepOne = explode("<content type=\"html\">", $feed);
                  $stepTwo = explode("</content>", $stepOne[1]);
                  $tweet = $stepTwo[0];
                  $tweet = str_replace("&lt;", "<", $tweet);
                  $tweet = str_replace("&gt;", ">", $tweet);
                  return $tweet;
              }
              
              $twitterFeed = file_get_contents($feed);
              echo stripslashes($prefix) . parse_feed($twitterFeed) . stripslashes($suffix);*/
              
              $username='kebaparisch'; // set user name
              $format='json'; // set format
              $tweet=json_decode(file_get_contents("http://api.twitter.com/1/statuses/user_timeline/{$username}.{$format}")); // get tweets and decode them into a variable

              echo $tweet[0]->text; // show latest tweet
              
              
              
          ?>
		</p>
		
	</body>
</html>
