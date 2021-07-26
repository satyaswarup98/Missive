<?php
    include('database_connection.php');
    $id = $_GET['id'];
$conn=mysqli_connect('localhost','root','','chat');
if ($conn->connect_error)
    {
    die("Connection failed: " . $conn->connect_error);
    }
    else
    {
    $query = "DELETE FROM `payment` WHERE `id` = '$id';";
        $statement = $connect->prepare($query);
			if($statement->execute())
		{
         header("location:admin_home.php");
        }
		else
		{
            echo "Unknown error occured. Please try again.";
        }
  }
?>