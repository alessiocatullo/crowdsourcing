<!--MENUBAR-->
<?php
  include_once("../header.php");
  if(strcmp($_SESSION['role'], 'ADMIN') != 0){
    echo "<script> window.localStorage.setItem('activeTab', ''); </script>";
    echo "<script> alert(window.localStorage.getItem('activeTab')); </script>";
    header('Location: ../login/login.php');
    exit;
  }
  include_once("../header.php");
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-2 col-md-1 sidebar">
      <ul class="nav nav-pills nav-stacked admin-menu" id="myTab">
        <li class="nav-link"><a class="nav-item" href="#request" data-toggle="tab"><i class="fas fa-list-alt fa-fw"></i></a></li>
      </ul>
    </div>
  </div>
  <div class="col-sm-9 offset-sm-2 col-md-11 offset-md-1 pt-3 well admin-content" id="request">
    <?php
      include("request.php");
    ?>
  </div>  
</div>