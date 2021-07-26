<?php
   include('database_connection.php');
   session_start(); //we need session for the log in thingy XD 

        if(isset($_POST['upload'])){
            
			$username = $_SESSION['username'];
			$describe = $_POST['describe'];
            $imagename = $_FILES['file']['name'];
			$tempname = $_FILES['file']['tmp_name'];
			
			move_uploaded_file($tempname,"events/".$imagename);
			
            $query = "INSERT INTO `events` ( `username`, `describe`, `image`, `confirm` ) VALUES ( '$username', '$describe', '$imagename', 1 )";
    $statement = $connect->prepare($query);
    if($statement->execute())
    {
               // echo "<script>alert('Your account request is now pending for approval. Please wait for confirmation. Thank you.')</script>";
				 header('location:event.php');
            }else{
                echo "<script>alert('Unknown error occured.')</script>";
              }
		 
			
        }
    
    ?>
