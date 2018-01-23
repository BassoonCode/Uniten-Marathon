


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
					<div class="panel-heading">UPDATE</div>
					<div class="panel-body">

            <?php

                $updatename=$_POST["update"];
                $con=mysqli_connect("localhost","root","","marathon");
                $view="SELECT * FROM participants WHERE participantID='$updatename'";
                $query=mysqli_query($con,$view);
                $arr=mysqli_fetch_array($query,MYSQL_NUM);
               ?>
               <form class="" action="update2.php" method="post">
                <p>User ID: <input type="text" name="ntoupdate" value="<?php echo "$updatename";?>"></p><br/>
                 <input name="uusrname" type="text" value="<?php echo "$arr[0]";?>"></input>
                 <input name="uemail" type="text" value="<?php echo "$arr[1]";?>"></input>
                 <input name="upass" type="text" value="<?php echo "$arr[2]";?>"></input>
                 <input name="uname" type="text" value="<?php echo "$arr[3]";?>"></input>
                 <input name="ustuID" type="text" value="<?php echo "$arr[4]";?>"></input>
                 <input name="ucontact" type="text" value="<?php echo "$arr[5]";?>"></input>
                 <input name="umedical" type="text" value="<?php echo "$arr[6]";?>"></input>
                 <input name="uadd" type="text" value="<?php echo "$arr[7]";?>"></input>
                 <input name="ukelo" type="text" value="<?php echo "$arr[8]";?>"></input>
                 <input name="upartID" type="text" value="<?php echo "$arr[9]";?>"></input>

               <br/>
               <input type="submit" name="submit" value="submit"></input>
               </form>


					</div>
				</div>
			</div>



			<div class="col-sm-12">
				<p class="back-link">Lumino Theme by <a href="https://www.medialoot.com">Medialoot</a></p>
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
