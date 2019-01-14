/*******************************************
GESTIONE SIDEBAR MENU
*******************************************/
//FUNZIONE MENU
$(document).ready(function(){

      var navListItems = $('.admin-menu li');
      var allWells = $('.admin-content');
      allWells.hide();

      var activeTab = window.localStorage.getItem('activeTab');
      if (activeTab) {
        allWells.hide();
        location.hash = activeTab;
        $(activeTab).show();
        navListItems.removeClass('active');
        $('li a[href="' + activeTab + '"]').closest('li').addClass('active');
      } else {
        TabToActive = navListItems.first();
        TabToActive.addClass('active');
        $(TabToActive).show();
      }

      $('a[data-toggle="tab"]').on('click', function(e) {
          window.localStorage.setItem('activeTab', $(this).attr('href'));
          navListItems.removeClass('active');
          $(this).closest('li').addClass('active');
          allWells.hide();
          var target = $(this).attr('href');
          location.hash = target;
          $(target).show();
      });
});

function refreshOnTarget(target){
  var navListItems = $('.admin-menu li');
  var allWells = $('.admin-content');
  allWells.hide();
  navListItems.removeClass('active');
  
  $('a[href="'+ target +'"]').closest('li').addClass('active');
  location.hash = target;
  window.localStorage.setItem('activeTab', $('a[href="'+ target +'"]').attr('href'));
  $(target).show();
  location.reload();
}

/*******************************************
ELENCO CAMPAGNE
*******************************************/
//FUNZIONE RIEMPI DIV DEL DETTAGLIO
function details(name, id) {
  $(".content-details").html("");
  $( ".title-details" ).html("").append(name);
  $.ajax({ url: '../../php/query.php',
           data: {Method:'query_details', id: id},
           type: 'POST',
           success: function(e) {
             $(".content-details").append(e);
           }
  });
}

function deleteCampaign(id) {
  $.ajax({  
    url: '../../php/query.php',
    data: {Method:'delete_campaign', id: id},
    type: 'POST',
    success: function(e) {
      location.reload();
    },
  });
}

/*******************************************
CREA CAMPAGNA
*******************************************/
//FUNZIONE GESTIONE FORM STEP - CREA CAMPAGNA
$(document).ready(function () {
    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');
            allBackBtn = $('.backBtn');
    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            navListItems.addClass('disabled');
            $item.addClass('btn-primary');
            $item.addClass('btn-primary');
            $item.removeClass('disabled')
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });
    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='date'],input[type='number'], textarea[type='text']"),
            isValid = true;

        $(".form-control").removeClass("is-invalid");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-control").addClass("is-invalid");
            }
        }

        if(curStep.attr('id').substring(curStep.attr("id").length - 1) == 2){

        }

        if (isValid)
            nextStepWizard.removeClass('disabled').trigger('click');
    });
    allBackBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            backStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a");

            if(curStep.attr('id').substring(curStep.attr("id").length - 1) == 2){
              $('#dt_end').attr('disabled', 'disabled');
              $('#dt_accession_start').attr('disabled', 'disabled');
              $('#dt_accession_end').attr('disabled', 'disabled');
            }

            backStepWizard.removeClass('disabled').trigger('click');
    });
    $('div.setup-panel div a.btn-primary').trigger('click');
});

//FUNZIONE SELECT TASK
function populateSelect(){
  $.ajax({ 
    url: '../../php/query.php',
    data: {Method:'query_skill'},
    type: 'POST',
      success: function(e) {
        $('.skill-select').children('option').remove();
        $(".skill-select").append("<option>---</option>");
        $(".skill-select").append(e);
      }
  });
}

function populateAnalyticsTask(id){
  
}

function populateDetailsTask(id){
  $('#answer-skill').find('.answer-ofTask').empty();
  $('#answer-skill').find('.skills-footer-details-campaign').html('');
    $.ajax({ 
      url: '../../php/query.php',
      data: {Method:'query_answer_details', id},
      type: 'POST',
        success: function(e) {
          $('#answer-skill').find('.answer-ofTask').append(e);
        }
    });

    $.ajax({ 
      url: '../../php/query.php',
      data: {Method:'query_skill_task', id},
      type: 'POST',
        success: function(e) {
          $('#answer-skill').find('.skills-footer-details-campaign').append(e);
        }
    });

  $('#tasks-campaign').modal('hide');
  $('#answer-skill').modal('show');
}

//FUNZIONE SELECT SUB CATEGORY
function populateSubCategory(id, category){
  if(category == null){
    if(id != 0){
      $('.main-div').find("#" + id).find('.skill-category-select').children('option').remove();
      $('.main-div').find("#" + id).find('.skill-category-select').append('<option>---</option>');
    }else{
      $('.skill-category-select').children('option').remove();
      $('.skill-category-select').append('<option>---</option>');
    }
    return;
  }

  $.ajax({ 
    url: '../../php/query.php',
    data: {Method:'query_skill_subcategory', id_category: category},
    type: 'POST',
      success: function(e) {
        if(id != 0){
          $('.main-div').find("#" + id).find('.skill-category-select').children('option').remove();
          $('.main-div').find("#" + id).find('.skill-category-select').append('<option>---</option>');
          $('.main-div').find("#" + id).find('.skill-category-select').append(e);
        } else {
          $('.skill-category-select').children('option').remove();
          $('.skill-category-select').append('<option>---</option>');
          $('.skill-category-select').append(e);
        }
      }
  });
}

//FUNZIONE ADD TASK
var i=1;
function addTask() {
  clone = $('#task-1').clone();
  clone.attr('id', 'task-' + ++i);
  clone.find('input').val("");
  clone.attr('disabled', 'disabled');
  clone.find('.skill-select').val('---');
  clone.find('.skill-category-select').val('---');
  clone.find('.skill-category-select').attr('disabled', 'disabled');
  clone.find('.skill-select').css('border-color', '#ced4da');
  clone.find('.nTask').text('#' + i);
  clone.find('.input-answer').removeClass('readonly');
  clone.find('.content-task').removeAttr('hidden');
  clone.find('input').each(function(){
    $(this).attr('id', $(this).attr("id").substring(0, $(this).attr("id").length - 2) + "-" + i);
    $(this).attr('name', $(this).attr("name").substring(0, $(this).attr("id").length - 2) + "-" + i);
  });
  clone.find('textarea').attr('id', clone.find('textarea').attr("id").substring(0, clone.find('textarea').attr("id").length - 2) + "-" + i);
  clone.find('textarea').attr('name', clone.find('textarea').attr("name").substring(0, clone.find('textarea').attr("id").length - 2) + "-" + i);
  $("div.main-div").append(clone);
}

//FUNZIONE RIEPILOGO
function printResults(){
  $("#name-recap").text($("#name").val());
  $("#dt_start-recap").text($("#dt_start").val());
  $("#dt_end-recap").text($("#dt_end").val());
  $("#dt_accession_start-recap").text($("#dt_accession_start").val());
  $("#dt_accession_end-recap").text($("#dt_accession_end").val());
  
  $('.recap-tasks').empty();

  for(var k=1; k<i+1; k++){
    if($('#task-'+k).length){
      clone = $('.recap-item-ref').clone();
      clone.removeClass('recap-item-ref');
      clone.addClass('recap-item');
      clone.find('.nTask-recap').text("#"+k);
      clone.find('.title-task-recap').text("Titolo : " + $('#title-'+k).val());
      clone.find('.desc-task-recap').text("Descrizione : " + $('#description-'+k).val());
      clone.find('.worker-task-recap').text("Lavoratori : " + $('#worker-'+k).val());
      clone.find('.majority-task-recap').text("Maggioranza : " + $('#majority-'+k).val());
      clone.find('.reward-task-recap').text("Ricompenza : " + $('#reward-'+k).val());
      clone.find('.key-task-recap').text("Parole chiave : " + $('#skill-'+k).val());
      clone.find('.answer-task-recap').text("Risposte : " + $('#answer-'+k).val());;
      clone.removeAttr('hidden');
      $('.recap-tasks').append(clone);
    }
  }
}

/*******************************************
PROFILE
*******************************************/

function profile(user){
  $.ajax({ 
      url: '../../php/query.php',
      data: {Method:'query_skill_wrk', user: user},
      type: 'POST',
        success: function(e) {
          $('#profile').find('.skills-div-profile').html(e);
        }
    });
}

function populateSkill(user){
  $.ajax({ 
      url: '../../php/query.php',
      data: {Method:'query_skill_ul_wrk', user: user},
      type: 'POST',
        success: function(e) {
          $('#edit-skill').find('.skill-div').html(e);
        }
    });
  $.ajax({ 
      url: '../../php/query.php',
      data: {Method:'query_skill_input_populate', user: user},
      type: 'POST',
        success: function(e) {
          $('#edit-skill').find('#skill-input').val('').val(e);
        }
    });
  $.ajax({ 
      url: '../../php/query.php',
      data: {Method:'query_skill'},
      type: 'POST',
        success: function(e) {
          $('#edit-skill').find('.skill-subcategory-select').children('option').remove();
          $('#edit-skill').find('.skill-subcategory-select').append('<option>---</option>');
          $('#edit-skill').find('.skill-subcategory-select').attr("disabled", 'disabled');
          $('#edit-skill').find('.skill-category-select').children('option').remove();
          $('#edit-skill').find('.skill-category-select').append("<option>---</option>");
          $('#edit-skill').find('.skill-category-select').append(e);
        }
    });
}

function populateSubCategorySkill(category){
    if(category == null){
        $('#edit-skill').find('.skill-subcategory-select').children('option').remove();
        $('#edit-skill').find('.skill-subcategory-select').append('<option>---</option>');
        return;
    }

    $.ajax({ 
    url: '../../php/query.php',
    data: {Method:'query_skill_subcategory', id_category: category},
    type: 'POST',
      success: function(e) {
        $('#edit-skill').find('.skill-subcategory-select').children('option').remove();
        $('#edit-skill').find('.skill-subcategory-select').append('<option>---</option>');
        $('#edit-skill').find('.skill-subcategory-select').append(e);
      }
    });
}

/*******************************************
ADMIN
*******************************************/
function esito(user, esito){
  if(esito.localeCompare("accept") == 0){
    $.ajax({ 
      url: '../../php/query.php',
      data: {Method:'query_accept_user', user: user},
      type: 'POST',
        success: function(e) {
        }
    });
  } else {
    $.ajax({ 
      url: '../../php/query.php',
      data: {Method:'query_refuse_user', user: user},
      type: 'POST',
        success: function(e) {
          location.reload();
        }
    });
  }
}

/*******************************************
WORKER
*******************************************/
function task_refresh(user){
  $('.table-task').find('tbody').empty();

    $.ajax({ 
    url: '../../php/query.php',
    data: {Method:'query_task_wrk', user},
    type: 'POST',
      success: function(e) {
        $('.table-task').find('tbody').append(e);
      }
  });
}

function select_campaign_filter(user){
  $('.filter-panel').find('.select-campaign').empty();
  $('.filter-panel').find('.select-campaign').append("<option>---</option>");

    $.ajax({
    url: '../../php/query.php',
    data: {Method:'query_campaign_wrk_select', user},
    type: 'POST',
      success: function(e) {
        $('.filter-panel').find('.select-campaign').append(e);
      }
  });
}