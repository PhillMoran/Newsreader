<?php

/*
@params - $url - pass an array containing the page URLs to be checked.
*/

function chcekSiteStatus($url)
{

  $agent = "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/533.4 (KHTML, like Gecko) Chrome/5.0.375.70 Safari/533.4";
  
  $ch=curl_init();
  
  curl_setopt ($ch, CURLOPT_URL,$url );
  
  curl_setopt($ch, CURLOPT_USERAGENT, $agent);
  
  curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
  
  curl_setopt ($ch,CURLOPT_VERBOSE,false);
  
  curl_setopt($ch, CURLOPT_TIMEOUT, 5);
  
  $page=curl_exec($ch);
  
  //echo curl_error($ch);
  
  $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  
  curl_close($ch);
  
  $return_code = '0';
  
  if($httpcode>=200 && $httpcode<300)
  {
    $return_code = 1;
  }    
  
  //now the site has returned 200 OK, but there might be Fatal Error, lets catch it. If there return 2
  if($return_code==1)
  {
    if(preg_match('/Fatal/',$page))
    {
       $return_code = 2;
    }
    
    if(preg_match('/Parse error/',$page))
    {
       $return_code = 2;
    }
  }
  
  /*
  code - 1 :: Page loaded successfully
  code - 0 :: Failed loading the page (problem with server)
  code - 2 :: This page has Fatal Error 
  */
  
  return $return_code;
}

/*
List the site URLs you would like to test weather they are loading properly or not.
*/

$url_path = 'http://www.osu.edu/';

$site_urls = array(
                   $url_path,
                   $url_path.'index.php',
                   $url_path.'academics/tyufgindex.php',
                   );
                 
?>

