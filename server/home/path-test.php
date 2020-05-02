<?php  
 $images = [];

 if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   
    
    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];    

    $pos = strrpos($url, "/");
	
	$url = substr($url, 0, $pos);
	
	$dir = "banner-images/";

    // Sort in ascending order - this is default
    $a = scandir($dir);
    
	var_dump($a);  
	
    for ($i=2; $i < count($a); $i++ ){ 
		$images[$i-2] = $url."/".$dir.$a[$i];
		var_dump($a[$i]);
	} 
	
    var_dump($images);  
  ?>   