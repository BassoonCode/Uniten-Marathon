<!DOCTYPE html>
<?php
error_reporting(0);
include("../config/config.php");
session_start();
if(!isset($_SESSION['admin'])){
  header("Location:login.php?err=expired");
}

$userget = $_GET['id'];

//$id = $_SESSION['ID'];
$username = $_SESSION['name'];
$uid = $_SESSION['id'];

$sql = "SELECT * FROM participants where participantID = '$userget'";
$go = mysqli_query($con,$sql);	
$data = mysqli_fetch_array($go,MYSQL_BOTH);
$uname =  $data['username'];
$stuID = $data['studentID'];
$email = $data['email'];
$ctct = $data['contact'];
$medas = $data['medical_issues'];
$addr = $data['address'];
$parID=$data['participantID'];

if(isset($_POST['update']))
{
	//$stuID = $_POST['id'];
	$uname = $_POST['name'];
	$stuID = $_POST['id'];
	$addr = $_POST['addr'];
	$med = $_POST['med'];
	$ctct = $_POST['contact'];
	$email = $_POST['email'];
	$klom = $_POST['optionsRadios'];

	$qr2 = "UPDATE participants SET username ='$uname' 
			, studentID = '$stuID' , email = '$email',
			medical_issues = '$med', address = '$addr',
			contact = '$ctct' , kelompok = '$klom' WHERE
			studentID = '$stuID'";
	$go = mysqli_query($con,$qr2);
	
	if($go)
	{
		echo "<script>alert('UPDATED');</script>";
	}
	else
	{
			echo "Unable to connect to database".mysqli_error($go);
	}

}

if(isset($_POST['delete']))
{

	$stuID = $_POST['id'];
	$qrw2 = "DELETE FROM participants WHERE studentID='$stuID'";
	$go = mysqli_query($con,$qrw2);

	if($go)
	{
		echo "<script>alert('Deleted');</script>";
		header("Location:manageusr.php");
	}
	else
	{
		echo "ERROR ".mysqli_error($go);
	}	

}


?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile Update</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>Uniten </span>Event Registration</a>
			
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
			</div>
			<div class="profile-usertitle">
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<form role="search">
			<div class="form-group">
			</div>
		</form>
		<ul class="nav menu">
			<li><a href="index.php"><em class="fa fa-home">&nbsp;</em> Admin Dashboard</a></li>
			<li class="active"><a href="manageusr.php"><em class="fa fa-users">&nbsp;</em> Manage users</a></li>
			<li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
			
				</ul>
			</li>
			<li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Profile Update</li>
			</ol>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Profile Update</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">			
				<div class="panel panel-default">
					<div class="panel-heading">Profile</div>
					<div class="panel-body">
						<div class="col-md-6">
							<form role="form" method="post" action="viewprofile.php">
								<div class="form-group">
									<label>Name</label>
									<input type="text" class="form-control" name="name" value="<?php echo $uname ?>" >
								</div>
								<div class="form-group">
									<label>Student ID</label>
									<input type="text" class="form-control" name="id" value="<?php echo $stuID ?>" >
								</div>
								
								<!--<div class="form-group checkbox">
									<label>
										<input type="checkbox">Remember me
									</label>
								</div>
								<div class="form-group">
									<label>File input</label>
									<input type="file">
									<p class="help-block">Example block-level help text here.</p>
								</div>-->
								<label>Address</label>
								<div class="form-group has-success">
									<textarea class="form-control" rows="3" name="addr"><?php echo $addr ?></textarea>
									
								</div>

									<div class="form-group has-success">
									<label>Medical Issues (if any)</label>
									<textarea class="form-control" rows="3" name="med"><?php echo $medas ?></textarea>
								</div>

								</div>
							<div class="col-md-6">
								
								
								
									<div class="form-group">
									<label>Contact</label>
									<input type="text" class="form-control" name="contact" value="<?php echo $ctct ?>" >
								</div>
								<div class="form-group">
									<label>Email</label>
									<input type="text" class="form-control" name="email" value="<?php echo $email ?>" >
								</div>
									
									<div class="form-group">
										<label>Kelompok</label>
										<div class="radio">
											<label>
												<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>Amanah
											</label>
										</div>
										<div class="radio">
											<label>
												<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Cendikiawan
											</label>
										</div>
										<div class="radio">
											<label>
												<input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">Murni
											</label>
										</div>
										<div class="radio">
											<label>
												<input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">Ilmu
											</label>
										</div>
									</div>
									
									
									<button type="submit" class="btn btn-primary" name='update' onclick="return confirm('Are you sure to update ??');">Update user</button>
									<button  class="btn btn-danger" name='delete' onclick="return confirm('Are you sure?');">Delete user</button>
									<button type="reset" class="btn btn-default">Cancel</button>
								</div>
							</form>
						</div>
					</div>
				</div><!-- /.panel-->
			</div><!-- /.col-->
		
		
				
		
		
	
		<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	
</body>
</html>
