<?php
	include('database_connection.php');
    session_start();
	include('session_var.php');
	if(!isset($_SESSION['user_id']))
	{
	 header("location:login.php");
	}
	$_SESSION['question'] = "true";
?>		
<html>
<head>
<meta charset="UTF-8">
<title>payments</title>
<?php
		include('head_links.php');
		?>
</head>
<body>
<div class="wrapper">
		<?php
		include('header.php');
		?>
	
		<section class="forum-page">
			<div style="width:100%;">
				<div class="forum-questions-sec">
					<div class="row">
						<div class="col-lg-1">
						</div>
						<div class="col-lg-9">
							
							<?php
							$query = "SELECT * FROM payment where confirm=0 ;";
							$statement = $connect->prepare($query);
							$statement->execute();
							$result = $statement->fetchAll();
							foreach($result as $row)
								{ 						
								?>
								   <div class="col-lg-4 col-md-4 col-sm-6">
								    <div class="post-bar">
								   <div class="acc-setting">
							  			<h3><?php echo $row["p_title"]; ?></h3>
							  			<div class="profile-bx-details">
							  				<div class="row">
							  					<div class="col-lg-12">
							  						<div class="profile-bx-info">
							  							<div class="pro-bx">
							  								<img src="images/pro-icon1.png" alt="">
							  								<div class="bx-info">
							  									<h3><?php echo $row["money"]; ?> ₹</h3>
							  									<h5>Required <?php echo $row["money"]; ?> ₹</h5>
							  								</div><!--bx-info end-->
							  							</div><!--pro-bx end-->
							  							<p><?php echo $row["p_description"]; ?></p>
							  						</div><!--profile-bx-info end-->
							  					</div>
							  					
							  					
							  				</div>
											<div class="message-btn">
										<a href="accept.php?id=<?php echo $row['id'] ?>" title=""></i>Accept</a>
										<a href="reject.php?id=<?php echo $row['id'] ?>" title=""></i>Reject</a>
									</div>
							  			</div>
										
							  		</div>
									</div>
									</div>
														
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</section>
	<div class="overview-box" id="question-box">
		<div class="overview-edit">
			<h3>Request Money</h3>
				<form method="post" action="payment_code.php">
					<input name="heading" type="text" class="form-control" placeholder="for what....." >
					<input name="money" type="text" class="form-control" placeholder="money" >
					<textarea name="describe" type="textarea" class="form-control" placeholder="Description"></textarea>				
					<button type="submit" name="upload" class="save">Submit</button>
				</form>
				<a href="" title="" class="close-box"><i class="la la-close"></i></a>
		</div>
	</div>
</div>
</body>
</html>