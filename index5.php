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
        <title>Image Crop and Save into Database using PHP with Ajax</title>  
  <?php
		include('head_links1.php');
		?>
    </head>


	
    <body>  
        <div class="container">
		<?php
		include('header.php');
		include('fetch_profile.php');
		?>
          <br />
      <h3 align="center">Image Crop and Save into Database using PHP with Ajax</h3>
      <br />
      <br />
   <div class="panel panel-default">
      <div class="panel-heading">Select Profile Image</div>
      <div class="panel-body" align="center">
       <input type="file" name="insert_image" id="insert_image" accept="image/*" />
	   
										   <label for="insert_image">
										   <i style=" margin-bottom:0px; height="100" width="1600"" class="fa fa-camera"></i>
										   </label>
       <br />
       <div id="store_image"></div>
      </div>
     </div>
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