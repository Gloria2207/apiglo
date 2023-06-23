<?php 
include "BDD_base.php";



Class API
{
	//initialize the request
	function __construct()
	{
		$this->reqArgs();

	}
	
	// provides the response 
	function reqArgs()
	{
		// get the HTTP method, path and body of the request
		
		$method = $_SERVER["REQUEST_METHOD"];
		$request= explode("/",$_SERVER["REQUEST_URI"]) ;
		$input ="" ;
		$set = "SET";

		if ($method=="PUT"){
			$input=$_GET;
		}

		if ($method=="POST"){
			$input=$_GET;
		}
		
		if ($request){
			
			// retrieve the table and key from the path
			$table=$request[3];
			$key = $request[4] ;
			
			
		}
		
		if ($input)
		{ 
				
			// escape the columns and values from the input object
			$columns = array_keys($input) ;
			$values = array_values($input) ;

	 
			// build the SET part of the SQL command
			

			for($i=0; $i < count($columns); $i++){
				$set .= $columns[$i]=$values[$i]; 

				if($i == count($columns)){
					$set .= ", "	;

				}
				$set .= " ";


			}
			//TODO
			
		}
		
		if($method){
		
			$bdd = new BDD();
			//TODO You'd better to use a switch Method ;)
			switch($method){
				case "DELETE":
				$bdd-> deleteAction($table, $key);
				break;
				case "GET":
				echo json_encode( $bdd->getAction($table, $key));
				break;
		
				// default:
				
				/*case"PUT";
				echo $set;
				$key = intval(explode('?',$key)[0]);
				$bdd-> putAction($table, $key, $set);
				break;*/
				case"POST";
				$bdd-> postAction($table, $input);
				break;
			}
		}
	}
}

new API();

?>