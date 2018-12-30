<!--CAMPAIGNS-->
<div>
	<h1 class="title">I Miei Task</h1>
	<div class="row filter-campaign-select" style="margin-bottom: 1pc;">
		<div class="col-2">
			<button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#legend">
                <i class="fas fa-info-circle"></i>
            </button>
            <button class="sync-campaign btn btn-primary" onclick="task_refresh('<?php echo $_SESSION['user']; ?>')" style="margin-left: 5px;" type="button">
	          <i class="fas fa-sync-alt"></i>
	        </button>
		</div>
		<div class="col-md-5">
		</div>
		<div class="col-4">
			<div class="col-md-12">
				<select class="form-control select-campaign">
					<option>---</option>
			      	<?php
		                $user = $_SESSION['user'];
		                query_campaign_wrk_select($user);
		            ?>
			    </select>
			</div>
		</div>
		<div class="col-md-1">
			<button class="filter-campaign btn btn-primary" type="button">
	          <i class="fas fa-filter"></i>
	        </button>
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
	        	<tbody>
	        		<script>
	                    task_refresh('<?php echo $_SESSION['user']; ?>');
	        		</script>
	            </tbody>
	        </thead>
		</table>
	</div>
</div>

<div class="modal fade" data-backdrop="static" id="answer-div">
  <div class="modal-dialog response-modal">
	<form role="form" id="answer-form">
	    <div class="modal-content">
	      <!-- Modal Header -->
	      <div class="modal-header">
	        <h4 class="modal-title">
	        </h4>
	        <button type="button" class="close" data-dismiss='modal' onclick="refreshOnTarget('#task_worker')">&times;</button>
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

<div class="modal fade" data-backdrop="static" id="legend">
  <div class="modal-dialog response-modal">
	<form role="form" id="answer-form">
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
	      </div>
	</form>
  </div>
</div>

<script>
	//Submit FORM
	$('#answer-form').bind('submit',function(e) {
		e.preventDefault();

	    var formData = $(this).serialize();
	    var user = '<?php echo $_SESSION['user'] ?>';
	    var idTask =  $(".response-modal").attr('id');

	    $.ajax({
	      type: "POST",
	      url: '../../php/query.php',
	      data: {Method:'query_answer_submit', formData, user, idTask},
	      success: function(response){
	      		$('#answer-div').modal('hide');
	      		task_refresh(user);
	      	}
	    });
	  });

	$('.table-task').on('click', '.btn-answer' ,function(){
		$idTask = $(this).closest('tr').attr('id').substring($(this).closest('tr').attr('id').indexOf('-')+1, $(this).closest('tr').attr('id').length);
		$title = $(this).closest('tr').find('.title-task-record').html();
		$desc = $(this).closest('tr').find('.desc-task-record').html();
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
	});
</script> 