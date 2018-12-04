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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <!-- Custom for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">
    <script src="../js/main.js"></script>
  </head>

  <body>
    <nav class="navbar navbar-default sticky-top" style="max-height: 54px !important">
      <a class="navbar-brand navbar-left" href="<?php echo strtolower($_SESSION['role']);?>.php">
        Dashboard | <?php echo $_SESSION['role'];?>
      </a>
      <div class="navbar-buttons navbar-right" style="text-align:right">
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