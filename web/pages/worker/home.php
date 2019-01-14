<section class="our-webcoderskull">
  <h1 class="title">Campagne</h1>
  <div class="container">
      <ul class="row ul-campaigns-worker">
        <?php
          $user = $_SESSION['user'];
          query_campaign_wrk($user);
        ?>
      </ul>
    </div>
</section>

<div class="modal fade" id="sub">
  <div class="modal-dialog response-modal">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header response-header-success">
        <h4 class="modal-title">
          <i class='response-icon fas fa-check-circle'></i> Complimenti
        </h4>
        <button type="button" class="close" data-dismiss='modal'>&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        Ti sei iscritto alla campagna! ora puoi richiedere un task premendo "Richiedi Task".
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type='button' class='btn btn-primary' data-dismiss='modal'>Chiudi</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="task">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header response-header-success">
        <h4 class="modal-title">
          <i class='response-icon fas fa-plus-circle'></i> Task
        </h4>
        <button type="button" class="close" data-dismiss='modal'>&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        Complimenti è stato aggiunto un nuovo task! Vai a controllare nei tuoi task disponibili per poter rispondere subito.
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss='modal' onclick="refreshOnTarget('#task_worker')">I Miei Task</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="task_response">
  <div class="modal-dialog">
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
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="campaign-analytics">
  <div class="modal-dialog response-modal">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">
          Statistiche Campagna
        </h4>
        <button type="button" class="close" data-dismiss='modal'>&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        Rimozione iscrizione avvenuta con successo! tutti i task a cui hai già riposto resteranno mantenuti in memoria! 
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type='button' class='btn btn-primary' data-dismiss='modal'>Chiudi</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="remove-sub">
  <div class="modal-dialog response-modal">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header response-header-error">
        <h4 class="modal-title">
          <i class='response-icon fas fa-times-circle'></i> Iscrizione rimossa
        </h4>
        <button type="button" class="close" data-dismiss='modal'>&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        Rimozione iscrizione avvenuta con successo! tutti i task a cui hai già riposto resteranno mantenuti in memoria! 
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type='button' class='btn btn-primary' data-dismiss='modal'>Chiudi</button>
      </div>
    </div>
  </div>
</div>

<script>
  $('.card-campaign').on('click', '.btn-sub' ,function(){
    $user = '<?php echo $_SESSION['user'] ?>';
    $campaign = $(this).closest(".card-campaign").attr("id");
    $campaignDiv = $(this).closest(".card-campaign");

    var button = '';
    var titleText = '';

    $response_not = "Non è stato trovato un task corrispondente alle tue capacità! Riprova più tardi.";
    $response = "Complimenti è stato aggiunto un nuovo task! Vai a controllare nei tuoi task disponibili per poter rispondere subito.";

    $('#task_response').find('.modal-header').removeClass("response-header-success");
    $('#task_response').find('.modal-header').removeClass("response-header-error");

    if($(this).hasClass('btn-danger')){
      //ISCRIVERE
        $.ajax({ url: '../../php/query.php',
        data: {Method:'query_sub_campaign', user: $user, campaign: $campaign},
        type: 'POST',
        success: function(e) {
          $campaignDiv.addClass('subbed');
          $campaignDiv.find('.img-fluid').attr("src","../../ico/campaign-sub.png");
          $campaignDiv.find('.card-body').addClass('sub');
          $campaignDiv.find('.btn-sub').removeClass('btn-danger');
          $campaignDiv.find('.btn-sub').addClass('btn-success');
          $campaignDiv.find('.btn-sub').text('Richiedi Task');
          $campaignDiv.find('.btn-camp-analy').removeAttr("hidden");
          $campaignDiv.find('.btn-sub-remove').removeAttr("hidden");
          $campaignDiv.find('.btn-sub').attr('data-target', '#task_response');
          select_campaign_filter('<?php echo $_SESSION['user']; ?>');
        }
      });
    } else {
      $.ajax({ url: '../../php/query.php',
        data: {Method:'query_task_assignment', user: $user, campaign: $campaign},
        type: 'POST',
        success: function(e) {
          if(e != ''){
            button = "<button type='button' class='btn btn-success' data-dismiss='modal' onclick="+"refreshOnTarget('#task_worker')"+">I Miei Task</button>";
            titleText = "<i class='response-icon fas fa-check-circle'></i> Task aggiunto";
            $('#task_response').find('.modal-body').text($response);
            $('#task_response').find('.modal-header').addClass("response-header-success");
          }else {
            button = "<button type='button' class='btn btn-primary' data-dismiss='modal'>Chiudi</button>";
            titleText = "<i class='fas fa-times-circle'></i> Nessun task trovato";
            $('#task_response').find('.modal-body').text($response_not);
            $('#task_response').find('.modal-header').addClass("response-header-error");
          }
          $('#task_response').find('.modal-footer').html(button);
          $('#task_response').find('.modal-title').html(titleText);
        }
      });
    }
  });

  $('.card-campaign').on('click', '.btn-sub-remove' ,function(){
    $user = '<?php echo $_SESSION['user'] ?>';
    $campaign = $(this).closest(".card-campaign").attr("id");
    $campaignDiv = $(this).closest(".card-campaign");

      //RIMUOVERE ISCRIZIONE
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
        $campaignDiv.find('.btn-camp-analy').attr('hidden','hidden');
        $campaignDiv.find('.btn-sub-remove').attr('hidden', 'hidden');
        $campaignDiv.find('.btn-sub').attr('data-target', '#sub');
      },
      error: function(e) {
        alert(e);
      }
    });
  });
</script>