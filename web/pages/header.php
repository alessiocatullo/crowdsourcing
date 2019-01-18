<!--HEADER-->
<?php
  include("../../php/query.php");
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
    <link href="../../css/dashboard.css" rel="stylesheet">
    <script src="../../js/main.js"></script>
  </head>

  <body>
    <nav class="navbar navbar-default sticky-top" style="max-height: 54px !important">
      <a class="navbar-brand navbar-left" href="<?php echo strtolower($_SESSION['role']);?>.php">
        Dashboard | <?php echo $_SESSION['role'];?>
      </a>
      <div class="navbar-buttons navbar-right" style="text-align:right">
        <a href='' class="navbar-brand" data-toggle="modal" data-target="#profile" onclick='profile("<?php echo $_SESSION['user'];?>")'><i class='fas fa-user'></i></a>
        <a href="../../php/logout.php" class="navbar-brand logout"><i class="fas fa-sign-out-alt"></i></a>
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
                    <img src="../../ico/profile.png" width="140" height="140" border="0" class="mx-auto d-block rounded-circle">
                  </div>
                </div>
              </div>
              <!--colonna destra-->
              <div class="col-md-8">
                <div class="row">
                  <div class="col-md-12">
                    <h5><?php echo $_SESSION['role'];?></h5>
                  </div>
                </div>
                <div class="row" style="margin-bottom: 1em;">
                  <div class="col-md-10">
                    <p class="small">
                      <?php echo $_SESSION['address'];?>, <?php echo $_SESSION['town'];?>, <?php echo $_SESSION['country'];?>
                      <i class="fas fa-map-marker-alt" style="margin-left: 5px;"></i>
                    </p>
                    <p class="small"><?php echo $_SESSION['dt_birth'];?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-10">
                    <i class="fas fa-envelope" style="padding-right: 5px;"></i><a><strong>Email:</strong> <?php echo $_SESSION['user'];?></a>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-10">
                    <i class="fas fa-key" style="padding-right: 5px;"></i><a><strong>Password:</strong> *******</a>
                  </div>
                  <div class="col-md-1">
                    <a href='' data-dismiss='modal' data-toggle="modal" data-target="#edit-passw"><i class="fas fa-edit cng-mail"></i></a>
                  </div>
                </div>
                <div class="row skill-rate" <?php if(strcmp($_SESSION['role'], 'WORKER') != 0){echo ' hidden';}?> >
                  <div class="col-md-10">
                    <span><strong>Skills: </strong></span>
                    <span class="skills-div-profile">
                    </span>
                  </div>
                  <div class="col-md-1">
                    <a href='' data-dismiss='modal' data-toggle="modal" data-target="#edit-skill" onclick='populateSkill("<?php echo $_SESSION['user'];?>")'><i class="fas fa-edit cng-mail"></i></a>
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

<div class="modal fade" id="edit-skill">
  <div class="modal-dialog skill-modal">
  <form role="form" id="edit-skill-form">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">
            Modifica le tue skill
          </h4>
          <button type="button" class="close" data-dismiss='modal' data-toggle="modal" data-target="#profile"><i class="fas fa-arrow-left"></i></button>
        </div>
        <!-- Modal body -->
        <div class="container-fluid modal-body">
          <div class="row form-group">
            <div class="col-md-5">
              <select class="form-control skill-category-select">
                <option>---</option>
              </select>
            </div>
            <div class="col-md-6">
              <select class="form-control skill-subcategory-select" disabled>
                <option>---</option>
              </select>
            </div>
            <div class="col-md-1">
              <button type="button" class="btn btn-primary float-right add-skill">
                <i class="fas fa-plus"></i>
              </button>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <ul class="skill-div ul-answer"></ul>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <input type="hidden" id="skill-input" name="skill-input"></input>
            </div>
          </div> 
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Conferma</button>
        </div>
      </div>
  </form>
  </div>
</div>

<div class="modal fade" id="edit-passw">
  <div class="modal-dialog response-modal">
  <form role="form" id="edit-passw-form">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">
            Modifica la tua password
          </h4>
          <button type="button" class="close" data-dismiss='modal' data-toggle="modal" data-target="#profile"><i class="fas fa-arrow-left"></i></button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12" style="margin-bottom: 2pc;">
              <label class="control-label"><strong>Password</strong></label>
              <input maxlength="20" type="password" id="password" name="password" class="form-control" placeholder="Inserisci la tua password" required/>
            </div>
            <div class="col-md-12" style="margin-bottom: 2pc;">
              <label class="control-label"><strong>Nuova password</strong></label>
              <input maxlength="20" type="password" id="password-new" name="password-new" class="form-control" placeholder="Inserisci la nuova password" required/>
            </div>
            <div class="col-md-12" style="margin-bottom: 1pc;">
              <label class="control-label"><strong>Conferma nuova password</strong></label>
              <input maxlength="20" type="password" id="password-new-confirm" name="password-new-confirm" class="form-control" placeholder="Conferma la nuova password" required/>
            </div>
          </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Conferma</button>
        </div>
      </div>
  </form>
  </div>
</div>

<div class="modal fade" id="pass-change-response-error">
  <div class="modal-dialog response-modal">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header response-header-error">
        <h4 class="modal-title">
          <i class='fas fa-times-circle'></i> Errore
        </h4>
        <button type="button" class="close" data-dismiss='modal' data-toggle="modal" data-target="#edit-passw-form"><i class="fas fa-arrow-left"></i></button>
      </div>
      <!-- Modal body -->
      <div class="modal-body"></div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type='button' class='btn btn-danger' data-dismiss='modal' data-toggle="modal" data-target="#edit-passw">Riprova</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="pass-change-response-success">
  <div class="modal-dialog response-modal">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header response-header-success">
        <h4 class="modal-title">
          <i class='response-icon fas fa-check-circle'></i> Password cambiata con successo
        </h4>
        <button type="button" class="close" data-dismiss='modal' data-toggle="modal" data-target="#profile">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        La password è stata cambiata con successo! Ricordati di usare la nuova password ogni volta che dovrai fare un nuovo accesso.
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type='button' class='btn btn-success' data-dismiss='modal' data-toggle="modal" data-target="#profile">Profilo</button>
      </div>
    </div>
  </div>
</div>
<script>
  //AJAX CONFERMA NEW SKILLS
  $('#edit-skill-form').bind('submit',function(e) { 
    e.preventDefault();

    var formData = $(this).serialize();
    var user = '<?php echo $_SESSION['user'] ?>';

    $.ajax({
      type: "POST",
      url: '../../php/query.php',
      data: {Method:'query_modify_skill', formData, user},
      success: function(response){
        if(response != ''){
          alert(response);
          return;
        }
        $('#edit-skill').modal('hide');
        profile('<?php echo $_SESSION['user'] ?>');
        $('#profile').modal('show');
      }
    });
  });

  //AJAX CAMBIA PASSW
  $('#edit-passw-form').bind('submit',function(e) { 
    e.preventDefault();

    var formData = $(this).serialize();
    var user = '<?php echo $_SESSION['user'] ?>';
    var role = '<?php echo $_SESSION['role'] ?>';

    $.ajax({
      type: "POST",
      url: '../../php/query.php',
      data: {Method:'query_change_passw', formData, user, role},
      success: function(response){
        if(response != ''){
          $('#edit-passw').modal('hide');
          document.getElementById("edit-passw-form").reset();
          $('#pass-change-response-error').find('.modal-body').html(response);
          $('#pass-change-response-error').modal('show');
          return;
        }
        $('#edit-passw').modal('hide');
        document.getElementById("edit-passw-form").reset();
        $('#pass-change-response-success').modal('show');
      }
    });
  });

  $('#edit-skill').on('click', '.add-skill' ,function(){
    refCategory = $(this).closest("div.row").find('.skill-category-select');
    refCategorySub = $(this).closest("div.row").find('.skill-subcategory-select');

    if(refCategorySub.children(":selected").val().localeCompare("---") == 0){
      if(refCategory.children(":selected").val().localeCompare("---") == 0){
        return;
      }
    }
    if(refCategorySub.children(":selected").val().localeCompare("---") != 0){
      var exists = $('.skill-div li:contains('+refCategorySub.children(":selected").val()+')').length;
      if(!exists){
        $('#edit-skill').find('#skill-input').val($('#edit-skill').find('#skill-input').val() + refCategorySub.children(":selected").attr('id') + "; ");
        $('#edit-skill').find('.skill-div').append('<li class="li-answer" id='+refCategorySub.children(":selected").attr('id')+'>'
          + refCategorySub.children(":selected").val() + '<span class="close-answer"><i class="fas fa-times"></i></span></li>');
      }
    } else {
      var exists = $('.skill-div li:contains('+refCategory.children(":selected").val()+')').length;
      if(!exists){
        $('#edit-skill').find('#skill-input').val($('#edit-skill').find('#skill-input').val() + refCategory.children(":selected").attr('id') + "; ");
        $('#edit-skill').find('.skill-div').append('<li class="li-answer" id='+refCategory.children(":selected").attr('id')+'>'
          + refCategory.children(":selected").val() + '<span class="close-answer"><i class="fas fa-times"></i></span></li>');
      }
    }
  });

  $('#edit-skill').on('change', '.skill-category-select' ,function(){
    populateSubCategorySkill($(this).children(":selected").attr("id"));
    $(this).closest("div.row").find('.skill-subcategory-select').removeAttr("disabled");
  });

  $('#edit-skill').on('click', '.close-answer' ,function(){    
    $(this).closest('li').remove();
    var inputVal = '';
    $('.skill-div li').each(function(i){
       inputVal = inputVal + $(this).attr('id') + "; ";
    });

    $('#edit-skill').find('#skill-input').val('').val(inputVal);
  });

  $(".logout").on('click', function() {
    window.localStorage.setItem('activeTab', '');
  });
</script>