ianacheck   
=========
 
Tool for finding whois servers of setted domain zones from root IANA whois server
Written by noys (https://github.com/noys).
Based on php-whois (https://github.com/regru/php-whois).
   
To get result:   
--------------   
1. Fill array **$zones** with zones you need to get whois servers from.
2. Enter some existing or not existing domain in **$domain** variable (just domain without domain zone (TLD)) to get whois of domain from zone's whois server.
3. Put this file on server and open it in browser.
