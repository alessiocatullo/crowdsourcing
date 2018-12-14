<!--LOGIN PAGE ERR-->
<?php
	include('../../php/lostPassw.php'); 
?>

<!DOCTYPE html>
<html>
	<head>
		<!--REFERENCES-->
		<link href="../../css/base.css" rel="stylesheet">
		<!--TITLE-->
   		<title>Password | Crowdsourcing </title>
	</head>
	<body>
		<div class="container">
		        <span>
		        	<h1 class="title">CROWDSOURCING</h1>
		        </span>
		        <!--BEGIN DIV FORM-->
		        <div class="form-card">
		        	<form method="post" action="">
		        		<h2 class="form-text title">PASSWORD DIMENTICATA?</h2>
		        		<p>
		        			<p>
			        			<!--MAIL-->
			        			<p>
	                				<a for="inputMail" class="form-text">Email</a>
				            		<input type="email" name="inputMail" id="inputMail" Placeholder="esempio@dominio.com" required autofocus>
				            	</p>
				            	<!--NUOVA PASSWORD-->
				            	<p>
		             		    	<a for="inputPassword" class="form-text">Nuova password</a>
					            	<input type="password" name="inputNewPassword" id="inputPassword" Placeholder="Password" required>
					            </p>
					           <!--CONFERMA PASSWORD-->
				            	<p>
		             		    	<a for="inputPassword" class="form-text">Conferma password</a>
					            	<input type="password" name="inputNewPasswordConf" id="inputPassword" Placeholder="Conferma Password" required>
					            </p>
			            	</p>
			            	<p class="form-err" <?php echo $hidden; ?>>
                				<a><strong><?php echo $error; ?></strong></a> 
              				</p>
			            	<center>
				           		<!--ACCEDI-->
				           		<p style="-webkit-margin-before: 0px; -webkit-margin-after: 0px;">
	                				<a class="form-text-2nd" href="login.php">Accedi</a>
				            	</p>
				            	<!--REGISTRATI-->
	                			<p style="-webkit-margin-before: 0px; -webkit-margin-after: 0px;">
	                				<a class="form-text-2nd" href="register.php">Registrati</a>
	                			</p>
                			</center>
                		</p>
                		<!--ACCEDI-->
                  		<input class="form-btn" name="login" type="submit" value="MODIFICA">
					</form>
		        </div>
		        <!--END DIV FORM-->
		</div>
	</body>
</html>