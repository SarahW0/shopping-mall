<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

 $banner_images = [];
 $rec_images = [];

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

    // get banner images
	$banner_dir = "banner-images/";
    $a = scandir($banner_dir);
    
    for ($i=2; $i < count($a); $i++ ){ 
		$banner_images[$i-2]["image"] = $url."/".$banner_dir.$a[$i];		
		$banner_images[$i-2]["link"] = "https://www.google.com/";		
	} 
	
    // get recommended images
	$rec_dir = "recommend-images/";
    $b = scandir($rec_dir);
    
    for ($i=2; $i < count($a); $i++ ){ 
		$rec_images[$i-2]["image"] = $url."/".$rec_dir.$b[$i];		
		$rec_images[$i-2]["link"] = "https://www.google.com/";		
	} 	
	


$images = array("banner"=>$banner_images, "recommend"=>$rec_images);

http_response_code(200);
echo json_encode($images);
