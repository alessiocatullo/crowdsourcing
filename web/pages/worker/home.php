<section class="our-webcoderskull">
  <h2 class="title">Campagne</h2>
  <div class="container">
      <ul class="row ul-campaigns-worker">
        <li class="col-12 col-md-6 col-lg-3">
          <div class="card-campaign">
            <div class="banner row">
              <div class="col-md-12">
                <button class="btn btn-result btn-sub float-right" type="button">
                  <i class="fas fa-plus"></i>
                </button>
              </div>
            </div>
            <div class="main cnt-block equal-hight">
              <h3 class="name-campaigns">Guptam Holla</h3>
              <p class="dt_start_campagins">Data inizio:</p>
              <p class="dt_end_campagins">Data fine:</p>
            </div>
          </div>
        </li>
      </ul>
    </div>
</section>

<script>
  $('.card-campaign').on('click', '.btn-sub' ,function(){
    $(this).closest('.card-campaign').find('.main').removeClass('cnt-block');
    $(this).closest('.card-campaign').find('.main').addClass("cnt-block-sub");
  });
</script>