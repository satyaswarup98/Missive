 <?php
include('database_connection.php');
session_start();
include('session_var.php');/*
if(!isset($_SESSION['user_id']))
{
 header("location:login.php");
}
if(isset($_POST['signin']))
{
$uname=$_POST['username'];
$pass=$_POST['password'];
if (empty($uname) || empty($pass))
                {
                    echo '<script type="text/javascript">
                    window.onload = function () 
                    { alert("Fill all the required fields"); }
                    </script>';
                }
				 $resulted = mysqli_query($conn, "SELECT * FROM data WHERE name='$uname' and password='$pass'");
    if(mysqli_num_rows($resulted) > 0) {
     $row = mysqli_fetch_assoc($resulted);
  
    }
		else{
			echo "<script>alert('Wrong login details !!')</script>";
			header("Location:signin.php");
		}
}
*/
	?>              

<html>
<head>
<title>Profile</title>
<?php
		include('head_links.php');
		?>
</head>
<body>
	<div class="wrapper">	
		<?php
		include('header.php');
		include('fetch_profile.php');
		?>
		<section class="cover-sec">
			<img src="images/banner.png" height="200" width="1600" alt="">
			<a href="#" title=""><i class="fa fa-camera"></i> Change Image</a>
		</section>	
		<main>
			<div class="main-section">
				<div style="width:85%; padding-left:5%">
					<div class="main-section-data">
						<div class="row">
							<div class="col-lg-3">
								<div class="main-left-sidebar">
									<div class="user_profile">
										<div class="user-pro-img">
											<img src="images/user_big.png" alt="" width="190">
											<a href="#" title=""><i style=" margin-top:11px;" class="fa fa-camera"></i></a>
										</div>
										<div class="suggestion-usd">
											<div class="sgt-text">
												<h4>GENDER : <?php echo $row['gender']; ?></h4> 
											</div>											
											<div class="sgt-text">
												<h4>DOB : <?php echo $row['dob']; ?></h4>
											</div>											
											<div class="sgt-text">
												<h4>LOCATION : <?php echo $row['curr_loc']; ?></h4>
											</div>											
											<div class="sgt-text">
												<h4>MOBILE : <?php echo $row['mobile']; ?></h4><br>
											</div>
											
											<div class="sgt-text">
												<ul class="job-dt"><?php $str_arr = explode (",", $row['skill']);
													$l=0;
													while($l<sizeof($str_arr)){ ?>
														<li><a href="#" title=""><?php print_r($str_arr[$l]); ?></a></li>
												<?php $l=$l+1;}?>
												</ul>
											</div>
										</div>
									</div>									
								</div>
							</div>
							<div class="col-lg-6">
								<div class="main-ws-sec">
									<div class="user-tab-sec">
										<h3> <?php echo $row['name'];?></h3>
										<div class="star-descp">
											<span>
										<?php
										 if($row['member']=='alumini')
										 {
											echo $row['curr_role']." at ".$row['curr_comp'];
										 }
										 else
										 {
											 echo "Student";
										 }
										?>
										</span>
									</div>	
									</div>	
								</div>
							</div>
							<div class="col-lg-3">
							
								<div class="main-left-sidebar">
									<div class="user_profile">
										<div class="wd-heady">
										<br>
											<h3>Social links</h3>
											<br>
											<ul class="social_links">
											<li><a href="#" title=""><i class="fa fa-google-plus-square"></i></i> <?php echo $row['email'];?></a></li>
											<li><a href="#" title=""><i class="fa fa-facebook-square"></i> <?php echo $row['fb'];?></a></li>
											<li><a href="#" title=""><i class="fa fa-twitter-square"></i> <?php echo $row['twitter'];?></a></li>
											<li><a href="#" title=""><i class="fa fa-linkedin-square"></i> <?php echo $row['linked'];?></a></li>
											<li><a href="#" title=""><i class="fa fa-github-square"></i> <?php echo $row['github'];?></a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
	</div>
</body>
</html>