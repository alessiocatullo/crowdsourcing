<!--INDEX PAGE-->
<?php
	include('../php/login.php'); // Includes Login Script
	
	/*
	if(isset($_SESSION["login_user"])){
		session_start();
		header("location: home.php");
	}*/

?>
<!DOCTYPE html>
<html>
	<head>
		<!--REFERENCES-->
		<link href="../css/base.css" rel="stylesheet">
		<!--TITLE-->
   		<title>Login | Crowdsourcing </title>
	</head>
	<body>
		<div class="container">
		        <span>
		        	<h1 class="title">CROWDSOURCING</h1>
		        </span>
		        <!--BEGIN DIV FORM-->
		        <div class="form-card">
		        	<form method="post" action="">
		        		<h2 class="form-text title">LOGIN</h2>
		        		<p>
		        			<p>
			        			<!--MAIL-->
			        			<p>
	                				<a for="inputMail" class="form-text">Email</a>
				            		<input type="email" name="inputMail" id="inputMail" Placeholder="esempio@dominio.com" required autofocus>
				            	</p>
				            	<!--PASSWORD-->
				            	<p>
		             		    	<a for="inputPassword" class="form-text">Password</a>
					            	<input type="password" name="inputPassword" id="inputPassword" Placeholder="Password" required>
					            </p>
			            	</p>
			            	<p class="form-err" style="background: <?php echo $bgcolor; ?>; color:<?php echo $color; ?>; " <?php echo $hidden; ?>>
                				<a><strong><?php echo $error; ?></strong></a> 
              				</p>
			            	<center>
				           		<!--PASSWORD DIMENTICATA-->
				           		<p style="-webkit-margin-before: 0px; -webkit-margin-after: 0px;">
	                				<a class="form-text-2nd" href="lostPassw.php">Password dimenticata?</a>
				            	</p>
				            	<!--REGISTRATI-->
	                			<p style="-webkit-margin-before: 0px; -webkit-margin-after: 0px;">
	                				<a class="form-text-2nd" href="register.php">Registrati</a>
	                			</p>
                			</center>
                		</p>
                		<!--ACCEDI-->
                  		<input class="form-btn" name="login" type="submit" value="Accedi">
		        	</form>
		        </div>
		        <!--END DIV FORM-->
		</div>
	</body>
</html>