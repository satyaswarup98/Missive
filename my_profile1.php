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
<title>Profile</title>
<style>
table{
  border: 1px solid black;
}
html {
  scroll-behavior: smooth;
}


</style>
 <?php
		include('head_links1.php');
		?>
</head>
<body>
	<div class="wrapper">	
		<?php
		include('header.php');
		include('fetch_profile.php');
		?>
		<section class="cover-sec">
			
			
									
										
										<form method="post" action="" enctype="multipart/form-data">
											
									
										 <table>
											
											<tr><td>	
								 
										<table>
								 <tr><td>
								 
								 </td></tr>
								
								 <tr> <td>
								           <?php
									$qry = "SELECT images FROM tbl_images where `username`= '$username';";
									$con = mysqli_connect('localhost','root','','chat');
									$run= mysqli_query($con,$qry);
			                         if($run == true)
									{
									?>
										<div class="posts-section">
										<div class="post-bar">
											
										
											<div class="job_descp">
												
												 <br> <img src="cover/<?php echo $row['images']; ?>"  height="200" width="1600" alt="" /> 
												 
												
											</div>
											
										
										   <input type="file" name="insert_image" id="insert_image" accept="image/*" />
										 
										   <label for="insert_image">
										   <i style=" margin-bottom:0px; height="100" width="1600"" class="fa fa-camera"></i>
										   </label>

									
											
									
									<?php
									}
									?>
										   

										   </div>
					                    </td></tr> </table>
										</td></tr> </table>
					                     
											
											
										</form>
									</div>
		</section>	
		<main>
			<div class="main-section">
				<div style="width:80%; padding-left:5%">
					<div class="main-section-data">
						<div class="row">
							<div class="col-lg-3">
								<div class="main-left-sidebar">
									<div class="user_profile">
										<div class="post_comment_sec">
										
										<form method="post" action="askq.php" enctype="multipart/form-data">
											
									
										 <table>
											<tr><td>
												
																		 
											</td></tr>
											<tr><td>	
								 <table>
								 <tr><td>
								 
								 </td></tr>
								
								 <tr> <td>
								          
										  <div class="image-upload" style="padding-left:20px;" >
										
										   <label for="file-input1">
										   <i style=" margin-top:11px;" class="fa fa-camera"></i>
										   </label>
										   <input type="file" name="file" id="file-input1" onchange="readURL1(this);" style="display:none;" >
										   

										   </div>
					                    </td></tr> </table>
										<table>
								 <tr><td>
								 
								 </td></tr>
								
								 <tr> <td>
								           <?php
									$qry = "SELECT img FROM login where `username`= '$username';";
									$con = mysqli_connect('localhost','root','','chat');
									$run= mysqli_query($con,$qry);
			                         if($run == true)
									{
									?>
										<div class="posts-section">
										<div class="post-bar">
											
										
											<div class="job_descp">
												
												 <br><img src="events/<?php echo $row['img']; ?>" style="max-width:100%;" alt="hgh" /> 
												 
												
											</div>
											
										</div><!--post-bar end-->										
										</div><!--posts-section end-->
									<?php
									}
									?>
										   

										   </div>
					                    </td></tr> </table>
										</td></tr> </table>
					                     
											
											
										</form>
									</div>
										<div class="suggestion-usd">
										<table>
										    <tr> 
											<td>
											<div class="sgt-text">
											<h4>GENDER : <?php echo $row['gender']; ?></h4> 
											</div>
											</td>
											</tr>
											<br>
											<tr>
											<td>
											<div class="sgt-text">
											<h4>DOB : <?php echo $row['dob']; ?></h4> 
											</div>
											</td>
                                            </tr>
											<br>
											<tr> 
											<td>
											<div class="sgt-text">
											<h4>LOCATION : <?php echo $row['curr_loc']; ?></h4>
											</div>
                                            </td>
											</tr>
											<br>
											<tr> 
											<td>
											<div class="sgt-text">
											<h4>MOBILE : <?php echo $row['mobile']; ?></h4><br>
											</div>
											</td>
											</tr>
											<br>
											<tr> 
											<td>
											<div class="sgt-text">
												<ul class="job-dt"><?php $str_arr = explode (",", $row['skill']);
													$l=0;
													while($l<sizeof($str_arr)){ ?>
														<li><a href="#" title=""><?php print_r($str_arr[$l]); ?></a></li>
												<?php $l=$l+1;}?>
												</ul>
											</div>
											 </td>
											</tr>
											
										</table>
										
										<div class="post-topbar">
										
										<div class="post-st">
											<ul>
												<li><a class="post-jb active" href="#" title="">Update Profile</a></li>
												<li><a href="#" title="" class="ask-question">Ask a question</a></li>
											</ul>
										</div><!--post-st end-->
									    </div>
										</div>
									</div>									
								</div>
							</div>
							
							<div class="col-lg-6" id="section1">
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

                              
									
								<div class="posts-section">
									  <div class="post-bar">
							    <div class="post_topbar">
								<div class="usy-dt">
													<img src="images/user_small.png" alt="">
													
													<div class="usy-name">
														<h3><?php echo $_SESSION['username'];  ?></h3><br><br><br>
														
													</div>
												</div>
	
									<div class="post_comment_sec">
										<form method="post" action="askq.php" enctype="multipart/form-data">
											
											<textarea name="describe" type="text" id="inputEmail" class="form-control" placeholder="Post any events here ..." ></textarea> 
                                 <table>
								
								 <tr> <td>
								 <button type="submit" name="upload" class="save">Post Event</button></td><td>
										  <div class="image-upload" style="padding-left:20px;" >
										   <label for="file-input">
										   <i style=" margin-top:11px;" class="fa fa-camera"></i>
										   </label>
										   <input type="file" name="file" id="file-input" style="display:none;" >
										   </div>
					                    </td></tr> </table>
					                     
											
											
										</form>
									</div><!--post_comment_sec end-->
								</div>
								</div>
								</div>
								
							
							
						
									
							    <div class="posts-section">

<?php
$query = "SELECT * FROM events where confirm=1;";
$statement = $connect->prepare($query);
	$statement->execute();
$result=$statement->fetchAll();
foreach($result as $row)
{
?>	
	<div class="post-bar">
		<div class="post_topbar">
			<div class="usy-dt">
				<img src="images/user_small.png" alt="">
				<div class="usy-name">
					<h3>John Doe</h3>
					<span><?php echo $row["time"]; ?></span>
				</div>
			</div>
		
		</div>
	
		<div class="job_descp">
			
			
			<p><?php echo $row["describe"]; ?></p>
			 <img src="images/<?php echo $row['image']; ?>" style="max-width:1000px;" alt="" /> 
			 
			
		</div>
		
	</div><!--post-bar end-->										
	<!--posts-section end-->
<?php
}
?>

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
		
		</main>
		
		
		<div class="post-popup job_post">
			<div class="post-project">
				<h3>Update Detail</h3>
				<div class="post-project-fields">
					<form method="post" action="" >
						<div class="row">
							<div class="col-lg-6">
								<input type="date" name="dob" placeholder="dob">
							</div>
							<div class="col-lg-6">
								<input type="text" name="gender" placeholder="gender">
							</div>
							<div class="col-lg-12">
								<input type="text" name="mobile" placeholder="mobile">
							</div>
							
							<div class="col-lg-12">
								<input type="text" name="curr_comp" placeholder="company">
							</div>
							<div class="col-lg-12">
								<input type="text" name="curr_role" placeholder="role">
							</div>
							<div class="col-lg-12">
								<input type="text" name="curr_loc" placeholder="location">
							</div>
							
							<div class="col-lg-12">
								<textarea name="skill" placeholder="skill"></textarea>
							</div>
							
							<div class="col-lg-12">
								<ul>
								    <li><button class="active"  type="submit" value="update" name="update">Save</button></li>
									<li><button  class="ask-question" type="submit" value="post">Skip</button></li>
									<li><button class="active" type="submit" value="post">Cancel</button></li>
									<li><a href="#" title="" class="ask-question">Ask a question</a></li>
								</ul>
							</div>
						</div>
					</form>
				</div><!--post-project-fields end-->
				<a href="#" title=""><i class="la la-times-circle-o"></i></a>
			</div><!--post-project end-->
		</div>
		
		
		
		<div class="overview-box" id="question-box">
			<div class="overview-edit">
				<h3>Ask a Question</h3>
				<form method="post" action="" >
						<div class="row">
							<div class="col-lg-12">
								<input type="text" name="twitter" placeholder="twitter">
							</div>
							<div class="col-lg-12">
								<input type="text" name="fb" placeholder="fb">
							</div>
							<div class="col-lg-12">
								<input type="text" name="linked" placeholder="linked">
							</div>
							<div class="col-lg-12">
								<input type="text" name="github" placeholder="github">
							</div>
									
							<div class="col-lg-12">
								<ul>
									<li><button class="active"  type="submit" value="update1" name="update1">Save</button></li>
									<li><button class="active" type="submit" value="post">Cancel</button></li>
								</ul>
							</div>
						</div>
					</form>
				<a href="#" title="" class="close-box"><i class="la la-close"></i></a>
			</div><!--overview-edit end-->
		</div>
		
		
		
		<?php
            if(isset($_POST['update']))
	        {
			$username=  $_SESSION['username'];	
			$dob= $_POST['dob'];
			$gender= $_POST['gender'];
			$mobile= $_POST['mobile'];
			$curr_comp= $_POST['curr_comp'];
			$curr_role= $_POST['curr_role'];
			$curr_loc= $_POST['curr_loc'];
			$skill= $_POST['skill'];
			
			$con = new mysqli('localhost', 'root', '', 'chat');
			
			$qry="UPDATE `login` SET `dob` ='$dob', `gender`= '$gender', `mobile`= '.$mobile.',`curr_comp`='$curr_comp',`curr_role`='$curr_role',`curr_loc`='$curr_loc' ,`skill`='$skill' WHERE `username`= '$username'  ";
			
			
		
			$run= mysqli_query($con,$qry);
			if($run == true)
			{
				
			}
			else {
	                echo "Error: " . $sql . "<br>" . $conn->error;
	             }
			}
?>


<?php
            if(isset($_POST['update1']))
	        {
			$username=  $_SESSION['username'];	
			$twitter= $_POST['twitter'];
			$fb= $_POST['fb'];
			$linked= $_POST['linked'];
			$github= $_POST['github'];
			
			
			$con = new mysqli('localhost', 'root', '', 'chat');
			
			$qry="UPDATE `login` SET `twitter` ='$twitter', `fb`= '$fb', `linked`= '$linked',`github`='$github' WHERE `username`= '$username'  ";
			
			
		
			$run= mysqli_query($con,$qry);
			if($run == true)
			{
					?>
					<script>
					alert('Data Updated Successfully.');
					
					</script>
			<?php
			}
			else {
	                echo "Error: " . $sql . "<br>" . $conn->error;
	             }
			}
?>			
	</div>
	
</body>
</html>


<div id="insertimageModal" class="modal" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Crop & Insert Image</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-8 text-center">
            <div id="image_demo" style="width:350px; margin-top:30px"></div>
          </div>
          <div class="col-md-4" style="padding-top:30px;">
        <br />
        <br />
        <br/>
            <button class="btn btn-success crop_image">Crop & Insert Image</button>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>  
$(document).ready(function(){

 $image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
      width:200,
      height:200,
      type:'square' //circle
    },
    boundary:{
      width:300,
      height:300
    }    
  });

  $('#insert_image').on('change', function(){
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    $('#insertimageModal').modal('show');
  });

  $('.crop_image').click(function(event){
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
      $.ajax({
        url:'insert.php',
        type:'POST',
        data:{"image":response},
        success:function(data){
          $('#insertimageModal').modal('hide');
          load_images();
          alert(data);
        }
      })
    });
  });

  load_images();

  function load_images()
  {
    $.ajax({
      url:"fetch_images.php",
      success:function(data)
      {
        $('#store_image').html(data);
      }
    })
  }

});  
</script>