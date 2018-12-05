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

<div id='details' class='overlay'>
    <div class='popup'>
    	<a class='close' href=''>×</a>
    	<h2 class="title title-details"></h2>
        <div class="table-responsive">
			<table class="table table-striped table-hover">
		        <thead class="table-details thead-dark">
		            <tr>
		    	        <th>Titolo</th>
		                <th>Descrizione</th>
		                <th class='tabletxt-center'>#Lavoratori</th>
		                <th class='tabletxt-center'>Maggioranza</th>
		                <th class='tabletxt-center'>Ricompensa</th>
		                <th class='tabletxt-center'>Risposte</th>
		                <th class='tabletxt-center'>Keywords</th>
		                <th class='tabletxt-center'>Fase</th>
		        	</tr>
		        	<tbody class='content-details'>
		            </tbody>
		        </thead>
			</table>
		</div>
    </div>
</div>