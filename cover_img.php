<?php
   include('database_connection.php');
   session_start(); //we need session for the log in thingy XD 

       if(isset($_POST["upload"]))
	   {
            
			$username = $_SESSION['username'];
			$imagename = $_FILES['file']['name'];
			$tempname = $_FILES['file']['tmp_name'];
			$folder = "cover/".$imagename;
			move_uploaded_file($tempname,$folder);
			
			$qry="UPDATE `login` SET `images` ='$imagename'  WHERE `username`= '$username'  ";
			$con = mysqli_connect('localhost','root','','chat');
			
		
			$run= mysqli_query($con,$qry);
			if($run == true)
			{
				
					header("location:my_profile.php");
		
			}
			else
				echo "error";
			
	   }
	
			?>