<section class="our-webcoderskull">
  <h2 class="title">Campagne</h2>
  <div class="container">
      <ul class="row ul-campaigns-worker">
        <?php
          $user = $_SESSION['user'];
          query_campaign_wrk($user);
        ?>
      </ul>
    </div>
</section>

<script>
  $('.card-campaign').on('click', '.btn-sub' ,function(){
    $user = '<?php echo $_SESSION['user'] ?>';
    $campaign = $(this).closest(".card-campaign").attr("id");
    $campaignDiv = $(this).closest(".card-campaign");

    if( $(this).hasClass('btn-danger')){
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
          $campaignDiv.find('.btn-sub-remove').removeAttr("hidden");
        },
        error: function(e) {
          alert(e);
        }
      });
    } else {
      alert("RICHIEDO TASK");
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
        $campaignDiv.find('.btn-sub-remove').attr('hidden', 'hidden');
      },
      error: function(e) {
        alert(e);
      }
    });
  });
</script>