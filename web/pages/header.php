<!--HEADER-->
<?php
	include("../php/session.php");
	include("../php/query.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Dashboard | Requester </title>
    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	  <link src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <!-- Custom for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">
    <script src="../js/main.js"></script>
  </head>

  <body>
   	<nav class="navbar navbar-default fixed-top" style="max-height: 54px !important">
      <div class="col-md-11">
        <a class="navbar-brand" href="<?php echo strtolower($_SESSION['role']);?>.php">Dashboard | <?php echo $_SESSION['role'];?></a>
      </div>
      <div class="col-md-1" style="text-align:right">
        <?php
          if(strcmp($_SESSION['role'],"REQUESTER") != 0){
            echo "<a href='profile.php' class='navbar-brand'><i class='fas fa-user'></i></a>";
          }
        ?>
        <a href="../php/logout.php" class="navbar-brand"><i class="fas fa-sign-out-alt"></i></a>
      </div>
    </nav>
  </body>
</html>