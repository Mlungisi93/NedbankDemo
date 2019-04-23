<?php

// get database connection
include'database.php';
 
// instantiate product object
include 'product.php';
function price($name)
{
	$details = array('abc'=>'100',
	                 'xyz'=>'200');
		$price = "";			 
	foreach($details as $n=>$p)	
	{
		
		if($name == $n)
		{
			$price .= $p;
		}
	}
	
	if(empty($price))
	{
		    http_response_code(404);
		$price .="No data found for searching: ".$name;
	 return $price;
	}else
	{
	return $price;	
	}
	
}

function GetData($token)
{
    if($token == "somestring") {
        $result[0] = array(
            "animal"  => "cat",
            "phone"   => "225",
            "code"    => "FYI"
        );

        $result[1] = array(
            "animal"  => "dog",
            "phone"   => "552",
            "code"    => "IFY"
        );
    } else {
        $result = null;
    }
    return $result;
}




//************************************** CREATE FUCTION*************************************************//
function addProduct($name1, $price1, $description1, $category_id1)
{
	$response = "";
	if(
    !empty($name1) &&
    !empty($price1) &&
    !empty($description1) &&
    !empty($category_id1)
){
 
    // set product property values
	$database = new Database();
$db = $database->getConnection();
 
$product = new Product($db);
    $product->name = $name1;
    $product->price = $price1;
    $product->description = $description1;
    $product->category_id = $category_id1;
    $product->created = date('Y-m-d H:i:s');
 $stmt = $product->readName();
$num = $stmt->rowCount();
if($num ==0)
{
    // create the product from product class
    if($product->create()){
 
        // set response code - 201 created
        http_response_code(201);
 
        // tell the user
        $response .= "Product was created";
		
    }
 
    // if unable to create the product, tell the user
    else{
 
        // set response code - 503 service unavailable
        http_response_code(503);
 
        // tell the user
        $response .= "Unable to create product.";
    }
	
}else
{
	// set response code - 503 service unavailable
        http_response_code(503);
 
        // tell the user
       $response .=  "Product ".$product->name. " already exist in the database";
}
}
 
// tell the user data is incomplete
else{

 
    // set response code - 400 bad request
    http_response_code(400);
 
    // tell the user
    $response .= "Unable to create product. Data is incomplete.";
}
return $response;
}

//**************************************END CREATE FUCTION*************************************************//

//************************************** UPDATE FUCTION*************************************************//
function updateProduct($id1, $name1, $price1, $description1, $category_id1)
{
	$response = "";
	if(
	!empty($id1) 
  
){
 
    // set product property values
	$database = new Database();
$db = $database->getConnection();
 
$product = new Product($db);
    $product->id = $id1;
    $product->name = $name1;
    $product->price = $price1;
    $product->description = $description1;
    $product->category_id = $category_id1;
    $product->created = date('Y-m-d H:i:s');
	
 $stmt = $product->readOneByID();
$num = $stmt->rowCount();
if($num == 1)
{
    // create the product from product class
    if($product->update() ==true){
 
        // set response code - 200 OK
        http_response_code(200);
 
        // tell the user
        $response .= "Product was updated";
		
    }
 
    // if unable to update the product, tell the user
    else{
 
        // set response code - 503 service unavailable
        http_response_code(503);
 
        // tell the user
        $response .= "Unable to update product.";
    }
	
}else
{
	// set response code - 503 service unavailable
        http_response_code(503);
 
        // tell the user
       $response .=  "Product ".$product->id. " does not exist in the database";
}
}
 
// tell the user data is incomplete
else{

 
    // set response code - 400 bad request
    http_response_code(400);
 
    // tell the user
    $response .= "Unable to create product. Data is incomplete.";
}
return $response;
}
//************************************** END OF UPDATE FUCTION*************************************************//

//************************************** SEARCH BY ID FUCTION*************************************************//
function searchById($id1)
{
	$response = "";
	if(
	!empty($id1) 
  
){
 
    // set product property values
	$database = new Database();
$db = $database->getConnection();
 
$product = new Product($db);
    $product->id = $id1;
    
	
 $stmt = $product->readOne();
 $stmt = $product->readOneByID();
$num = $stmt->rowCount();
if($num == 1)
{
		$array[] = array('ProductId' => $product->id, 'ProductName' => $product->name, 
		'Description' => $product->description, 'price' => $product->price,
		'category_id' => $product->category_id, 'category_name' =>$product->category_name
		);
$data[] = $array[0];
   /*$response .= "{id => ". $product->id. "\n".
                   "name => ". $product->name. "\n". 
				   "description => ". $product->description. "\n".
				   "price => ". $product->price. "\n". 
				   "category_id => ". $product->category_id. "\n".
                    "category_name => ". $product->category_name. "\n". 				   
				   "}";*/
	
}else
{
	// set response code - 503 service unavailable
        http_response_code(503);
 
        // tell the user
		$array[] = array('ProductId' => 'Product with '.$id1.' id does not exist in the database', 'ProductName' => '', 
		'Description' => '', 'price' => '',
		'category_id' => '', 'category_name' =>''
		);
		$data[] = $array[0];
       //$response .=  "Product Id No: ".$product->id. " does not exist in the database";
}
}
 
// tell the user data is incomplete
else{

 
    // set response code - 400 bad request
    http_response_code(400);
 
    // tell the user
	$array[] = array('ProductId' => 'Invalid id.Your Id can not be empty', 'ProductName' => '', 
		'Description' => '', 'price' => '',
		'category_id' => '', 'category_name' =>''
		);
		$data[] = $array[0];
    //$response .= "Invalid id.Your Id can not be empty";
}

return $data;
}
//************************************** END SEARCH BY ID FUCTION*************************************************//

//************************************** SEARCH BY KeyWord FUCTION*************************************************//
function searchByKeyword($keyWord)
{
	
	$response = "";
	if(
	!empty($keyWord) 
  
){
 
    // set product property values
	$database = new Database();
$db = $database->getConnection();
 
$product = new Product($db);
   
    
	
 $stmt = $product->search($keyWord);
 $stmt = $product->searchReturn($keyWord);
$num = $stmt->rowCount();
if($num >= 1)
{
	$count = 0;
	  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	   $product->id = $row['id'];
    $product->name = $row['name'];
    $product->price = $row['price'];
    $product->description = $row['description'];
    $product->category_id = $row['category_id'];
    $product->category_name = $row['category_name'];
	
	$array[] = array('ProductId' => $product->id, 'ProductName' => $product->name, 
		'Description' => $product->description, 'price' => $product->price,
		'category_id' => $product->category_id, 'category_name' =>$product->category_name
		);
$data[] = $array[$count];
$count++;
	  
	  /*$response .= "{id => ". $product->id. "\n".
                   "name => ". $product->name. "\n". 
				   "description => ". $product->description. "\n".
				   "price => ". $product->price. "\n". 
				   "category_id => ". $product->category_id. "\n".
                    "category_name => ". $product->category_name. "\n". 				   
				   "}"."\n";*/
	  }
   
	
}else
{
	// set response code - 503 service unavailable
        http_response_code(503);
 
        // tell the user
		$array[] = array('ProductId' => '', 'ProductName' => 'Product with '.$keyWord.' keyword does not exist in the database', 
		'Description' => '', 'price' => '',
		'category_id' => '', 'category_name' =>''
		);
$data[] = $array[0];
       //$response .=  "Product with ".$keyWord." keyword does not exist in the database";
}
}
 
// tell the user data is incomplete
else{

 
    // set response code - 400 bad request
    http_response_code(400);
 
    // tell the user
	$array[] = array('ProductId' => '', 'ProductName' => 'Invalid search keyword.Your Id can not be empty', 
		'Description' => '', 'price' => '',
		'category_id' => '', 'category_name' =>''
		);
		$data[] = $array[0];
    //$response .= "Invalid search keyword.Your Id can not be empty";
}
return $data;
}
//************************************** END SEARCH BY KeyWord FUCTION*************************************************//


//************************************** DELETE BY ID FUCTION*************************************************//
function deleteById($id1)
{
	$response = "";
	if(
	!empty($id1) 
  
){
 
    // set product property values
	$database = new Database();
$db = $database->getConnection();
 
$product = new Product($db);
    $product->id = $id1; //in java product.id
    
	
 //$stmt = $product->readOne();
 $stmt = $product->deleteProduct();
$num = $stmt->rowCount();
if($num == 1)
{
		
   /*$response .= "{id => ". $product->id. "\n".
                   "name => ". $product->name. "\n". 
				   "description => ". $product->description. "\n".
				   "price => ". $product->price. "\n". 
				   "category_id => ". $product->category_id. "\n".
                    "category_name => ". $product->category_name. "\n". 				   
				   "}";*/
				   $array[] = array('ProductId' => 'Product has been deleted', 'ProductName' => '', 
		'Description' => '', 'price' => '',
		'category_id' => '', 'category_name' =>''
		);
		$data[] = $array[0];
		$response .="Product with ".$id1." has been deleted successfully";
	
}else
{
	// set response code - 503 service unavailable
        http_response_code(503);
 
        // tell the user
		/*$array[] = array('ProductId' => 'Product with '.$id1.' id does not exist in the database', 'ProductName' => '', 
		'Description' => '', 'price' => '',
		'category_id' => '', 'category_name' =>''
		);
		$data[] = $array[0];*/
       $response .=  "Product Id No: ".$product->id. " does not exist in the database";
}
}
 
// tell the user data is incomplete
else{

 
    // set response code - 400 bad request
    http_response_code(400);
 
    // tell the user
	/*$array[] = array('ProductId' => 'Invalid id.Your Id can not be empty', 'ProductName' => '', 
		'Description' => '', 'price' => '',
		'category_id' => '', 'category_name' =>''
		);
		$data[] = $array[0];*/
    $response .= "Invalid id.Your Id can not be empty";
}

return $response;
}
//************************************** END DELETE BY ID FUCTION*************************************************//

//************************************** READ ALL PRODUCTS FUCTION*************************************************//
function readAllProducts()
{
	
 
    // set product property values
	$database = new Database();
$db = $database->getConnection();
 
$product = new Product($db);
 $stmt = $product->read();
$num = $stmt->rowCount();
if($num > 0)
{
	$count = 0;
	  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		  
		  $product->id = $row['id'];
    $product->name = $row['name'];
    $product->price = $row['price'];
    $product->description = $row['description'];
    $product->category_id = $row['category_id'];
    $product->category_name = $row['category_name'];
	
		$array[] = array('ProductId' => $product->id, 'ProductName' => $product->name, 
		'Description' => $product->description, 'price' => $product->price,
		'category_id' => $product->category_id, 'category_name' =>$product->category_name
		);
$data[] = $array[$count];
   /*$response .= "{id => ". $product->id. "\n".
                   "name => ". $product->name. "\n". 
				   "description => ". $product->description. "\n".
				   "price => ". $product->price. "\n". 
				   "category_id => ". $product->category_id. "\n".
                    "category_name => ". $product->category_name. "\n". 				   
   
   			   "}";*/
			  $count++; 
			   }
	
}else
{
	// set response code - 503 service unavailable
        http_response_code(503);
 
        // tell the user
		$array[] = array('ProductId' =>' There are no products in the products table', 'ProductName' => '', 
		'Description' => '', 'price' => '',
		'category_id' => '', 'category_name' =>''
		);
		$data[] = $array[0];
       //$response .=  "Product Id No: ".$product->id. " does not exist in the database";
}


return $data;
}
//************************************** END SEARCH BY ID FUCTION*************************************************//
?>