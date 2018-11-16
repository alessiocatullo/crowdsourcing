<!--MENUBAR-->
<?php
  include_once("header.php");
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-2 col-md-1 sidebar">
      <ul class="nav nav-pills nav-stacked admin-menu">
        <li class="nav-link"><a class="nav-item" href="" data-target-id="new_campaign"><i class="fas fa-plus-square fa-fw"></i></a></li>
        <li class="nav-link active"><a class="nav-item" href="" data-target-id="campaigns"><i class="fas fa-list-alt fa-fw"></i></a></li>
      </ul>
    </div>
  </div>
    <div class="col-sm-9 offset-sm-2 col-md-11 offset-md-1 pt-3 well admin-content" id="campaigns">
      <?php
        include("campaigns.php");
      ?>
    </div>

    <div class="col-sm-9 offset-sm-2 col-md-11 offset-md-1 pt-3 well admin-content" id="new_campaign">
      <?php
        include("new_campaign.php");
      ?>
    </div>
</div>