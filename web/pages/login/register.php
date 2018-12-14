<!--REGISTER PAGE-->
<?php
	include('../../php/register.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<!--REFERENCES-->
		<link href="../../css/base.css" rel="stylesheet">
		<!--TITLE-->
   		<title>Registrati | Crowdsourcing </title>
	</head>
	<body>
		<div class="container">
		        <span>
		        	<h1 class="title">CROWDSOURCING</h1>
		        </span>
		        <!--BEGIN DIV FORM-->
		        <div class="form-card">
		        	<form method="post" action="">
		        		<h2 class="form-text title">REGISTRATI</h2>
		        		<div class="form-divis">		        		
		        			<!--LEFT COLUMN-->
			        		<div class="form-col">
			        			<!--NOME-->
			        			<p>
		                			<a for="inputNome" class="form-text">Nome</a>
					            	<input type="text" name="inputNome" id="inputNome" Placeholder="Il tuo nome" required autofocus>
					            </p>
					            <!--COGNOME-->
					            <p>
			             		   	<a for="inputCognome" class="form-text">Cognome</a>
						           	<input type="text" name="inputCognome" id="inputCognome" Placeholder="Il tuo cognome" required>
						        </p>
						        <!--RADIO BUTTONS-->
						        <a for="type" class="form-text">Tipologia</a>
								<p>
									<div style="width: 100%; padding-bottom: 0.5em;" >
				             		   	<input class="form-radio" type="radio" name="radio" id="Requester" value="REQUESTER" required checked>
            								<label for="Requester" class="form-text">Requester</label>
            							</input>
			             		   	</div>
			             		   	<div style="width: 100%;">
	                    				<input class="form-radio" type="radio" name="radio" id="Worker" value="WORKER" required>
	                    					<label for="Worker" class="form-text">Worker</label>
	                    				</input>
                  					</div>
						        </p>
						    </div>
		        			<!--RIGHT COLUMN-->
			        		<div class="form-col">
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
						        <!--CONFERMA PASSWORD-->
					            <p>
			             		   	<a for="inputPasswordConf" class="form-text">Conferma Password</a>
						           	<input type="password" name="inputPasswordConf" id="inputPasswordConf" Placeholder="Conferma Password" required>
						        </p>
			        		</div>
			        	</div>
			        	<p class="form-err" <?php echo $hidden; ?>>
                			<a><strong><?php echo $error; ?></strong></a> 
              			</p>
		        		<!--BUTTON & LINK-->		        		
		        		<p>
			        		<center>		  
			        			<!--PASSWORD DIMENTICATA-->
						        <p style="-webkit-margin-before: 0px; -webkit-margin-after: 0px;">
			                		<a class="form-text-2nd" href="login.php">Accedi</a>
						        </p>
					        </center>
					    </p>   		
                		<!--INVIA-->
                  		<input class="form-btn" name="login" type="submit" value="INVIA">

		        	</form>
		        </div>
		        <!--END DIV FORM-->
		</div>
	</body>
</html>