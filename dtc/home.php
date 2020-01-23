<?php
//session 
session_start();
$msg="";
include('config.php');
include('fun.php');
if( !(isset($_SESSION['userwaliID']))){
	header('Location: index.php');
}
if(isset($_POST['uplbtn'])){
	$name=$_FILES['pic']['name'];
	$type=$_FILES['pic']['type'];
	$tmp_name=$_FILES['pic']['tmp_name'];
	$error=$_FILES['pic']['error'];
	$size=$_FILES['pic']['size'];
	$ext=explode('.',$name);
	$ext=strtolower(end($ext)); 
	$allowedExt=array('pdf','PDF');
	$name=$class=$tcno=$tclink="";
	/* pdf details */
	$name = test_input($_POST["name"]);
	$class = test_input($_POST["class"]);
	$tcno = test_input($_POST["tcno"]);
	$tclink="img/".time().$name;
	if(in_array($ext, $allowedExt)){
		if($error<1){
			if(($size/1024)<300){
				
				if(move_uploaded_file($tmp_name,$tclink)){
					$sql = "INSERT INTO data(`srno`, `name`, `class`, `tcno`, `tclink`) VALUES ('$name', '$class', '$tcno', '$tclink')";
					if(mysqli_query($conn,$sql)){
						$msg="successfully Uploaded";
						}
				}else{
					echo "error occured";
				}
			}else{
				echo "file size should be less than 300KB";
			}
		}
		else{
			echo "server error";
		}
	  }
	else{
		//echo "File  type is invalid or File Not Selected";
		$msg="1";	
	}
}
if(isset($_POST['log'])){
session_destroy();
header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>TC Upload SECTION</title>
	<link rel="icon" href="http://sardarpatelhamirpur.com/wp-content/uploads/2020/01/spslogo3.png" type="image/gif" sizes="16x16">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container" style="    border-radius: 10px 10px 10px 10px;
    -moz-border-radius: 10px 10px 10px 10px;
    -webkit-border-radius: 10px 10px 10px 10px;
    border: 0px solid #000000;
    padding: 10px;
    border: 1px solid blue;">
<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
    <label for="exampleFormControlFile1">Upload TC (Only pdf format accepted) </label>
    <label style="float: right;" for="exampleFormControlFile1"><a href="downloadtc.php" type="submit" class="btn btn-warning">Download TC</a>&nbsp;<button type="submit" class="btn btn-primary" onclick="" name="log">Logout</button></label>
    <input type="file" class="form-control-file" id="pic" name="pic" accept="pdf">
  	</div>
  	<?php if($msg==1){ ?>
  	<div class="input-group mb-0">
		<div class="alert alert-danger">
		  <strong>Oops!</strong> Name/Sr.no or Class is Incorrect. Only Upload Pdf
		</div>
	</div>
		<?php } ?>
  	<div class="form-group">
    <label for="exampleInputEmail1">Student Name</label>
    <input type="text" class="form-control" id="" name="name" placeholder="Enter Student Name" >
  </div>
  	<div class="form-group">
    <label for="exampleInputPassword1">Student Class</label>
    <input type="text" class="form-control" id="" name="class" placeholder="Enter Student Class" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Student TC Serial No.</label>
    <input type="text" class="form-control" id="" name="tcno" placeholder="Enter TC Serial No.">
  </div>
  <button type="submit" class="btn btn-success" name="uplbtn">Submit</button>
</form>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>