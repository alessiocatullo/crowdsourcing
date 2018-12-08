<!--NEW CAMPAIGN-->
<div class="container-fluid new_campaign-div">
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
  <!--FORM-->
  <form role="form" id="new_campaign_form">
    <!-- STEP 1 - DETTAGLI CAMPAGNA -->
    <div class="setup-content" id="step-1">
      <h3>Crea la tua campagna</h3>
      <div class="col-md-12 task-div" style="padding: 15px;">     
        <div class="form-group">
          <label class="control-label">Nome</label>
          <input  maxlength="100" id="name" name="name" type="text" required="required" class="form-control" placeholder="nome campagna" value="test"/>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">Data inizio</label>
              <input type="date" id="dt_start" name="dt_start" required="required" class="form-control" min="<?php echo date("Y-m-d") ?>" 
                max="2099-01-01" value="2030-12-04"/>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">Data fine</label>
              <input type="date" id="dt_end" name="dt_end" required="required" class="form-control" max="2099-01-01" value="2030-12-07"/>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">Data iscrizione inizio</label>
              <input type="date" id="dt_accession_start" name="dt_accession_start" required="required" class="form-control" value="2030-12-05"/>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">Data iscrizione fine</label>
              <input type="date" id="dt_accession_end" name="dt_accession_end" required="required" class="form-control" value="2030-12-06"/>
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
                <div class="row form-group">
                  <div class="col-md-6">
                    <label class="control-label">Titolo</label>
                    <input maxlength="200" type="text" id="title-1" name="title-1" required="required" class="form-control" placeholder="Inserisci il titolo"value="test"/>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-2">
                        <label class="control-label">Lavoratori</label>
                        <input type="number" id="worker-1" name="worker-1" required="required" class="form-control" placeholder="1" min="1" max="10" step="1"value="1"/>
                      </div>
                      <div class="col-md-3">
                        <label class="control-label">Maggioranza</label>
                        <input type="number" id="majority-1" name="majority-1" required="required" class="form-control" placeholder="0%" min="0" max="100" step="10" value="10"/>
                      </div>
                      <div class="col-md-7">
                        <label class="control-label">Ricompenza</label>
                        <input maxlength="20" type="text" id="reward-1" name="reward-1" class="form-control" placeholder="Inserisci la ricompenza"value="test"/>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-12">
                        <label class="control-label">Descrizione</label>
                      </div>
                    </div>
                    <div class="row form-group">
                      <div class="col-md-12">
                         <textarea class="form-control" type="text" style="resize: none; height: 120%;" row="3" id="description-1" name="description-1" 
                         placeholder="Inserisci la descrizione" required='required'></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 border-div">
                    <label class="control-label">Parole chiave</label>
                    <div class="row form-group">
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
                    <div class="row form-group">
                      <div class="col-md-11">
                        <input class="skill-input form-control readonly" id="skill-1" name="skill-1" type="text" required="required" placeholder="#" autocomplete="off"/>
                      </div>
                      <div class="col-md-1">
                        <button class="skill-remove btn btn-danger float-right" type="button">
                          <i class="fas fa-times"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-12">
                        <label class="control-label">Risposte</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-11">
                        <input class="form-control readonly input-answer" id="answer-1" name="answer-1" type="text" required="required"  placeholder="Premi il tasto edit per aggiungere risposte"/>
                      </div>
                      <div class="col-md-1">
                        <button type="button" class="btn btn-primary answerBtn float-right" data-toggle="modal" data-target="#answer">
                          <i class="fas fa-edit"></i>
                        </button>
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

<div class="modal fade" data-backdrop="static" id="response">
  <div class="modal-dialog response-modal">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">
        </h4>
        <button type="button" class="close" data-dismiss='modal' onclick="refreshOnTarget('#new_campaign')">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body"></div>
      <!-- Modal footer -->
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<div class="modal fade" data-backdrop="static" id="answer">
  <div class="modal-dialog response-modal">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">
          Inserisci le risposte
        </h4>
        <button type="button" class="close" data-dismiss='modal'>&times;</button>
      </div>
      <!-- Modal body -->
      <div class="container-fluid modal-body">
        <div class="row form-group">
          <div class="col-md-11">
            <input type="text" id="test" class="form-control input-answer-div" placeholder="Scrivi la risposta" autocomplete="off"/>
          </div>
          <div class="col-md-1">
            <button type="button" class="btn btn-primary float-right add-answer">
              <i class="fas fa-plus"></i>
            </button>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <ul class="answer-div ul-answer"></ul>
          </div>
        </div> 
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type='button' class='btn btn-success confirm-answer' data-dismiss='modal'>Conferma</button>
      </div>
    </div>
  </div>
</div>

<script>
  //AJAX SEND NUOVA CAMPAGNA
  $('#new_campaign_form').bind('submit',function(e) { 
    e.preventDefault();

    var formData = $(this).serialize();
    var user = '<?php echo $_SESSION['user'] ?>';
    var button = '';
    var titleText = '';

    $('.modal-header').removeClass("response-header-success");
    $('.modal-header').removeClass("response-header-error");

    $.ajax({
      type: "POST",
      url: '../php/query.php',
      data: {Method:'insert_campaigns', formData, user},
      success: function(response){
        if(response == ''){
          button = "<button type='button' class='btn btn-success' data-dismiss='modal' onclick="+"refreshOnTarget('#campaigns')"+">Le mie campagne</button>";
          titleText = "<i class='response-icon fas fa-check-circle'></i> Campagna inserita";
          $('#new_campaign_form').find('input').val("");
          $('.modal-body').text("Campagna inserita con successo! Consulta le tue campagne");
          $('.modal-header').addClass("response-header-success");
        }else {
          button = "<button type='button' class='btn btn-danger' data-dismiss='modal'>Modifica e riprova</button>";
          titleText = "<i class='fas fa-times-circle'></i> Errore";
          $('.modal-body').text(response);
          $('.modal-header').addClass("response-header-error");
        }
        $('.modal-footer').html(button);
        $('.modal-title').html(titleText);
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

  //FUNZIONE RIMUOVI PAROLA CHIAVE
  $('#step-2').on('click', '.skill-remove' ,function(){
    skillInput = $(this).closest("div.row").find('.skill-input').val();
    skillInput = skillInput.substring(0, skillInput.length-2);
    var pod = skillInput.lastIndexOf("; ");
    skillInput = skillInput.substring(0, pod);
    if(skillInput != ''){
      $(this).closest("div.row").find('.skill-input').val(skillInput + "; ");
    } else {
      $(this).closest("div.row").find('.skill-input').val(skillInput);
    }
  });
  //UN SIMIL READONLY
  $(".readonly").keydown(function(e){
    if(e.which != 9){
      e.preventDefault();
    }
  });
  $('.readonly').bind("cut paste",function(e) {
    e.preventDefault();
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

  //AGGIUNGI RISPOSTA
  $('#step-2').on('click', '.answerBtn' ,function(){
    var index = 0;

    value = $(this).closest('.row').find('.input-answer').val();
    id = $(this).closest('.task-div').attr('id');
    $('#answer').addClass(id);
    $('ul').empty();
    while((index = value.indexOf('; ')) != -1){
      $('.answer-div').append('<li class="li-answer">'+ value.substring(0, index) + '<span class="close-answer"><i class="fas fa-times"></i></span></li>');
      value = value.substring(index+2, value.length);
    }
  });

  $('#answer').on('click', '.add-answer' ,function(){
    answer = $('.input-answer-div').val();
    if(answer != ''){
      $('.answer-div').append('<li class="li-answer">'+ answer + '<span class="close-answer"><i class="fas fa-times"></i></span></li>');
    }
    $('.input-answer-div').val('');
  });

  $('#answer').on('click', '.confirm-answer' ,function(){
    pointOfTask = $('#answer').attr('class').indexOf('task-');
    taskid = $('#answer').attr('class').substring(pointOfTask, pointOfTask+6);
    input = '';
    $('.answer-div li').each(function(i){
      input = input + $(this).text() + '; ';
    });
    $('#'+taskid).find('.input-answer').val(input);
    $('#answer').removeClass(taskid);
  });

  $('#answer').on('click', '.close-answer' ,function(){
    $(this).closest('li').remove()
  });

</script>