<!--HEADER-->
<?php
  include("../php/session.php");
  include("../php/query.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Dashboard</title>
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
        <a href='' class="navbar-brand" data-toggle="modal" data-target="#profile" onclick='profile()'><i class='fas fa-user'></i></a>
        <a href="../php/logout.php" class="navbar-brand"><i class="fas fa-sign-out-alt"></i></a>
      </div>
    </nav>

    <div class="modal fade" id="profile">
      <div class="modal-dialog profile-modal">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">
              <h3><?php echo $_SESSION['first_name'].' '.$_SESSION['last_name'];?></h3>
            </h4>
            <button type="button" class="close" data-dismiss='modal'>&times;</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body">
            <div class="row">
              <div class="col-md-4">
                <!--colonna sinistra-->
                <div class="row">
                  <div class="col-md-12">
                    <img src="../ico/profile.png" width="140" height="140" border="0" class="mx-auto d-block rounded-circle">
                  </div>
                </div>
              </div>
              <!--colonna destra-->
              <div class="col-md-8">
                <div class="row" style="margin-bottom: 2em;">
                  <div class="col-md-12">
                    <h5><?php echo $_SESSION['role'];?><?php if(strcmp($_SESSION['role'], 'REQUESTER') != 0){echo ' - RATING';}?></h5>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-10">
                    <a><strong>Data di nascita:</strong> <?php echo $_SESSION['user'];?></a>
                  </div>
                  <div class="col-md-1">
                    <i class="fas fa-edit cng-mail"></i>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-10">
                    <a><strong>Indirizzo:</strong> <?php echo $_SESSION['user'];?></a>
                  </div>
                  <div class="col-md-1">
                    <i class="fas fa-edit cng-mail"></i>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-10">
                    <a><strong>Città:</strong> <?php echo $_SESSION['user'];?></a>
                  </div>
                  <div class="col-md-1">
                    <i class="fas fa-edit cng-mail"></i>
                  </div>
                </div>
                <div class="row" style="margin-bottom: 1em;">
                  <div class="col-md-10">
                    <a><strong>Stato:</strong> <?php echo $_SESSION['user'];?></a>
                  </div>
                  <div class="col-md-1">
                    <i class="fas fa-edit cng-mail"></i>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-10">
                    <a><strong>Email:</strong> <?php echo $_SESSION['user'];?></a>
                  </div>
                  <div class="col-md-1">
                    <i class="fas fa-edit cng-mail"></i>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-10">
                    <a><strong>Password:</strong> *******</a>
                  </div>
                  <div class="col-md-1">
                    <i class="fas fa-edit cng-mail"></i>
                  </div>
                </div>
                <div class="row skill-rate" <?php if(strcmp($_SESSION['role'], 'REQUESTER') == 0){echo ' hidden';}?>>
                  <div class="col-md-12">
                    <span><strong>Skills: </strong></span>
                    <a href="#" class="badge badge-primary">Primary</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>