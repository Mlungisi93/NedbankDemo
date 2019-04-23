<?php
//call library 

require_once ('lib/nusoap.php'); 
//using soap_server to create server object 
$client = new nusoap_client("http://localhost:81/demo/services.php?wsdl"); 

$book_name = "xyzdhdh";

$response = $client->call("price", //name of the function
                  array("name"=>"$book_name") //price
				  );
				  
	if(empty($response))			  
				 echo "Book is not available";
			 else
			 
				 echo $response;
				 
				 
			 
?>