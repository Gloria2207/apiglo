<?php 
Require_once 'config.php';

Class BDD
{
	//PDO connection is reached from the singleton class

	//get the selected row
	public Function getAction($table, $key)
	{
		
		 
		try {
            /*TODO : Find if there is an ID and do a prepared request according to the case */
			$stmt = singleton:: getInstance()->prepare("SELECT * FROM $table WHERE ID = :id");
			$stmt->bindValue(":id",$key,PDO::PARAM_STR);
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_ASSOC);
		}
		catch (PDOException $e) {
    		echo $e->getMessage();
    	exit;
		}

		
	}

	//update selected table 
	public Function putAction($table, $key, $set)
	{
		
		try {
			/*TODO : prepare the request for one row update */
			$stmt = singleton:: getInstance()->prepare("UPDATE $table  $set WHERE id = :id");
			$stmt->bindValue(":id", $key, PDO::PARAM_STR);
			$stmt->execute();

		}
		catch (PDOException $e) {
    		echo $e->getMessage();
    	exit;
		}

	}

	//insert a row from selected table
	public Function deleteAction($table, $key)
	{
		
		try{
			/*TODO : prepare the request for one row insert */
			$stmt = singleton:: getInstance()->prepare("DELETE FROM $table WHERE id = :id ");
			$stmt->bindValue(":id", '$key', PDO::PARAM_STR);
			$stmt->execute();
			
		}
		catch (PDOException $e) {
    		echo $e->getMessage();
    	exit;
		}

	}

	//delete a row from selected table
	public Function postAction($table, $input)
	{
		try{
		$stmt = singleton::getInstance()->prepare("INSERT INTO $table(name, description, image, price) VALUES(:nom,  :descrip, :img, :price)");
		$stmt->execute([
			":nom" => $input["name"],
			":descrip" => $input["description"],
			":img" => $input["image"],
			":price" => $input["price"]
		]);
	}
		// try{
		// 	/*TODO : prepare the request for one row delete */
			
		// }
		catch (PDOException $e) {
    		echo $e->getMessage();
    	exit;
		}

	}


}
?>