<?php
session_start();
$message = '';
$conn = mysqli_connect('localhost','root','','chat');
    if ($conn->connect_error)
    {
		die("Connection failed: " . $conn->connect_error);
    }
    else
    {
		if(isset($_POST['signup']))
		{
			$name=$_POST['name'];
			$username=$_POST['username'];
			$email=$_POST['email'];
			$pass=$_POST['password'];
			$dob=$_POST['dob'];
			$position=$_POST['position'];
			$affiliation=$_POST['affiliation'];
			$bsc_course=$_POST['bsc_course'];
			$bsc_year=$_POST['bsc_year'];
			
			
			$msc_course=$_POST['msc_course'];
			$msc_year=$_POST['msc_year'];
			$phd_course=$_POST['phd_course'];
			$phd_year=$_POST['phd_year'];
			$past_affiliation=$_POST['past_affiliation'];
			$distinction=$_POST['distinction'];
			
			$current_activity=$_POST['current_activity'];
			$past_activity=$_POST['past_activity'];
			$junior=$_POST['junior'];
			
			$password = password_hash($pass, PASSWORD_DEFAULT);
			
			$check_query = "SELECT * FROM login WHERE username = '$username' OR email = '$email'";
				

			if ($result=mysqli_query($conn,$check_query)) {
					$rowcount=mysqli_num_rows($result);
					  if($rowcount > 0)
					  {
							$message .= '<p><label>* Username or Email ID already exixts</label></p>';
					   
					  }
					  else
					  {
							$query="INSERT INTO `login`(name,username,email,password, dob, present_position, past_position, bsc_course, bsc_year, msc_course, msc_year, phd_course, phd_year, past_affiliation, awards, current_activity, past_activity, junior) VALUES ('$name','$username','$email','$password','$dob','$position','$affiliation','$bsc_course','$bsc_year','$msc_course','$msc_year','$phd_course','$phd_year','$past_affiliation','$distinction','$current_activity','$past_activity','$junior')"; 
							$conn = mysqli_connect('localhost','root','','chat');
							if(mysqli_query($conn,$query))
							{
								echo"<script>alert('Registration Sucessful')</script>";
								header( "Location: login.php" );
							}
							else
							{	
								$message .= '<p><label>* Unknown error occured</label></p>';
							}
					  }
				 }
	
}

//resend OTP
if(isset($_POST['signin']))
{

header( "Location: signup.php" );
}
	}

?>
<html>
<head>

<meta charset="UTF-8">
<title>Signup</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="stylesheet" type="text/css" href="css/animate.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/line-awesome.css">
<link rel="stylesheet" type="text/css" href="css/line-awesome-font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="lib/slick/slick.css">
<link rel="stylesheet" type="text/css" href="lib/slick/slick-theme.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/responsive.css">
</head>


<body class="sign-in">
	<div class="wrapper2">	
		<div class="sign-in-page">
			<div class="signin-popup2">
				<div class="signin-pop2">
					<div class="row">
						<div class="login-sec">
							<div class="sign_in_sec current" id="tab-1">
								<br>
								<h3>Registration</h3>
								<form method="POST"  class="register-form" id="register-form" action="" >
									<div class="col-lg-12 no-pdd">
										<div class="row">
											<div class="col-lg-4">
												<div class="sn-field">
													<input type="text" name="name" placeholder="Full Name">
													<i class="la la-user"></i>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="sn-field">
													<input type="text" name="username" placeholder="Username">
													<i class="la la-globe"></i>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="sn-field">
													<input type="email" name="email" placeholder="E-mail ID">
													<i class="la la-globe"></i>
												</div>
											</div>											
										</div>
									</div>
									<div class="col-lg-12 no-pdd">
										<div class="row">
											<div class="col-lg-4">
												<div class="sn-field">
													<input type="password" name="password" placeholder="Password">
													<i class="la la-user"></i>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="sn-field">
													<input type="date" name="dob" placeholder="Date of Birth">
													<i class="la la-globe"></i>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="sn-field">
													<input type="text" name="position" placeholder="Present Position">
													<i class="la la-globe"></i>
												</div>
											</div>											
										</div>
									</div>
									<div class="col-lg-12 no-pdd">
										<div class="row">
											<div class="col-lg-4">
												<div class="sn-field">
													<input type="text" name="name" value="B.Sc. Completed Course and Year : " style="border:0px; font-size:15px; padding:0px; text-align:center; background-color: #fff; font-weight: bold;" disabled>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="sn-field">
													<select name="bsc_course">
														<option>B.Sc. Course</option>
														<option value="Maths">Maths</option>
														<option value="Computer Science" >Computer Science</option>
														<option value="Physics">Physics</option>
														<option value="Chemistry" >Chemistry</option>
													</select>
													<i class="fa fa-briefcase" aria-hidden="true"></i>
													<span><i class="fa fa-ellipsis-h"></i></span>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="sn-field">
													<select name="bsc_year">
														<option>B.Sc. Year</option>
														<option value="2021">2021</option>
														<option value="2020" >2020</option>
														 <option value="2019">2019</option>
														<option value="2018" >2018</option>
														 <option value="2017">2017</option>
														<option value="2016" >2016</option>
													</select>
													<i class="fa fa-briefcase" aria-hidden="true"></i>
													<span><i class="fa fa-ellipsis-h"></i></span>
												</div>
											</div>											
										</div>
									</div>
									<div class="col-lg-12 no-pdd">
										<div class="row">
											<div class="col-lg-4">
												<div class="sn-field">
													<input type="text" name="name" value="M.Sc. Completed Course and Year : " style="border:0px; font-size:15px; padding:0px; text-align:center; background-color: #fff;  font-weight: bold;" disabled>				
												</div>
											</div>
											<div class="col-lg-4">
												<div class="sn-field">
													<select name="msc_course">
														<option>M.Sc. Course</option>
														<option value="Maths">Maths</option>
														<option value="Computer Science" >Computer Science</option>
														<option value="Physics">Physics</option>
														<option value="Chemistry" >Chemistry</option>
													</select>
													<i class="fa fa-briefcase" aria-hidden="true"></i>
													<span><i class="fa fa-ellipsis-h"></i></span>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="sn-field">
													<select name="msc_year">
														<option>M.Sc. Year</option>
														<option value="2021">2021</option>
														<option value="2020" >2020</option>
														 <option value="2019">2019</option>
														<option value="2018" >2018</option>
														 <option value="2017">2017</option>
														<option value="2016" >2016</option>
													</select>
													<i class="fa fa-briefcase" aria-hidden="true"></i>
													<span><i class="fa fa-ellipsis-h"></i></span>
												</div>
											</div>											
										</div>
									</div>
									<div class="col-lg-12 no-pdd">
										<div class="row">
											<div class="col-lg-4">
												<div class="sn-field">
													<input type="text" name="name" value="Ph.D. Completed Course and Year : " style="border:0px; font-size:15px; padding:0px; text-align:center; background-color: #fff;  font-weight: bold;" disabled>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="sn-field">
													<select name="phd_course">
														<option>Ph.D. Course</option>
														<option value="Maths">Maths</option>
														<option value="Computer Science" >Computer Science</option>
														<option value="Physics">Physics</option>
														<option value="Chemistry" >Chemistry</option>
													</select>
													<i class="fa fa-briefcase" aria-hidden="true"></i>
													<span><i class="fa fa-ellipsis-h"></i></span>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="sn-field">
													<select name="phd_year">
														<option>Ph.D. Year</option>
														<option value="2021">2021</option>
														<option value="2020" >2020</option>
														 <option value="2019">2019</option>
														<option value="2018" >2018</option>
														 <option value="2017">2017</option>
														<option value="2016" >2016</option>
													</select>
													<i class="fa fa-briefcase" aria-hidden="true"></i>
													<span><i class="fa fa-ellipsis-h"></i></span>
												</div>
											</div>											
										</div>
									</div>
									<div class="col-lg-12 no-pdd">
										<div class="row">
											<div class="col-lg-4">
												<div class="sn-field">
													<input type="text" name="affiliation" placeholder="Present affiliation">
													<i class="la la-user"></i>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="sn-field">
													<input type="text" name="past_affiliation" placeholder="Past affiliations/assignments (only 10 most important in bullets)">
													<i class="la la-user"></i>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="sn-field">
													<input type="text" name="distinction" placeholder="Distinctions, recognitions and awards (only 10 important in bullets)">
													<i class="la la-globe"></i>
												</div>
											</div>											
										</div>
									</div>
									<div class="col-lg-12 no-pdd">
										<div class="row">
											<div class="col-lg-4">
												<div class="sn-field">
													<textarea name="current_activity" type="text" id="current" class="form-control" placeholder="Current Activity ( about 100 words )" style="font-size: 14px;"></textarea> 
												</div>
											</div>
											<div class="col-lg-4">
												<div class="sn-field">
													<textarea name="past_activity" type="text" id="past"  class="form-control" placeholder="Past Activity ( about 100 words )" style="font-size: 14px;"></textarea> 
												</div>
											</div>
											<div class="col-lg-4">
												<div class="sn-field">
													<textarea name="junior" type="text" id="junior" class="form-control" placeholder="Junior Names and Email who are alumni of BHU (Separated by comma)" style="font-size: 14px;"></textarea> 
												</div>
											</div>											
										</div>
											<center><span" ><?php echo $message; ?></span>
													<button type="submit" value="signup" class="signup" name="signup" id="signup" type="signup">Submit</button>
												</center>								
										
									</div>
								
								</form>
							</div>
						</div>					
					</div>		
				</div>
			</div>
		</div>
	</div>



<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="lib/slick/slick.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>
