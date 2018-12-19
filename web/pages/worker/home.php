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
    alert($(this).attr('class'));
    $.ajax({ url: '../../php/query.php',
      data: {Method:'query_sub_campaign', user: $user, campaign: $campaign},
      type: 'POST',
      success: function(e) {
        alert($(this));
        $(this).closest('.card-campaign').find('.main').removeClass('cnt-block');
        $(this).closest('.card-campaign').find('.main').addClass("cnt-block-sub");
        $(this).find('.fas').removeClass('fa-plus');
        $(this).find('.fas').addClass("fa-times");
        $(this).removeClass('btn-sub');
        $(this).find('.btn-sub').addClass("btn-sub-remove");
      },
      error: function(e) {
        alert(e);
      }
    });
  });

    $('.card-campaign').on('click', '.btn-sub-remove' ,function(){
    $user = '<?php echo $_SESSION['user'] ?>';
    $campaign = $(this).closest(".card-campaign").attr("id");
    alert($(this).attr('class'));
    $.ajax({ url: '../../php/query.php',
      data: {Method:'query_remove_campaign', user: $user, campaign: $campaign},
      type: 'POST',
      success: function(e) {
        alert(e);
        $(this).closest('.card-campaign').find('.main').removeClass('cnt-block-sub');
        $(this).closest('.card-campaign').find('.main').addClass("cnt-block");
        $(this).find('.fas').removeClass('fa-times');
        $(this).find('.fas').addClass("fa-plus");
        $(this).removeClass('btn-sub-remove');
        $(this).addClass("btn-sub");
      },
      error: function(e) {
        alert(e);
      }
    });
  });
</script>