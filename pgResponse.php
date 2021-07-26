<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
session_start();
$conn = mysqli_connect('localhost','root','','chat');
    if ($conn->connect_error)
    {
    die("Connection failed: " . $conn->connect_error);
    }
else
{

require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : "";


$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum);


if($isValidChecksum == "TRUE") {
	
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		$name=$_POST['name'];
		$orderid=$_POST['ORDERID'];
		$txnid=$_POST['TXNID'];
		$date=$_POST['TXNDATE'];
		$status=$_POST['STATUS'];
		$amount=$_POST['TXNAMOUNT'];
		$query="INSERT INTO paid (`orderid`, `txnid`, `date`, `status`, `amount`) VALUES ('$orderid','$txnid','$date','$status','$amount')";
		
	if(mysqli_query($conn,$query))
		{
           
		   
			?>
<html>

<head>
<title>Responce</title>
<meta name="GENERATOR" content="Evrsoft First Page">
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
	

	<div class="wrapper">
		

		<div class="sign-in-page">
			<div class="signin-popup">
				<div class="signin-pop">
					<div class="row">
						
						<div class="col-lg-6">
							<div class="login-sec">
								<div class="sign_in_sec current" id="tab-1">
									<br><br><br><br>
									<h3>Receipt</h3>
									<form method="POST" class="register-form" id="register-form"  >
										<div class="row">
										<br><br><br>
											
											<div class="row">
											
												<table>
												<tr>
												<div class="col-lg-12 no-pdd">
												<td><input  type="text" value="ORDERID"></td>
												<td><input type="text" value="<?php echo $orderid;?>">	</td>
												</div>
												</tr>
												<tr>
												<div class="col-lg-12 no-pdd">
												<td><input  type="text" value="Transaction"></td>
												<td><input type="text" value="<?php echo $txnid;?>">	</td>
												</div>
												</tr>
												<tr>
												<div class="col-lg-12 no-pdd">
												<td><input  type="text" value="DATE"></td>
												<td><input type="text" value="<?php echo $date;?>">	</td>
												</div>
												</tr>
												<tr>
												<div class="col-lg-12 no-pdd">
												<td><input  type="text" value="STATUS"></td>
												<td><input type="text" value="<?php echo $status;?>">	</td>
												</div>
												</tr>
												<tr>
												<div class="col-lg-12 no-pdd">
												<td><input  type="text" value="AMOUNT"></td>
												<td><input type="text" value="<?php echo $amount;?>">	</td>
												</div>
												</tr>
												</table>
												<div class="col-lg-12 no-pdd">
													<button value="Print This Page" type="submit"	onclick="window.print()" class="signup"  >Print</button>
													<a href="post_payment.php"  class="signup" >Cancel</a>
												
												</div>
											</div>
										</form>
									
									
								</div>		
							</div><!--login-sec end-->
						</div>
					</div>		
				</div><!--signin-pop end-->
			</div><!--signin-popup end-->
		</div><!--sign-in-page end-->


	</div><!--theme-layout end-->



<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="lib/slick/slick.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>
<?php
			
		}

	}
	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
	}
}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}
}
?>
