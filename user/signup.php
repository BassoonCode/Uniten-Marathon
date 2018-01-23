<!DOCTYPE html>
<?php

include('../config/config.php');

if(isset($_POST['signup']))
{       
        $username = @$_POST["username"];
        $email = @$_POST["email"];
        $password = @$_POST["password"];
		$stuid = $_POST['stuid'];
       
        $sql = "SELECT * FROM participants WHERE username = '$username'";
        $result = mysqli_query($con, $sql);
        //$part = mysqli_fetch_assoc($result);

        if ($result)
        {
			$chk = mysqli_num_rows($result);
			if($chk == 1)
			{
				echo "<script>alert('USERNAME NOT AVAILABLE')</script>";
			}
			else
			{
				$sql = "INSERT INTO participants (username, email, password , studentID)
                    VALUES ('$username', '$email', '$password' ,'$stuid')";
                    
                    if (mysqli_query($con, $sql))
                    {
                        ?>
                        <script>
                        alert('Registration successful! you may proceed to login now. TQ.');
                        </script>
                        <?php
                        header('Location: http://erykayoda/web/user/succeedPage.php');
                    }
                    else
                    {
                        echo "Error: " . $sql . "<br>" . mysqli_error($con);
                    }
			}
            
        }
        else
        {
            ?>
            <script>
            alert('Sorry, an account with Student ID <b><?php echo "".$_POST["stud_id"]."" ?></b> already exist.');
            </script>
            <?php
            header('Location: http://erykayoda/web/user/signup.php');
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
				<div class="panel-heading">New user Registration</div>
				<div class="panel-body">
					<form role="form" method="POST" action="" onsubmit="return check()">
						<fieldset>
						<div class="form-group">
								<input class="form-control" placeholder="username" name="username" type="text" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Student ID" name="stuid" type="text" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="" id = "p1">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Retype Password" name="password1" type="password" value="" id="p2">
							</div>
						
								
							<input type="submit" class="btn btn-primary" name="signup"></input>
						<!--	<a href="index.php" class="btn btn-primary">Sign Me Up !!!</a> -->
							</fieldset>
						</div>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->


<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
	function check()
	{
		var a = $('#p1').val();
		var b = $('#p2').val();
		if(a == b)
		{
			return true;
		}
		else{
			alert("PASSWORD NOT MATCH");
			return false;
		}
	}
		
	</script>
</body>
</html>
	