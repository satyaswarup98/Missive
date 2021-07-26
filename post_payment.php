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
<title>payment</title>
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
							<a href="#" title="" class="ask-question">Request Money</a><br><br><br>
							<?php
							$query = "SELECT * FROM payment where confirm=1 ;";
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
							  									<h5>Required <?php echo $row["r_money"]; ?> ₹</h5>
							  								</div><!--bx-info end-->
							  							</div><!--pro-bx end-->
							  							<p><?php echo $row["p_description"]; ?></p>
							  						</div><!--profile-bx-info end-->
							  					</div>
							  					
							  					
							  				</div>
											<div class="message-btn">
										<li><a class="post-jb active" href="#" title="">Donate</a></li>
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
					<textarea maxlength="250" name="describe" type="textarea" class="form-control" placeholder="Description"></textarea>				
					<button type="submit" name="upload" class="save">Submit</button>
				</form>
				<a href="" title="" class="close-box"><i class="la la-close"></i></a>
		</div>
	</div>
	
	
	<div class="post-popup job_post">
			<div class="post-project">
				<h3>Payment</h3>
				<div class="post-project-fields">
				
					<form method="POST" class="register-form" id="register-form" action="pgRedirect.php" >
						<div class="row">
							<div class="col-lg-12">
								<input title="name" tabindex="10" type="text" name="TXN_AMOUNT" value="<?php echo $row["p_title"]; ?>">
							</div>
							<div class="col-lg-12">
								<input title="TXN_AMOUNT" tabindex="10" type="text" name="TXN_AMOUNT" placeholder="amount">
							</div>
							
							<div class="col-lg-12">
								<input type="hidden" id="ORDER_ID" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo  "ORDS" . rand(10000,99999999)?>">
							</div>
							
							
							<div class="col-lg-12">
								<input type="hidden" id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="CUST001">
							</div>
							<div class="col-lg-12">
								<input type="hidden" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">
							</div>
							<div class="col-lg-12">
								<input type="hidden" id="CHANNEL_ID" tabindex="4" maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
							</div>
							<div class="col-lg-12">
								<ul>
									<li><button value="CheckOut" type="submit"	onclick="" class="signup"  >Pay</button></li>
									<li><a href="post_payment.php" title="">Cancel</a></li>
								</ul>
							</div>
						</div>
					</form>
				</div><!--post-project-fields end-->
				<a href="#" title=""><i class="la la-times-circle-o"></i></a>
			</div><!--post-project end-->
		</div><!--post-project-popup end-->
</div>
</body>
</html>