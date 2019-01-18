<div>
	<h1 class="title">I Miei Task</h1>
	<div class="row menu-task filter-campaign" style="margin-bottom: 1pc;">
		<div class="col-md-12">
			<button class="sync-campaign btn btn-primary float-left" onclick="task_refresh('<?php echo $_SESSION['user']; ?>')" style="margin-left: 5px;" type="button">
	          <i class="fas fa-sync-alt"></i>
	        </button>
	        <button type="button" class="btn btn-primary float-left" style="margin-left: 5px;" data-toggle="modal" data-target="#legend">
                <i class="fas fa-info-circle"></i>
            </button>
            <div class="row float-right">
				<div class="select-status" data-toggle="buttons">
					<label class="btn btn-filter status-answer-3" data-target="3">
						<input type="radio" name="options" id="3" autocomplete="off"/>
					</label>
					<label class="btn btn-filter status-answer-2" data-target="2">
						<input type="radio" name="options" id="2" autocomplete="off">
					</label>
					<label class="btn btn-filter status-answer-0" data-target="0">
						<input type="radio" name="options" id="0" autocomplete="off">
					</label>
					<label class="btn btn-filter status-answer-1" data-target="1">
						<input type="radio" name="options" id="1" autocomplete="off">
					</label>
					<label class="btn btn-filter status-answer-all active" data-target="all">
						<input type="radio" name="options" id="1" autocomplete="off">
					</label>
				</div>
			</div>
	    </div>
	</div>

	<div class="row justify-content-md-center table-task">
		<div class="table-responsive">
			<table class="table table-striped table-hover">
		        <thead class="thead-dark">
		            <tr>
			    	    <th>Campagna</th>
		                <th>Titolo</th>
		                <th>Descrizione</th>
		                <th class='tabletxt-center'>Ricompensa</th>
		                <th class='tabletxt-center' style="width: 5%;">Rispondi</th>
		                <th class='tabletxt-center'>Stato</th>
		        	</tr>
		        	<tbody class="table-line-for-filter">
		        		<script>
		                    task_refresh('<?php echo $_SESSION['user']; ?>');
		        		</script>
		            </tbody>
		        </thead>
			</table>
		</div>
	</div>
</div>

<div class="modal fade" id="answer-div">
  <div class="modal-dialog response-modal">
	<form role="form" id="answer-form">
	    <div class="modal-content">
	      <!-- Modal Header -->
	      <div class="modal-header">
	        <h4 class="modal-title">
	        </h4>
	        <button type="button" class="close" data-dismiss='modal'>&times;</button>
	      </div>
	      <!-- Modal body -->
	      <div class="modal-body">
	      	<div class="row">
	      		<div class="col-md-12">
	      			<h3 class="title task-title"></h3>
	      		</div>
	      	</div>
	      	<div class="row" style="border-bottom: #e9ecef solid 0.1px;">
	      		<div class="col-md-12">
	      			<h4 class="title task-desc"></h4>
	      		</div>
	      	</div>
	      	<div class="row" style="padding: 2pc;">
	      		<div class="col-md-12 radio-input">
		      	</div>
	      	</div>
	      </div>
	      <!-- Modal footer -->
	      <div class="modal-footer">
	      	<button type="submit" class="btn btn-success">Rispondi</button>
	      </div>
	    </div>
	</form>
  </div>
</div>

<div class="modal fade" id="answer-div-response">
  <div class="modal-dialog response-modal">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">
        </h4>
        <button type="button" class="close" data-dismiss='modal'>&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body"></div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type='button' class='btn btn-primary' data-dismiss='modal'>Chiudi</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="legend">
  <div class="modal-dialog response-modal">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">
        	Stato
        </h4>
        <button type="button" class="close" data-dismiss='modal'>&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
      	<div class="table-responsive">
			<table class="table table-striped">
		        <thead class="thead-dark">
		        	<tbody>
		        		<tr>
		        			<td>Da rispondere</td>
		        			<td class="status-answer-3"></td>
		        		</tr>
		        		<tr>
		        			<td>In attesa di conferma</td>
		        			<td class="status-answer-2"></td>
		        		</tr>
		        		<tr>
		        			<td>Risposta errata</td>
		        			<td class="status-answer-0"></td>
		        		</tr>
		        		<tr>
		        			<td>Risposta corretta</td>
		        			<td class="status-answer-1"></td>
		        		</tr>
		            </tbody>
		        </thead>
			</table>
	  	</div>
    </div>
  </div>
  </div>
</div>

<div class="modal fade" id="sub-check-modal">
  <div class="modal-dialog response-modal">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header response-header-error">
        <h4 class="modal-title">
          <i class='fas fa-times-circle'></i> Iscriviti
        </h4>
        <button type="button" class="close" data-dismiss='modal'>&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body"></div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type='button' class='btn btn-danger' data-dismiss='modal' onclick="refreshOnTarget('#home')">Campagne</button>
      </div>
    </div>
  </div>
</div>

<script>
	//Submit FORM
	$('#answer-form').bind('submit',function(e) {
		e.preventDefault();

	    var formData = $(this).serialize();
	    var user = '<?php echo $_SESSION['user'] ?>';
	    var idTask =  $(".response-modal").attr('id');
    	var titleText = '';

   		$('#answer-div-response').find('.modal-header').removeClass("response-header-success");
    	$('#answer-div-response').find('.modal-header').removeClass("response-header-error");

	    $.ajax({
	      type: "POST",
	      url: '../../php/query.php',
	      data: {Method:'query_answer_submit', formData, user, idTask},
	      success: function(response){
	      		$('#answer-div').modal('hide');
	      		task_refresh(user);
	      		if(response == ''){
		          	titleText = "<i class='response-icon fas fa-check-circle'></i> Risposta avvenuta con successo";
		          	$('#answer-div-response').find('.modal-body').text("Hai risposto con successo! Attendi ora che venga calcolato il risultato.");
		          	$('#answer-div-response').find('.modal-header').addClass("response-header-success");
	      		} else {
	      			titleText = "<i class='fas fa-times-circle'></i> Errore";
         			$('#answer-div-response').find('.modal-body').text(response);
          			$('#answer-div-response').find('.modal-header').addClass("response-header-error");
	      		}
        		$('#answer-div-response').find('.modal-title').html(titleText);
	      		$('#answer-div-response').modal('show');
	      	}
	    });
	  });

	$('.table-task').on('click', '.btn-answer' ,function(){
		$idTask = $(this).closest('tr').attr('id').substring($(this).closest('tr').attr('id').indexOf('-')+1, $(this).closest('tr').attr('id').length);
		$user = '<?php echo $_SESSION['user'] ?>';

		$title = $(this).closest('tr').find('.title-task-record').text();
		$desc = $(this).closest('tr').find('.desc-task-record').text();

		$('.task-title').text($title);
		$('.task-desc').text($desc);
		$('.response-modal').attr('id', $idTask);
		
	    $.ajax({
	      type: "POST",
	      url: '../../php/query.php',
	      data: {Method:'query_task_answer', idTask: $idTask},
	      success: function(response){
	      	$('.radio-input').html(response);
	      }
	    });

	    //CHECK ISCRIZIONE
		$.ajax({
		      type: "POST",
		      url: '../../php/query.php',
		      data: {Method:'query_check_sub',user: $user,idTask: $idTask},
		      success: function(response){
		      	if(response != ''){
			      	$('#sub-check-modal').find('.modal-body').html(response);
	      			$('#sub-check-modal').modal('show');
      			} else {
      				$('#answer-div').modal('show');
      			}
		      }
		});
	});

	$(document).ready(function () {
	    $('.btn-filter').on('click', function () {
	      var $target = $(this).data('target');
	      if ($target != 'all') {
	        $('.table-line-for-filter tr').css('display', 'none');
	        $('.table-line-for-filter tr[data-status="' + $target + '"]').fadeIn('slow');
	      } else {
	        $('.table-line-for-filter tr').css('display', 'none').fadeIn('slow');
	      }
	    });
 	});
</script> 