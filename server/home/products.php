<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 

 if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   
    
    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];    

    $pos = strrpos($url, "/");
	
	//get URL without file name
	$url = substr($url, 0, $pos);
	//print_r($url);
	//parse URL query into an array
	parse_str($_SERVER['QUERY_STRING'], $query_array);
    //print_r($query_array);
	
	$products_dir = getcwd() . "/products/";
	//print_r($products_dir);
	
	// get page number 1-3
	$page_number = (int)$query_array['page'];
	
	//wrong page number, return empty array
	if($page_number < 1 || $page_number > 3) {
		http_response_code(200);
		echo json_encode([]);		
	} elseif($query_array['type'] == "popular") {
		// load popular products
		$product_array = [];
		// Get the contents of the JSON file 
		$strJsonFileContents = file_get_contents($products_dir."popular-products.json");
		// Convert to array 
		$array = json_decode($strJsonFileContents, true);				
		// get keys
		$array_keys = array_keys($array);
		// get start index
		$start = ($page_number-1)*10;
		//each page has 10 products
		for ($i=0; $i < 10; $i++ ){ 
		  $key = $array_keys[$i + $start];
		  $product_array[$key] = $array[$key];		
		  $product_array[$key]["image"] = $url."/products/popular-product-images/".$product_array[$key]["image"];
		}
		http_response_code(200);
		echo json_encode($product_array);
		
	} elseif ( $query_array['type'] == "new" ) {
	// load popular products
		$product_array = [];
		// Get the contents of the JSON file 
		$strJsonFileContents = file_get_contents($products_dir."new-products.json");
		// Convert to array 
		$array = json_decode($strJsonFileContents, true);				
		// get keys
		$array_keys = array_keys($array);
		// get start index
		$start = ($page_number-1)*10;
		//each page has 10 products
		for ($i=0; $i < 10; $i++ ){ 
		  $key = $array_keys[$i + $start];
		  $product_array[$key] = $array[$key];		
		  $product_array[$key]["image"] = $url."/products/new-product-images/".$product_array[$key]["image"];
		}
		http_response_code(200);
		echo json_encode($product_array);	
	} elseif ( $query_array['type'] == "essential" ) {
	// load popular products
		$product_array = [];
		// Get the contents of the JSON file 
		$strJsonFileContents = file_get_contents($products_dir."essential-products.json");
		// Convert to array 
		$array = json_decode($strJsonFileContents, true);				
		// get keys
		$array_keys = array_keys($array);
		// get start index
		$start = ($page_number-1)*10;
		//each page has 10 products
		for ($i=0; $i < 10; $i++ ){ 
		  $key = $array_keys[$i + $start];
		  $product_array[$key] = $array[$key];		
		  $product_array[$key]["image"] = $url."/products/essential-product-images/".$product_array[$key]["image"];
		}
		http_response_code(200);
		echo json_encode($product_array);	
	}		

