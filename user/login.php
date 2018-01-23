<!DOCTYPE html>
<?php

if(isset($_SESSION['username']))
{
	header("Location:index.php");
}

include('../config/config.php');

if(isset($_POST['login']))
{
	$username=$_POST["username"];
    $password=$_POST["password"];

        $ret="select * from participants where username='$username'";
        $ver = mysqli_query($con,$ret);

        if(mysqli_num_rows($ver) == 0)
		{


			echo "<script>alert('Wrong Username Or Password');
   			window.location='login.php'</script>"; 
		}		

        else
        {
			$row = mysqli_fetch_array($ver,MYSQL_BOTH);
            if($row["password"] == $password)
            {
                
                session_start();
                $_SESSION["name"]=$username;
				$_SESSION["id"] = $row["participantID"];
                header('Location:index.php');
               
            }
            else
			{
				echo "<script>alert('Wrong Username Or Password');
   				window.location='login.php'</script>"; 
			}
           
			
		}
}
        
       
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Uniten ERS Login</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
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
				<ul class="nav navbar-top-links navbar-right">

						</ul>
					</li>

				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<br>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-primary">
				<div class="panel-heading">User Login</div>
				<div class="panel-body">
					<form role="form" method="post" action="login.php">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Username" name="username" type="text" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div>
							<input type="submit" class="btn btn-success" value="Log in" name="login">
							<a href="signup.php" class="btn btn-warning">Sign up</a></fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->


<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
