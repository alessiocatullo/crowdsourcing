<!--NEW CAMPAIGN-->
<?php
  include("../php/new_campaign.php");
?>
<div class="container-fluid">
  <h2 class="title">Nuova Campagna</h2>
  <!--STEP-->
  <div class="stepwizard">
      <div class="stepwizard-row setup-panel">
          <div class="stepwizard-step">
              <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
              <p>Campagna</p>
          </div>
          <div class="stepwizard-step">
              <a href="#step-2" type="button" class="btn btn-default btn-circle disabled">2</a>
              <p>Task</p>
          </div>
          <div class="stepwizard-step">
              <a href="#step-3" type="button" class="btn btn-default btn-circle disabled">3</a>
              <p>Riepilogo</p>
          </div>
      </div>
  </div>
  <!--STEP ERROR-->
  <p class="form-err" style="background: <?php echo $bgcolor; ?>; color:<?php echo $color; ?>; " <?php echo $hidden; ?>>
    <a><strong><?php echo $error; ?></strong></a> 
  </p>
  <!--FORM-->
  <form role="form" id="new_campaign_form" method="post" action="">
    <!-- STEP 1 - DETTAGLI CAMPAGNA -->
    <div class="setup-content" id="step-1">
      <h3>Crea la campagna</h3>
      <div class="col-md-12 task-div">     
        <div class="form-group">
          <label class="control-label">Nome</label>
          <input  maxlength="100" id="name" type="text" required="required" class="form-control" placeholder="nome campagna"/>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">Data inizio</label>
              <input type="date" id="dt_start" required="required" class="form-control" min="<?php echo date("Y-m-d") ?>" 
                max="2099-01-01"/>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">Data fine</label>
              <input type="date" id="dt_end" required="required" class="form-control" max="2099-01-01" disabled/>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">Data iscrizione inizio</label>
              <input type="date" id="dt_accession_start" required="required" class="form-control" disabled/>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">Data iscrizione fine</label>
              <input type="date" id="dt_accession_end" required="required" class="form-control" disabled/>
            </div>
          </div>
        </div>
      </div>
      <button class="btn btn-success nextBtn btn-lg float-right" style="margin-bottom: 2pc;" 
        onclick="populateSelect()" type="button">Avanti</button>
    </div>
    <!-- STEP 2 - AGGIUNGI TASK -->
    <div class="setup-content" id="step-2">
      <div class="row">
        <div class="col-md-11">
          <h3>Aggiungi task</h3>
        </div>
        <div class="col-md-1">
          <button id="add"class="btn btn-primary float-right" onclick="addTask()" type="button">
            <i class="btn-add fas fa-plus"></i>
          </button>
        </div>
      </div>
      <div class="col-sx-12">
        <div class="row">
          <div class="col-md-12 main-div">
            <div class="task-div" id="task-1" style="margin-top: 15px; margin-bottom: 15px;">
              <div class="form-group">
                <label class="control-label">Titolo</label>
                <input maxlength="200" type="text" id="title-1" required="required" class="form-control" placeholder="Inserisci il titolo"/>
              </div>
              <div class="form-group">
                <label class="control-label">Descrizione</label>
                <input maxlength="200" type="text" id="description-1" required="required" class="form-control" placeholder="Inserisci la descrizione"/>
              </div>
              <div class="row form-group">
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-2">
                      <label class="control-label">Lavoratori</label>
                      <input type="number" id="worker-1" required="required" class="form-control" placeholder="1" min="1" max="10" step="1"/>
                    </div>
                    <div class="col-md-5">
                      <label class="control-label">Maggioranza</label>
                      <input type="number" id="majority-1" required="required" class="form-control" placeholder="0%" min="0" max="100" step="10"/>
                    </div>
                    <div class="col-md-5">
                      <label class="control-label">Ricompenza</label>
                      <input maxlength="20" type="text" id="reward-1" class="form-control" placeholder="Inserisci la ricompenza"/>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="control-label">Risposte</label>
                      <input maxlength="130" type="text" id="answer-1" required="required" class="form-control" placeholder="Parole alternate dal punto e virgola"/>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <label class="control-label">Parole chiave</label>
                  <div class="border-div">
                    <div class="row">
                      <div class="col-md-5">
                        <select class="form-control skill-select">
                          <option>---</option>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <select class="form-control skill-category-select" disabled>
                          <option>---</option>
                        </select>
                      </div>
                      <div class="col-md-1">
                        <button class="skill-confirm btn btn-primary float-right" type="button">
                          <i class="fas fa-plus"></i>
                        </button>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12" style="margin-top: 1pc;">
                        <input class="skill-input form-control" id="skill-1" type="text" required="required" placeholder="#">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>  
          </div>
          </div>
      </div>
      <button class="btn btn-success nextBtn btn-lg float-right" style="margin-bottom: 2pc;" 
        type="button" onclick="printResults()">Avanti</button>
    </div>
    <!-- STEP 3 - RIEPILOGO -->        
      <div class="setup-content" id="step-3">
          <div class="col-xs-12">
              <div class="col-md-12">
                  <h3>Riepilogo</h3>
                  <div id="results" class="recap-div">
                    <h3 class="recap-title">Campagna</h3>
                    <div class="row">
                      <div class="col-md-2" style="text-align: right;">
                        <h6>Nome</h6>
                      </div>
                      <div class="col-md-10" style="text-align:left">
                        <p id="name-recap"></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-2" style="text-align: right;">
                        <h6>Data inizio</h6>
                      </div>
                      <div class="col-md-10" style="text-align:left">
                        <p id="dt_start-recap"></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-2" style="text-align: right;">
                        <h6>Data fine</h6>
                      </div>
                      <div class="col-md-10" style="text-align:left">
                        <p id="dt_end-recap"></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-2" style="text-align: right;">
                        <h6>Data inizio iscrizione</h6>
                      </div>
                      <div class="col-md-10" style="text-align:left">
                        <p id="dt_accession_start-recap"></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-2" style="text-align: right;">
                        <h6>Data fine iscrizione</h6>
                      </div>
                      <div class="col-md-10" style="text-align: left;">
                        <p id="dt_accession_end-recap"></p>
                      </div>
                    </div>
                    <h3 class="recap-title" style="margin-top: 2pc;">Tasks</h3>
                    <div class="recap-task">
                      
                    </div>
                  </div>
                  <button class="btn btn-success btn-lg float-right" type="submit">Crea</button>
              </div>
          </div>
      </div>
  </form>
</div>

<script>
  $('#dt_start').change(function() {
      document.getElementById('dt_end').setAttribute("min", ($(this).val()));
      document.getElementById('dt_accession_start').setAttribute("min", ($(this).val()));
      $('#dt_end').removeAttr("disabled");
  });
  $('#dt_end').change(function() {
      document.getElementById('dt_accession_start').setAttribute("max", ($(this).val()));
      document.getElementById('dt_accession_end').setAttribute("max", ($(this).val()));
      $('#dt_accession_start').removeAttr("disabled");
  });
  $('#dt_accession_start').change(function() {
    document.getElementById('dt_accession_end').setAttribute("min", ($(this).val()));
    $('#dt_accession_end').removeAttr("disabled");
  });

  $('.skill-select').change(function() {
    populateSubCategory(
      $(this).closest("div.row").closest("div.task-div").attr("id") ,
      $(this).children(":selected").attr("id")
    );
    $(this).closest("div.row").find('.skill-category-select').removeAttr("disabled");
  });

  //FUNZIONE AGGIUNGI PAROLA CHIAVE
  $('.skill-confirm').click(function(){
    refCategorySub = $(this).closest("div.row").find('.skill-category-select');
    refCategory = $(this).closest("div.row").find('.skill-select');
    skillInput = $(this).closest("border-div").find('.skill-input');
    alert(skillInput.attr("id"));
    if(refCategorySub.children(":selected").val().localeCompare("---") == 0){
      if(refCategory.children(":selected").val().localeCompare("---") == 0){
        refCategory.css('border-color', '#dc3545');
        return;
      }
    }
   refCategory.css('border-color', '#ced4da');
    if(refCategorySub.children(":selected").val().localeCompare("---") != 0){
      alert(refCategorySub.children(":selected").val());
      skillInput.val(skillInput.val() + (refCategorySub.children(":selected").val() + "; "));
    } else {
      alert("2");
      skillInput.val(skillInput.val() + (refCategory.children(":selected").val() + "; "));
    }
  });
</script>