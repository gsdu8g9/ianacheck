<?
/*-------------------------------------------------------------/
#															   #
#  ianacheck												   #
#  ---------												   #
#  tool for finding whois servers for setted zones			   #
#  written by noys 											   #
#  based on php-whois (https://github.com/regru/php-whois)	   #
#															   #
#  to get result:											   #
#  --------------											   #
#  - fill array $zones with zones that you need to get 		   #
#    whois servers											   #
#  - enter some existing or not existing domain in $domain var #
#    but just domain without domain zone (TLD) to get whois    #
#    of domain from zone's whois server						   #
#  - put this file on server and open it in browser			   # #															    #
/-------------------------------------------------------------*/

$domain = '1q3ee3w2q1';

$zones = array('com','net','org','biz','info','ru','su','by','kz');

$count = count($zones);

echo '<h1>ianacheck</h1>';

foreach($zones as $zone) 
{

	$root_server = 'whois.iana.org';
	$domain = "$domain.$zone";

	$fp = fsockopen($root_server, 43);
	if (!$fp) echo "Connection error: $root_server";
	else 
	{ 
		fputs($fp, $zone."\r\n");
		while (!feof($fp)) 
		{
			$root_answer .= fgets($fp, 128);
		}
		preg_match("~whois:\s(.+)~i", $root_answer, $result);
		$current_server = trim($result[1]);
		fclose($fp);
	} 

	echo "<h2>.$zone : $current_server</h2>";	
	
	$fh = fsockopen($current_server, 43);
	if (!$fh) echo "Connection error: $current_server ($zone)";
	else 
	{ 
		fputs($fh, $domain."\r\n");
		while (!feof($fh))
		{
			$current_answer .= fgets($fh, 128);
		}
		fclose($fh);
	}
	
	echo "<pre>$current_answer</pre>";
	
	unset($root_answer);
	unset($current_answer);
	unset($result);
	
}

echo '</pre>';

?>