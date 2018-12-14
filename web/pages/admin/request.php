<!--REQUEST-->
<div class="row justify-content-md-center">
	<h1 class="title">Richieste REQUESTER</h1>
</div>
<div class="row justify-content-md-center">
	<div class="table-responsive" style="width: 70%;">
		<table class="table table-striped table-hover">
	        <thead class="thead-dark">
	            <tr>
	    	        <th>User</th>
	                <th class='tabletxt-center'>Nome</th>
	                <th class='tabletxt-center'>Cognome</th>
	                <th class='tabletxt-center'>Città</th>
	                <th class='tabletxt-center' style="width: 5%;">Azione</th>
	        	</tr>
	        	<tbody>
	                <?php
	                    query_user_request();
	                ?>
	            </tbody>
	        </thead>
		</table>
	</div>
</div>

<div class="modal fade" data-backdrop="static" id="accept">
  <div class="modal-dialog response-modal">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header response-header-success">
        <h4 class="modal-title">
        	<i class='response-icon fas fa-check-circle'></i> Requester accettato
        </h4>
        <button type="button" class="close" data-dismiss='modal' onclick="refreshOnTarget('#request')">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="col-md-12 modal-body">
      	Il requester ora potrà accedere al suo account e creare nuove campagna!
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
      	<button type='button' class='btn btn-success' data-dismiss='modal' onclick="refreshOnTarget('#request')">Chiudi</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" data-backdrop="static" id="refused">
  <div class="modal-dialog response-modal">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header response-header-error">
        <h4 class="modal-title">
        	<i class='fas fa-times-circle'></i> Confermi?
        </h4>
        <button type="button" class="close" data-dismiss='modal' onclick="refreshOnTarget('#request')">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body"></div>
      <!-- Modal footer -->
      <div class="modal-footer">
      	<button type='button' class='btn btn-danger' data-dismiss='modal'>Elimina</button>
      </div>
    </div>
  </div>
</div>