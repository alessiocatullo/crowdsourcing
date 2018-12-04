<!--NEW CAMPAIGN-->
<div class="container-fluid new_campaign-div">
  <h2 class="title">Nuova Campagna</h2>
  <!--STEP-->
  <div class="stepwizard">
      <div class="stepwizard-row setup-panel">
          <div class="stepwizard-step">
              <a href="#step-1" type="button" class="btn btn-default btn-circle disabled">1</a>
              <p>Campagna</p>
          </div>
          <div class="stepwizard-step">
              <a href="#step-2" type="button" class="btn btn-default btn-circle disabled">2</a>
              <p>Task</p>
          </div>
          <div class="stepwizard-step">
              <a href="#step-3" type="button" class="btn btn-primary btn-circle">3</a>
              <p>Riepilogo</p>
          </div>
      </div>
  </div>
  <!--FORM-->
  <form role="form" id="new_campaign_form">
    <!-- STEP 1 - DETTAGLI CAMPAGNA -->
    <div class="setup-content" id="step-1">
      <h3>Crea la campagna</h3>
      <div class="col-md-12 task-div" style="padding: 15px;">     
        <div class="form-group">
          <label class="control-label">Nome</label>
          <input  maxlength="100" id="name" name="name" type="text" required="required" class="form-control" placeholder="nome campagna" value="test"/>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">Data inizio</label>
              <input type="date" id="dt_start" name="name" required="required" class="form-control" min="<?php echo date("Y-m-d") ?>" 
                max="2099-01-01" value="2018-12-04"/>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">Data fine</label>
              <input type="date" id="dt_end" name="dt_end" required="required" class="form-control" max="2099-01-01" value="2018-12-07"disabled/>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">Data iscrizione inizio</label>
              <input type="date" id="dt_accession_start" name="dt_accession_start" required="required" class="form-control" value="2018-12-05"disabled/>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">Data iscrizione fine</label>
              <input type="date" id="dt_accession_end" name="dt_accession_end" required="required" class="form-control" value="2018-12-06"disabled/>
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
              <div class="banner row" id="banner-1" style="margin-left: 0px;">
                <div class="col-md-10">
                  <h1 class="nTask title-white">#1</h1>
                </div>
                <div class="col-md-2">
                  <button class="btn btn-result btn-remove float-right" type="button">
                    <i class="btn-add fas fa-window-close"></i>
                  </button>
                  <button class="btn btn-result btn-collapse float-right" type="button">
                    <i class="btn-add fas fa-minus-square"></i>
                  </button>
                </div>
              </div> 
              <div class="content-task" style="padding: 15px;">
                <div class="form-group">
                  <label class="control-label">Titolo</label>
                  <input maxlength="200" type="text" id="title-1" name="title-1" required="required" class="form-control" placeholder="Inserisci il titolo"value="test"/>
                </div>
                <div class="form-group">
                  <label class="control-label">Descrizione</label>
                  <input maxlength="200" type="text" id="description-1" name="description-1" required="required" class="form-control" placeholder="Inserisci la descrizione"value="test"/>
                </div>
                <div class="row form-group">
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-2">
                        <label class="control-label">Lavoratori</label>
                        <input type="number" id="worker-1" name="worker-1" required="required" class="form-control" placeholder="1" min="1" max="10" step="1"value="1"/>
                      </div>
                      <div class="col-md-5">
                        <label class="control-label">Maggioranza</label>
                        <input type="number" id="majority-1" name="majority-1" required="required" class="form-control" placeholder="0%" min="0" max="100" step="10" value="10"/>
                      </div>
                      <div class="col-md-5">
                        <label class="control-label">Ricompenza</label>
                        <input maxlength="20" type="text" id="reward-1" name="reward-1" class="form-control" placeholder="Inserisci la ricompenza"value="test"/>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <label class="control-label">Risposte</label>
                        <input maxlength="130" type="text" id="answer-1" name="answer-1" required="required" class="form-control" placeholder="Parole alternate dal punto e virgola"value="test"/>
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
                          <input class="skill-input form-control" id="skill-1" name="skill-1" type="text" required="required" placeholder="#" value="test"/>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>  
          </div>
          </div>
      </div>
      <button class="btn btn-primary backBtn btn-lg float-left" style="margin-bottom: 2pc;" 
        type="button">Indietro</button>
      <button class="btn btn-success nextBtn btn-lg float-right" style="margin-bottom: 2pc;" 
        type="button" onclick="printResults()">Avanti</button>
    </div>
    <!-- STEP 3 - RIEPILOGO -->        
    <div class="setup-content" id="step-3">
      <h3>Riepilogo</h3>
        <div class="col-md-12 task-div" style="padding: 15px;">
          <div class="results">
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
            <div class="col-md-12">
            <div class="recap-item-ref" hidden>
              <div clas="row">
                <div class="col-md-12">
                  <h2 class="nTask-recap" style="text-align: right"></h2>  
                </div> 
              </div>
              <div class="row">
                <div class="col-md-12">
                  <p class="title-task-recap"></p>
                  <p class="desc-task-recap"></p>
                  <p class="worker-task-recap"></p>
                  <p class="majority-task-recap"></p>
                  <p class="reward-task-recap"></p>
                  <p class="key-task-recap"></p>
                  <p class="answer-task-recap"></p>
                </div>
              </div>
            </div>
            <div class="row recap-tasks">
            </div>
          </div>
          </div>
        </div>
        <button class="btn btn-primary backBtn btn-lg float-left" style="margin-bottom: 2pc;" 
          type="button">Indietro</button>
        <button type="submit" class="btn btn-success completeBtn btn-lg float-right" style="margin-bottom: 2pc;"
          data-toggle="modal" data-target="#response">Crea</button>
    </div>
  </form>
</div>

<div class="modal fade" id="response">
  <div class="modal-dialog response-modal response-error">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">
        </h4>
        <button type="button" class="close" data-dismiss="modal" onclick="location.href=''">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body"></div>
      <!-- Modal footer -->
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<script>
//AJAX SEND NUOVA CAMPAGNA
$('#new_campaign_form').bind('submit',function(e) { 
  e.preventDefault();

  var formData = $(this).serialize();
  var url = '../php/new_campaign.php';
  var button = '';
  var titleText = '';

  $.ajax({
    type: "POST",
    url: url,
    data: formData,
    success: function(response){
      $('.modal-header').addClass("response-header-success");
      $('.modal-body').append(response); // show response from the php script.
      if(false){
        button = "<button type='button' class='btn btn-success' data-dismiss='modal' onclick='location.href=#campaigns'>Le mie campagne</button>";
        titleText = "<i class='response-icon fas fa-check-circle'></i> Campagna inserita";
      }else {
        button = "<button type='button' class='btn btn-danger' data-dismiss='modal'>Riprova</button>";
        titleText = "<i class='fas fa-times-circle'></i> Errore";
      }
      $('.modal-footer').append(button);
      $('.modal-title').append(titleText);
    }
  });
});

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

  $('#step-2').on('change', '.skill-select' ,function(){
    populateSubCategory(
      $(this).closest("div.row").closest("div.task-div").attr("id") ,
      $(this).children(":selected").attr("id")
    );
    $(this).closest("div.row").find('.skill-category-select').removeAttr("disabled");
  });


  //FUNZIONE AGGIUNGI PAROLA CHIAVE
  $('#step-2').on('click', '.skill-confirm' ,function(){
    refCategorySub = $(this).closest("div.row").find('.skill-category-select');
    refCategory = $(this).closest("div.row").find('.skill-select');
    skillInput = $(this).closest("div.border-div").find('.skill-input');

    if(refCategorySub.children(":selected").val().localeCompare("---") == 0){
      if(refCategory.children(":selected").val().localeCompare("---") == 0){
        refCategory.css('border-color', '#dc3545');
        return;
      }
    }
   refCategory.css('border-color', '#ced4da');
    if(refCategorySub.children(":selected").val().localeCompare("---") != 0){
      skillInput.val(skillInput.val() + (refCategorySub.children(":selected").val() + "; "));
    } else {;
      skillInput.val(skillInput.val() + (refCategory.children(":selected").val() + "; "));
    }
  });

  //REMOVE DIV
  $('#step-2').on('click', '.btn-remove' ,function(){
    div = $(this).closest("div.task-div");
    if(div.attr("id").substring(div.attr("id").length - 1) == 1){
      alert("Non puoi eliminare il 1° task");
      return;
    }
    div.remove();
  });

  //COLLAPSE DIV
  $('#step-2').on('click', '.btn-collapse' ,function(){
    div = $(this).closest("div.task-div").find("div.content-task");
    if(div.attr('hidden') == null){
      div.attr('hidden','hidden');
    } else {
      div.removeAttr('hidden');
    }
  });
</script>