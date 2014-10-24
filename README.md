ianacheck
=========

tool for finding whois servers for setted zones and whois of that servers of sample domain
written by noys
based on *php-whois* (https://github.com/regru/php-whois)   

to get result:
--------------   
1. fill array $zones with zones that you need to get    
  whois servers   
2. enter some existing or not existing domain in $domain var 
  but just domain without domain zone (TLD) to get whois
  of domain from zone's whois server
3. put this file on server and open it in browser