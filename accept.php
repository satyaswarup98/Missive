<?php
   include('database_connection.php');
    $id = $_GET['id'];
    $query = "UPDATE `payment` SET `confirm` = '1' WHERE `id` = '$id';";
    
       $statement = $connect->prepare($query);
			if($statement->execute())
		{
         header("location:admin_home.php");
        }
		else
		{
            echo "Unknown error occured. Please try again.";
        }
	
?>



