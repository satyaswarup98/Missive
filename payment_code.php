<?php
	include('database_connection.php');
	session_start();
	if($_SESSION['question'] == "false"){
	   header("Location: post_payment.php");
	}
	else{
	   //reset the variable
	   $_SESSION['question'] = "false";
	}	
		
        if(isset($_POST['upload'])){
            $heading = $_POST['heading'];
            $money = $_POST['money'];			
            $describe = $_POST['describe'];            
            
			
            $query = "INSERT INTO payment ( `p_title`, `money`,`r_money`, `p_description`) VALUES ( '$heading', '$money','$money', '$describe')";
            $statement = $connect->prepare($query);
			if($statement->execute())
			{
                //echo "<script>alert('Your account request is now pending for approval. Please wait for confirmation. Thank you.')</script>";
				header("location:post_payment.php");
            }else{
                echo "<script>alert('Unknown error occured.')</script>";
              }
			
        }
    
    ?>