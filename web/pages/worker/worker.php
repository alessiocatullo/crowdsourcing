<!--MENUBAR-->
<?php
  include_once("../header.php");
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-2 col-md-1 sidebar">
      <ul class="nav nav-pills nav-stacked admin-menu" id="myTab">
        <li class="nav-link active"><a class="nav-item active show" href="#home" data-toggle="tab"><i class="fas fa-tachometer-alt fa-fw"></i></a></li>
        <li class="nav-link"><a class="nav-item" href="#task_worker" data-toggle="tab"><i class="fas fa-list-alt fa-fw"></i></a></li>
      </ul>
    </div>
  </div>
    <div class="col-sm-9 offset-sm-2 col-md-11 offset-md-1 pt-3 well admin-content" id="home">
      <?php
        include("home.php");
      ?>
    </div>
    <div class="col-sm-9 offset-sm-2 col-md-11 offset-md-1 pt-3 well admin-content" id="task_worker">
      <?php
        include("task_worker.php");
      ?>
    </div>
    </div>    
</div>