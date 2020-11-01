<?php

$database_connection = new mysqli("127.0.0.1", "root", "",  "labpad") or die('Connection error!');

if (!isset($result)) 
    $result = new stdClass();

$id;
if(isset($_GET["id"]))
{
	$id = $_GET["id"];
}
else
{
	$result->status = "Error";
	$result->message = "Please select correct id.";

	echo json_encode($result,JSON_PRETTY_PRINT);
	exit();
}

try {
	    $db_query = "SELECT * FROM stream WHERE id='{$id}'";
		$res = $database_connection->query($db_query);
		
		if (!$res) 
		{ 
			$result->status = "Error";
			$result->message = "There is no id you are looking for.";

			echo json_encode($result,JSON_PRETTY_PRINT);
			exit();
		}
		else
		{
			$stream=mysqli_fetch_array($res);
			
			$result->status = "Success";
			$result->id = $stream['id'];
			$result->useru = $stream['useru'];
			$result->follow = $stream['follow'];
			$result->data_sub = $stream['data_sub'];
			$result->type_sub = $stream['type_sub'];

			echo json_encode($result,JSON_PRETTY_PRINT);
		    
		}

}
catch(Exception $e)
{
	$result->status = "Error";
	$result->message = "General Error.";

	echo json_encode($result,JSON_PRETTY_PRINT);
}
	
?>