<!--CAMPAIGNS-->
<div>
	<h1 class="title">I Miei Task</h1>
	<div class="row filter-campaign-select" style="margin-bottom: 1pc;">
		<div class="col-md-8"></div>
		<div class="col-md-3 float-right">
			<select class="form-control select-campaign">
		      	<?php
	                $user = $_SESSION['user'];
	                query_campaign_wrk_select($user);
	            ?>
		    </select>
		</div>
        <div class="col-md-1">
	        <button class="filter-campaign btn btn-primary" type="button">
	          <i class="fas fa-filter"></i>
	        </button>
      	</div>
	</div>
<div class="row justify-content-md-center">
	<div class="table-responsive">
		<table class="table table-striped table-hover">
	        <thead class="thead-dark">
	            <tr>
	    	    <th>Campagna</th>
                <th class='tabletxt-center'>Titolo</th>
                <th class='tabletxt-center'>Descrizione</th>
                <th class='tabletxt-center'>Ricompensa</th>
                <th class='tabletxt-center' style="width: 5%;">Rispondi</th>
                <th class='tabletxt-center'>Stato</th>
	        	</tr>
	        	<tbody>
	                <?php
	                    $user = $_SESSION['user'];
	                    query_task_wrk($user);
	                ?>
	            </tbody>
	        </thead>
		</table>
	</div>
</div>

<script>
	$('.filter-campaign-select').on('click', '.select-campaign' ,function(){
    $user = '<?php echo $_SESSION['user'] ?>';
    alert("E");
    /*
      $.ajax({ url: '../../php/query.php',
      data: {Method:'query_remove_campaign', user: $user, campaign: $campaign},
      type: 'POST',
      success: function(e) {
        $campaignDiv.removeClass('subbed');
        $campaignDiv.find('.img-fluid').attr("src","../../ico/campaign.png");
        $campaignDiv.find('.card-body').removeClass('sub');
        $campaignDiv.find('.btn-sub').removeClass('btn-success');
        $campaignDiv.find('.btn-sub').addClass('btn-danger');
        $campaignDiv.find('.btn-sub').text('Iscriviti');
        $campaignDiv.find('.btn-sub-remove').attr('hidden', 'hidden');
        $campaignDiv.find('.btn-sub').attr('data-target', '#sub');
      },
      error: function(e) {
        alert(e);
      }
    });
    */
  });
</script>