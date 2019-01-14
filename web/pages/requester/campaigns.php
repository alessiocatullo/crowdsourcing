<!--CAMPAIGNS-->
<div>
	<h1 class="title">Campagne</h1>
	<div class="table-responsive">
		<table class="table table-striped table-hover">
	        <thead class="thead-dark">
	            <tr>
	    	        <th>Nome</th>
	                <th class='tabletxt-center'>Data Apertura</th>
	                <th class='tabletxt-center'>Data Chiusura</th>
	                <th class='tabletxt-center'>Apertura registrazione</th>
	                <th class='tabletxt-center'>Chiusura registrazione</th>
	                <th class='tabletxt-center'>Dettagli</th>
	                <th class='tabletxt-center'>Elimina</th>
	        	</tr>
	        	<tbody>
	                <?php
	                    $requester = $_SESSION['user'];
	                    query_campaign($requester);
	                ?>
	            </tbody>
	        </thead>
		</table>
	</div>
</div>

<div class="modal fade" id="tasks-campaign">
  <div class="modal-dialog details-modal">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h2 class="title-details"></h2>
        <button type="button" class="close" data-dismiss='modal'>&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
		<div class="table-responsive">
			<table class="table table-striped table-hover">
		        <thead class="table-details thead-dark">
		            <tr>
		    	        <th>Titolo</th>
		                <th>Descrizione</th>
		                <th class='tabletxt-center'>#Lavoratori</th>
		                <th class='tabletxt-center'>Maggioranza</th>
		                <th class='tabletxt-center'>Ricompensa</th>
		                <th class='tabletxt-center'>Risposte/Skills</th>
		                <th class='tabletxt-center'>Fase</th>
		        	</tr>
		        	<tbody class='content-details'>
		            </tbody>
		        </thead>
			</table>
		</div>
	  </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type='button' class='btn btn-primary new-task-btn-add' data-dismiss='modal' data-toggle="modal" data-target="#new-task-campaign" onclick="populateSelect()"><i class="btn-add fas fa-plus"></i></button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="answer-skill">
  <div class="modal-dialog response-modal answer-skill-modal">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">
        	Risposte/Skills
        </h4>
        <button type="button" class="close" data-dismiss='modal' data-toggle="modal" data-target="#tasks-campaign"><i class="fas fa-arrow-left"></i></button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
      	<ul class="answer-ofTask" style="margin-bottom: 2pc; margin-top: 2pc;"></ul>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
      	<div class="col-md-12">
      		<span><strong>Skills: </strong></span>
	        <span class="skills-footer-details-campaign">
	        </span>
      	</div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="task-analtics">
  <div class="modal-dialog response-modal answer-skill-modal">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">
        	Statistiche Task
        </h4>
        <button type="button" class="close" data-dismiss='modal' data-toggle="modal" data-target="#tasks-campaign"><i class="fas fa-arrow-left"></i></button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<div class="modal fade" data-backdrop="static" id="new-task-campaign">
  <div class="modal-dialog new-task-modal">
    <div class="modal-content">
	   	<form role="form" id="new-task-form">
	      <!-- Modal Header -->
	      <div class="modal-header">
	        <h2>Aggiungi un task</h2>
	        <button type="button" class="close" data-dismiss='modal' data-toggle="modal" data-target="#tasks-campaign"><i class="fas fa-arrow-left"></i></a>
	      </div>
	      <!-- Modal body -->
	      <div class="modal-body">
			<div class="row form-group">
			  <!--INIZ 1 col-->
				<div class="col-md-6">
		          	<div class="row" style="margin-bottom: 10px;">
		          		<div class="col-md-12">
				            <label class="control-label">Titolo</label>
				            <input maxlength="200" type="text" name="title" required="required" class="form-control" placeholder="Inserisci il titolo" />
				        </div>
		          	</div>
		          	<div class="row" style="margin-bottom: 10px;">
			          	<div class="col-md-12">
			            	<label class="control-label">Descrizione</label>
							<textarea class="form-control" type="text" style="resize: none;" row="3" name="description" 
			                 	placeholder="Inserisci la descrizione" required='required'></textarea>
			          	</div>
		          	</div>
		          	<div class="row" style="margin-bottom: 10px;">
		          		<div class="col-md-2">
			                <label class="control-label">Lavoratori</label>
			                <input type="number" name="worker" required="required" class="form-control" placeholder="1" min="1" max="10" step="1"/>
			            </div>
			            <div class="col-md-3">
			                <label class="control-label">Maggioranza</label>
			                <input type="number" name="majority" required="required" class="form-control" placeholder="0%" min="0" max="100" step="10"/>
			            </div>
			            <div class="col-md-7">
			                <label class="control-label">Ricompenza</label>
			                <input maxlength="20" type="text" name="reward" class="form-control" placeholder="Inserisci la ricompenza"/>
			            </div>
		          	</div>
		          	<div class="row">
			          <div class="col-md-12 border-div">
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
			                <input class="skill-input form-control readonly" name="skill" type="text" required="required" placeholder="#" autocomplete="off"/>
			              </div>
			              <div class="col-md-1">
			                <button class="skill-remove btn btn-danger float-right" type="button">
			                  <i class="fas fa-times"></i>
			                </button>
			              </div>
			            </div>
			          </div>
		         	</div>	        	
			  	</div>
		      <!--FINE 1 col-->
 			  <!--INIZ 2 col-->
			  <div class="col-md-6">
				<div class="row form-group">
		          <div class="col-md-12">
		            <div class="row">
		              <div class="col-md-12">
		                <input class="form-control readonly input-answer-task" name="answer" type="hidden"/>
		              </div>
		            </div>
		          </div>
		          	<div class="col-md-12" id="answer-collapse"">
					  <div class="container-fluid">
					  	<label class="control-label">Risposte</label>
					    <div class="row form-group">
					      <div class="col-md-11">
					        <input type="text" id="test" class="form-control input-answer-div-task" placeholder="Scrivi le risposte" autocomplete="off"/>
					      </div>
					      <div class="col-md-1">
					        <button type="button" class="btn btn-primary float-right add-answer">
					          <i class="fas fa-plus"></i>
					        </button>
					      </div>
					    </div>
					    <div class="row">
					      <div class="col-md-12">
					        <ul class="answer-div-task ul-answer"></ul>
					      </div>
					    </div> 
					  </div>
					</div>
		        </div>
			  </div>
			  <!--FINE 2 col-->
			</div>
		  </div>
	      <!-- Modal footer -->
	      <div class="modal-footer">
	      	<button type="submit" class="btn btn-primary add-new-task">Aggiungi</button>
	      </div>
	  	</form>
    </div>
  </div>
</div>

<script>
	$('#new-task-form').bind('submit',function(e) {
	e.preventDefault();
	if($('#new-task-form').find('.input-answer-task').val() == ''){
		$('#new-task-form').find('.input-answer-div-task').css("border", "2px solid #e40a0a99");
		return;
	}

    var formData = $(this).serialize();
    var user = '<?php echo $_SESSION['user'] ?>';
    var campaign =  $(".title-details").html();
	    $.ajax({
	      type: "POST",
	      url: '../../php/query.php',
	      data: {Method:'insert_task', formData, user, campaign},
	      success: function(e){
	      	document.getElementById("new-task-form").reset();
	      	$('#new-task-campaign').find('.answer-div-task').empty();
  			$('.skill-category-select').attr('disabled', 'disabled');
			$('.skill-category-select').children('option').remove();
        	$('.skill-category-select').append('<option>---</option>');
	      	$('#answer-collapse').collapse('hide');
	      	$('#new-task-campaign').modal('hide');
	      	details(campaign, e);
	      	$('#tasks-campaign').modal('show');
	      }
	    });
  	});

  	$('#new-task-form').on('change', '.skill-select' ,function(){
	    populateSubCategory(0, $(this).children(":selected").attr("id"));
	    $(this).closest("div.row").find('.skill-category-select').removeAttr("disabled");
  	});

  	$('#new-task-form').on('click', '.skill-confirm' ,function(){
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

  	$('#new-task-form').on('click', '.skill-remove' ,function(){
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

	$(".readonly").keydown(function(e){
	    if(e.which != 9){
	      e.preventDefault();
	    }
	});

	$('.readonly').bind("cut paste",function(e) {
	    e.preventDefault();
	});

	$('#new-task-form').on('click', '.answerBtn' ,function(){
	    var index = 0;
	    value = $(this).closest('.row').find('.input-answer-task').val();
	    $('.ul-answer').empty();
	    while((index = value.indexOf('; ')) != -1){
	      $('.answer-div-task').append('<li class="li-answer">'+ value.substring(0, index) + '<span class="close-answer"><i class="fas fa-times"></i></span></li>');
	      value = value.substring(index+2, value.length);
	    }
  	});

	$('#new-task-form').on('click', '.add-answer' ,function(){
	    answer = $('.input-answer-div-task').val();
	    if(answer != '' && answer != " "){
	    	var exists = $('.answer-div-task li:contains('+answer+')').length;
			if(!exists){
				$('.answer-div-task').append('<li class="li-answer">'+ answer + '<span class="close-answer"><i class="fas fa-times"></i></span></li>');
	      		$('.input-answer-task').val($('.input-answer-task').val() + answer + '; ');
			}
	    $('.input-answer-div-task').val('');
	    }
	    $('#new-task-form').find('.input-answer-div-task').css('border-color', '1px solid #ced4da')
	});

	$('#new-task-form').on('click', '.close-answer' ,function(){
	    $(this).closest('li').remove();
	    input = '';
	    $('.answer-div-task li').each(function(i){
	      input = input + $(this).text() + '; ';
	    });
	    $('.input-answer-task').val(input);
	});

	$('#tasks-campaign').on('click', '.new-task-btn-add' ,function(){
		$('.skill-category-select').attr('disabled', 'disabled');
	});

	$('#tasks-campaign').on('click', '.task-analytics-button', function(){
		$('#tasks-campaign').modal('hide');
		$('#task-analtics').modal('show');
	});
</script>