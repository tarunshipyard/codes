<?php 
include('config.php');
include('fun.php');
$numd="-1";
$num="";
if(isset($_POST['dsub'])){
	$lname= test_input($_POST["lname"]);
	$lclass= test_input($_POST["lclass"]);
	$ltc= test_input($_POST["ltc"]);
	$sql = "select * from data where `name`='$lname' AND `class`='$lclass' AND `tcno`='$ltc' ";
	$result=mysqli_query($conn, $sql);
	$num=mysqli_num_rows($result);
	//echo $num;
	if($num==1){
		$row=mysqli_fetch_assoc($result);
		//print_r($row);
	}else{
		$numd="0";
	}	
}
?>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
<link rel="icon" href="http://sardarpatelhamirpur.com/wp-content/uploads/2020/01/spslogo3.png" type="image/gif" sizes="16x16">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
		/* Coded with love by Mutiullah Samim */
		body,
		html {
			margin: 0;
			padding: 0;
			height: 100%;
			background: #60a3bc !important;
		}
		.user_card {
			height: 400px;
			width: 350px;
			margin-top: auto;
			margin-bottom: auto;
			background: #f39c12;
			position: relative;
			display: flex;
			justify-content: center;
			flex-direction: column;
			padding: 10px;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			-webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			-moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			border-radius: 5px;

		}
		.brand_logo_container {
			position: absolute;
			height: 170px;
			width: 170px;
			top: -75px;
			border-radius: 50%;
			background: #60a3bc;
			padding: 10px;
			text-align: center;
		}
		.brand_logo {
			height: 150px;
			width: 150px;
			border-radius: 50%;
			border: 2px solid white;
		}
		.form_container {
			margin-top: 100px;
		}
		.login_btn {
			width: 100%;
			background: #c0392b !important;
			color: white !important;
		}
		.login_btn:focus {
			box-shadow: none !important;
			outline: 0px !important;
		}
		.login_container {
			padding: 0 2rem;
		}
		.input-group-text {
			background: #c0392b !important;
			color: white !important;
			border: 0 !important;
			border-radius: 0.25rem 0 0 0.25rem !important;
		}
		.input_user,
		.input_pass:focus {
			box-shadow: none !important;
			outline: 0px !important;
		}
		.custom-checkbox .custom-control-input:checked~.custom-control-label::before {
			background-color: #c0392b !important;
		}
</style>
<!DOCTYPE html>
<html>
    
<head>
	<title>Download TC</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
</head>
<body>
	<div class="container h-100 cont" style="">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center" >
					<div class="brand_logo_container">
						<img src="http://sardarpatelhamirpur.com/wp-content/uploads/2020/01/spslogo-w-1.png" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container" style="">
					<form id="login-form" action="" method="post" role="form" style="display: block;">
						<?php if($numd==0){ ?>
						<div class="input-group mb-0">
						<div class="alert alert-danger">
						  <strong>Oops!</strong> Name/Sr.no or Class is Incorrect.
						</div>
						</div>
						<?php } ?>
						<h3 id='msg' class="text-blue mb-1" style="font-weight: 600; text-align: center;">Download TC</h3>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="lname" class="form-control input_user" value="" placeholder="Enter Student Name">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="text" name="lclass" class="form-control input_pass" value="" placeholder="Enter Student Class">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="text" name="ltc" class="form-control input_pass" value="" placeholder="Enter TC serial No.">
						</div>
						<div class="d-flex justify-content-center mt-3 login_container">
						 	<input type="submit" name="dsub">
						</div>
				   		<?php if($num==1){ ?>
						<div class="d-flex justify-content-center mt-3 login_container"> 
							<a href="download.php?file=<?php echo $row['tclink']?>" target="_blank" class="bg-blue" style="padding: 5px; background: white;">Download TC</a>
						</div>
					  <?php } ?>
					  					  <!-- <div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text">Student Name/Class/Tc No. is incorrect<i class="fas fa-user"></i></span>
							</div>
						</div> -->
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
