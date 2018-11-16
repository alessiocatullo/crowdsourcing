/*******************************************
GESTIONE SIDEBAR MENU
*******************************************/
//FUNZIONE MENU
$(document).ready(function(){
      var navItems = $('.admin-menu li > a');
      var navListItems = $('.admin-menu li');
      var allWells = $('.admin-content');
      var allWellsExceptFirst = $('.admin-content:not(:first)');
    
      allWellsExceptFirst.hide();
      navItems.click(function(e)
      {
          e.preventDefault();
          navListItems.removeClass('active');
          $(this).closest('li').addClass('active');
          
          allWells.hide();
          var target = $(this).attr('data-target-id');
          location.hash = target;
          $('#' + target).show();
      });
});

/*******************************************
ELENCO CAMPAGNE
*******************************************/
//FUNZIONE RIEMPI DIV DEL DETTAGLIO
function details(name, id) {
  $(".content-details").html("");
  $( ".title-details" ).append(name);
  $.ajax({ url: '../php/query.php',
           data: {Method:'query_details', id: id},
           type: 'POST',
           success: function(e) {
             $(".content-details").append(e);
           }
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

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='date'],input[type='number']"),
            isValid = true;

        $(".form-control").removeClass("is-invalid");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-control").addClass("is-invalid");
            }
        }

        if (isValid)
            nextStepWizard.removeClass('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
});

//FUNZIONE RIEPILOGO
function printResults(){
  $("#name-recap").append($("#name").val());
  $("#dt_start-recap").append($("#dt_start").val());
  $("#dt_end-recap").append($("#dt_end").val());
  $("#dt_accession_start-recap").append($("#dt_accession_start").val());
  $("#dt_accession_end-recap").append($("#dt_accession_end").val());
}

//FUNZIONE SELECT TASK
function populateSelect(){
  $.ajax({ 
    url: '../php/query.php',
    data: {Method:'query_skill'},
    type: 'POST',
      success: function(e) {
        $('.skill-select').children('option').remove();
        $(".skill-select").append("<option>---</option>");
        $(".skill-select").append(e);
      }
  });
}

//FUNZIONE SELECT SUB CATEGORY
function populateSubCategory(id, category){
  $.ajax({ 
    url: '../php/query.php',
    data: {Method:'query_skill_subcategory', id_category: category},
    type: 'POST',
      success: function(e) {
        $('.main-div').find("#" + id).find('.skill-category-select').children('option').remove();
        $('.main-div').find("#" + id).find('.skill-category-select').append('<option>---</option>');
        $('.main-div').find("#" + id).find('.skill-category-select').append(e);
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
  clone.find('.skill-select').css('border-color', '#ced4da');
  clone.find('input').each(function(){
    $(this).attr('id', $(this).attr("id").substring(0, $(this).attr("id").length - 2) + "-" + i);
  });
  $("div.main-div").append(clone);
}