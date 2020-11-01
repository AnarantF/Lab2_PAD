<?php

$database_connection = new mysqli("127.0.0.1", "root", "",  "labpad") or die('Connection error!');

if (!isset($result)) 
    $result = new stdClass();

print_r($_POST);

if(!isset($_POST['useru']) || !isset($_POST['follow']) || !isset($_POST['data_sub']) || !isset($_POST['type_sub']))
{
	$result->status = "Error1";
	

	echo json_encode($result);
	exit();
}


try {
	
    	$db_query = "INSERT INTO `stream` (`useru`, `follow`, `data_sub`, `type_sub`) VALUES ('{$_POST['useru']}', '{$_POST['follow']}', '{$_POST['data_sub']}', '{$_POST['type_sub']}')";

		if (!$database_connection->query($db_query)) 
		{ 
			$result->status = "Error2";
			

			echo json_encode($result);
		}
		else
		{
			
		    
			$result->status = "Success";
			
			//$db_query = "SELECT * FROM studenti WHERE id={$id}";
			
			//$result->id = $database_connection->insert_id;

			echo json_encode($result,JSON_UNESCAPED_SLASHES);
		}
	
}
catch(Exception $e)
{
	$result->status = "Error3";
	

	echo json_encode($result);
}
	
?>