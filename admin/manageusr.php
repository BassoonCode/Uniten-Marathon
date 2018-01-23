<!DOCTYPE html>
<?php
error_reporting(0);
include('../config/config.php');
session_start();
if(!isset($_SESSION['admin']))

{
	header("Location:login.php?err=expired");
}

//search

	


?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Dashboard</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">

	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>

<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="index.php"><span>UNITEN </span>EVENT REGISTERATION</a>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-usertitle">
			</div>
			<div class="clear"></div>
		</div>
		</form>
		<ul class="nav menu">
			<li><a href="index.php"><em class="fa fa-home">&nbsp;</em> Admin Dashboard</a></li>
			<li class="active"><a href="manageusr.php"><em class="fa fa-users">&nbsp;</em> Manage users</a></li>
			<li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Main Event</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Search Engine</h1>
			</div>
		</div><!--/.row-->
<!--/.view-->

<div class="col-md-12">
	<div class="panel panel-primary">
		<div class="panel-heading">User Management</div>
					<div class="panel-body">
					<form method="post">
					<label>Search User</label>
					<div class="form-group">
						<input type="text" class="form-control input-sm" placeholder="Enter participant ID" name="src" /></br>
						<button class="btn btn-primary" type="submit" name="search">Search</button>
					</div>
					</form>
					<?php


						if(isset($_POST['search']))
						{
							$srch=$_POST["src"];
							if(empty($srch))
							{
								$search = "SELECT * FROM participants";
							}
							else
							{
								$search="SELECT * FROM participants where participantID='$srch' OR studentID = '$srch' ";
							}
							$con=mysqli_connect("localhost","root","","marathon");
							
							$query=mysqli_query($con,$search);

?>
					<table class="table table-bordered">
						<thead>
							<tr>
							<th>Participant ID</th>
							<th>Student ID</th>
							<th>Username</th>
							<th>Email</th>
							<th>Time Registered</th>
							<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php

								while($arr=mysqli_fetch_array($query,MYSQL_ASSOC)){
								$usrname=$arr['username'];
								$email=$arr['email'];
								$name=$arr['name'];
								$stuID=$arr['studentID'];
								$contact=$arr[5];
								$mIssues=$arr[6];
								$address=$arr[7];
								$tme = $arr['time_registered'];
								$kelompok=$arr[8];
								$parID=$arr['participantID'];
							
								?>
	
							
							<tr>
								<th><?php echo $parID ?></th>
								<th><?php echo $stuID ?></th>
								<th><?php echo $usrname ?></th>
								<th><?php echo $email ?></th>
								<th><?php echo $tme ?></th>
								<th>
<a href="viewprofile.php?id=<?php echo $parID ?>" class="btn btn-primary">View Profile</a>&nbsp;</th>
							</tr>
							<?php }
						}

					?>
						</tbody>
						

					</table>
						
					</div>
				</div>
			</div>
			

		</div><!--/.row-->
	</div>	<!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
	</script>

</body>
</html>
