<?php
//call library 
require 'functions.php';
require_once ('lib/nusoap.php'); 
//using soap_server to create server object 
$server = new nusoap_server(); 
// configure my WSDL Web Services Description Language
//WSDL is used to describe web services
//WSDL is written in XML;
$namespace ="urn:demo";
$server->configureWSDL("demo",$namespace); //namespace of the project


/*
$server->wsdl->addComplexType('datosBasicos', 'complexType', 'struct', 'all', '', array(
    'FirstName' => array(
        'name' => 'FirstName',
        'type' => 'xsd:string'
    ),
    'LastName' => array(
        'name' => 'LastName',
        'type' => 'xsd:string'
    )
	,
    'id' => array(
        'name' => 'id',
        'type' => 'xsd:string'
    )
));

$server->wsdl->addComplexType('arraydatosBasicos', 'complexType', 'array', '', 'SOAP-ENC:Array', array(), array(
    array('ref' => 'SOAP-ENC:arrayType',
        'wsdl:arrayType' => 'tns:datosBasicos[]')
        ), 'tns:datosBasicos'
);

$server->register('saludar', array('nombre' => 'xsd:string'), array('return' => 'tns:arraydatosBasicos'), $namespace);

function saludar($nombre) {
	if($nombre == "abc")
	{
	$array[] = array('FirstName' => '123', 'LastName' => 'test', 'id' => '9307096096086');
    //$array[] = array('FirstName' => 'Mlungisi', 'LastName' => 'Khumalo', 'id' => '9307096096086');
    $datos[] = $array[0];
    	
	}else
	{
		//$array[] = array('FirstName' => '123', 'LastName' => 'test', 'id' => '9307096096086');
    $array[] = array('FirstName' => 'Mlungisi', 'LastName' => 'Khumalo', 'id' => '9307096096086');
    $datos[] = $array[1];
    
	}
   return $datos; 
}

*/



/*$server->register("price", //name of the function
                  array("name"=>'xsd:string'), // imputs,
				  array("details[0]"=>"xsd:string") //output
				  );*/
				  
				  //can add as many function as I want
				  
				  //register my addProduct function
$server->register("addProduct", //name of the function
                  array("name"=>'xsd:string',
				        "price"=>'xsd:decimal',
						"description"=>'xsd:string',
						"category_id"=>'xsd:integer'), // inputs,
				  array("return"=>"xsd:string") //output
				  );
				  
$server->register("updateProduct", //name of the function
                  array("id"=>'xsd:integer',
				        "name"=>'xsd:string',
				        "price"=>'xsd:decimal',
						"description"=>'xsd:string',
						"category_id"=>'xsd:integer'), // inputs,
				  array("return"=>"xsd:string") //output
				  );
				  
$server->wsdl->addComplexType('returnProduct', 'complexType', 'struct', 'all', '', array(
    'ProductId' => array(
        'name' => 'ProductId',
        'type' => 'xsd:integer'
    ), 
	'ProductName' => array(
        'name' => 'ProductName',
        'type' => 'xsd:string'
    ),
	'Description' => array(
        'name' => 'Description',
        'type' => 'xsd:string'
    ),
    'price' => array(
        'name' => 'price',
        'type' => 'xsd:double'
    ),
	'category_id' =>array(
		'name' => 'category_id',
		'type' => 'xsd:integer'
	),
	'category_name' =>array(
	'name' => 'category_name',
	'type' => 'xsd:string')
    
));

$server->wsdl->addComplexType('arraydata', 'complexType', 'array', '', 'SOAP-ENC:Array', array(), array(
    array('ref' => 'SOAP-ENC:arrayType',
        'wsdl:arrayType' => 'tns:returnProduct[]')
        ), 'tns:returnProduct'
);

$server->register('searchById', array('id' => 'xsd:string'), array('return' => 'tns:arraydata'), $namespace);

//readAllProducts

$server->wsdl->addComplexType('returnAllProduct', 'complexType', 'struct', 'all', '', array(
    'ProductId' => array(
        'name' => 'ProductId',
        'type' => 'xsd:integer'
    ), 
	'ProductName' => array(
        'name' => 'ProductName',
        'type' => 'xsd:string'
    ),
	'Description' => array(
        'name' => 'Description',
        'type' => 'xsd:string'
    ),
    'price' => array(
        'name' => 'price',
        'type' => 'xsd:double'
    ),
	'category_id' =>array(
		'name' => 'category_id',
		'type' => 'xsd:integer'
	),
	'category_name' =>array(
	'name' => 'category_name',
	'type' => 'xsd:string')
    
));

$server->wsdl->addComplexType('arrayAlldata', 'complexType', 'array', '', 'SOAP-ENC:Array', array(), array(
    array('ref' => 'SOAP-ENC:arrayType',
        'wsdl:arrayType' => 'tns:returnProduct[]')
        ), 'tns:returnAllProduct'
);

$server->register('readAllProducts', array('' => ''), array('return' => 'tns:arrayAlldata'), $namespace);

/*$server->register("searchById", //name of the function
                  array("id"=>'xsd:integer'), // inputs,
				  array("return"=>"xsd:string") //output
				  );*/
	
	$server->wsdl->addComplexType('returnProductKeyWord', 'complexType', 'struct', 'all', '', array(
    'ProductId' => array(
        'name' => 'ProductId',
        'type' => 'xsd:integer'
    ), 
	'ProductName' => array(
        'name' => 'ProductName',
        'type' => 'xsd:string'
    ),
	'Description' => array(
        'name' => 'Description',
        'type' => 'xsd:string'
    ),
    'price' => array(
        'name' => 'price',
        'type' => 'xsd:double'
    ),
	'category_id' =>array(
		'name' => 'category_id',
		'type' => 'xsd:integer'
	),
	'category_name' =>array(
	'name' => 'category_name',
	'type' => 'xsd:string')
    
));

$server->wsdl->addComplexType('arraydataKeyWord', 'complexType', 'array', '', 'SOAP-ENC:Array', array(), array(
    array('ref' => 'SOAP-ENC:arrayType',
        'wsdl:arrayType' => 'tns:returnProductKeyWord[]')
        ), 'tns:returnProductKeyWord'
);
$server->register('searchByKeyword', array('id' => 'xsd:string'), array('return' => 'tns:arraydataKeyWord'), $namespace);
	
/*$server->register("searchByKeyword", //name of the function
                  array("keyword"=>'xsd:string'), // inputs,
				  array("return"=>"xsd:string") //output
				  );*/			  

$server->register("deleteById", //name of the function
                  array("id"=>'xsd:integer'), // inputs,
				  array("return"=>"xsd:string") //output
				  );			  
				  
				  
				  
				 

				  
 
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);				  
?>