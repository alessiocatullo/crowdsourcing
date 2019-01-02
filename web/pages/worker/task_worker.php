<!--CAMPAIGNS-->
<div>
	<h1 class="title">I Miei Task</h1>
	<div class="row menu-task filter-campaign" style="margin-bottom: 1pc;">
		<div class="col-md-12">
			<button class="sync-campaign btn btn-primary float-right" onclick="task_refresh('<?php echo $_SESSION['user']; ?>')" style="margin-left: 5px;" type="button">
	          <i class="fas fa-sync-alt"></i>
	        </button>
	        <button type="button" class="btn btn-primary float-right" style="margin-left: 5px;" data-toggle="modal" data-target="#legend">
                <i class="fas fa-info-circle"></i>
            </button>
	        <button type="button" class="btn btn-primary filter-btn float-right" data-toggle="collapse" data-target="#filter-panel">
	            Filtro
	        </button>
	        <div id="filter-panel" class="collapse filter-panel float-right" style="width: 100%;">
	            <div class="panel panel-default">
	                <div class="panel-body">
	                	<div class="row justify-content-md-center" style="margin-bottom: 1pc;">
	                		<div class="col-md-3" style="margin-right: 10px;">
	                			<div class="row">
	                				<h5>Titolo</h5>
	                			</div>
	                			<div class="row">
	                				<input type="text" class="form-control input-sm select-title">
	                			</div>
	                		</div>
	                		<div class="col-md-3">
	                			<div class="row">
	                				<h5>Campagna</h5>
	                			</div>
	                			<div class="row">
						            <select class="form-control select-campaign">
						            	<script>select_campaign_filter('<?php echo $_SESSION['user']; ?>');</script>
								    </select>
								</div>
	                		</div>
	                		<div class="col-md-2 " style="margin-left: 10px;">
	                			<div class="row">
	                				<h5>Stato</h5>
	                			</div>
	                			<div class="row">
									<div class="select-status" data-toggle="buttons">
										<label class="btn status-answer-3">
											<input type="checkbox" name="options" id="3" autocomplete="off"/>
										</label>
										<label class="btn status-answer-2">
											<input type="checkbox" name="options" id="2" autocomplete="off">
										</label>
										<label class="btn status-answer-0">
											<input type="checkbox" name="options" id="0" autocomplete="off">
										</label>
										<label class="btn status-answer-1">
											<input type="checkbox" name="options" id="1" autocomplete="off">
										</label>
									</div>
	                			</div>
	                		</div>
	                		<div class="col-md-1">
	                			<button type="button" class="btn btn-primary confirm-filter" style="position: absolute; bottom: 0px;">
                            		Conferma
                            	</button>  
	                		</div>
	                	</div>
	                </div>
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

<div class="modal fade" id="legend">
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

	$('.filter-panel').on('click','.confirm-filter',function() {
		$title = $('.filter-panel').find('.select-title').val();
		$campaign = $('.filter-panel').find('.select-campaign :selected').text();
		$status3 = null; $status2 = null; $status0 = null; $status1 = null;
		$('.filter-panel').find('.select-status .active input').each(
			function(){
				switch($(this).attr('id')) {
				  case '3':
				    $status3 = 3;
				    break;
				  case '2':
				    $status2 = 2;
				    break;
				  case '0':
				  	$status0 = 0;
				  	break;
				  case '1':
				  	$status1 = 1;
				  	break;
				} 
			}
		);
		if($campaign.localeCompare('---') == 0){
			$campaign = '';
		}

	    $('.table-line-for-filter tr').filter(function() {
	    	$(this).toggle(	
	    		$(this).children(":eq(1)").text().indexOf($title) > -1 && 
	    		$(this).children(":eq(0)").text().indexOf($campaign) > -1 );/*&& !(	    			
			    		$(this).children(":eq(5)").text().indexOf($status3) > -1 ||
			    		$(this).children(":eq(5)").text().indexOf($status2) > -1 ||
			    		$(this).children(":eq(5)").text().indexOf($status0) > -1 ||
			    		$(this).children(":eq(5)").text().indexOf($status1) > -1
		    		));*/
	    		

		    	/*$('.table-line-for-filter tr').filter(function() {
			    	if($status3 != null || $status2 != null || $status0 != null || $status1 != null){
			    		$(this).toggle(
				    		$(this).children(":eq(5)").text().indexOf($status3) > -1 ||
				    		$(this).children(":eq(5)").text().indexOf($status2) > -1 ||
				    		$(this).children(":eq(5)").text().indexOf($status0) > -1 ||
				    		$(this).children(":eq(5)").text().indexOf($status1) > -1
			    		);
			    	}
			    });*/
	    });
	});
</script> 