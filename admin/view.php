


<!DOCTYPE html>
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
				<a class="navbar-brand" href="#"><span>UNITEN </span>EVENT REGISTERATION</a>
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
			<li><a href="index.html"><em class="fa fa-home">&nbsp;</em> Admin Dashboard</a></li>
			<li class="active"><a href="manageusr.html"><em class="fa fa-users">&nbsp;</em> Manage users</a></li>
			<li><a href="login.html"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
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

		<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">VIEW</div>
					<div class="panel-body">
              <?php
              echo "<table border=border>
                <thead>
                  <tr>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Name</th>
                  <th>Student ID</th>
                  <th>Contact</th>
                  <th>Medical Issues</th>
                  <th>Address</th>
                  <th>Kelompok</th>
                  <th>User ID</th>
                  </tr>
                </thead>";
                $con=mysqli_connect("localhost","root","","marathon");
                $search="SELECT * FROM participants";
                $query=mysqli_query($con,$search);
                  while($arr=mysqli_fetch_array($query,MYSQL_NUM)){
                      $usrname=$arr[0];
                      $email=$arr[1];
                      $name=$arr[3];
                      $stuID=$arr[4];
                      $contact=$arr[5];
                      $mIssues=$arr[6];
                      $address=$arr[7];
                      $kelompok=$arr[8];
                      $parID=$arr[9];



                echo "<tr><th>$usrname</th><th>$email</th><th>$name</th><th>$stuID</th><th>$contact</th><th>$mIssues</th>
                <th>$address</th><th>$kelompok</th><th>$parID</th></tr>";
              }
              echo "</table>";
             ?>




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
