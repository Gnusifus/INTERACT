  //Teller chars i textaera
  function countChar(val) {
    var len = val.value.length;
    if (len >= 2000) {
      val.value = val.value.substring(0, 2000);
    } else {
      $('#teller').text(2000 - len);
    }
  };

  //Teller chars i textaera
  function countCharTitle(val) {
    var len = val.value.length;
    if (len >= 25) {
      val.value = val.value.substring(0, 25);
    } else {
      $('#tellerTittel').text(25 - len);
    }
  };

$(function(){

//Viser ikoner
  $(".case_card").mouseenter(function(){
      $(this).find(".all_cases_delete").css("display", "block");
  }).mouseleave(function(){
      $(this).find(".all_cases_delete").css("display", "none");
  });

  $(".editable-card").mouseenter(function(){
      $(this).find(".edit_icons").css("display", "block");
  }).mouseleave(function(){
      $(this).find(".edit_icons").css("display", "none");
  });

  //Slett bilde checkbox, skjuler bilde-opplasningfelt når valgt
  $('.badgebox').click(function(){
    if($(this).is(':checked')){
      if($(this).parent().parent().parent().find('.lastOppBilde').find('.nyBilde').val() == ""){
        $(this).parent().parent().parent().find('.lastOppBilde').hide();
      }
      else{
        $(this).parent().parent().parent().find('.lastOppBilde').find('.custom-file-label').text("Last opp nytt bilde...");
        $(this).parent().parent().parent().find('.lastOppBilde').find('.nyBilde').val("");
      }
    }
    else{
      $(this).parent().parent().parent().find('.lastOppBilde').show();
    }
  })

  //Sletter case
  $(".all_cases_delete").click(function(e){
     if (confirm("Er du sikker på at du vil slette denne casen, og alle dens noder?")) {
       var id = $(this).find('.edit').attr('id');
       $.post({
           url: './PHP/handlers/delete_case.php',
           data: {id: id},
           success: function(result){
             e.preventDefault();
             location.reload();
           }
       });
    }
  });

  //Endrer case
  $('.main_node_edit').on('click', function(e){
    e.preventDefault();
    e.stopImmediatePropagation();
    $(".endre_bilde_modal").modal('toggle');
  });

  //Sletter node
  $(".node_trash").click(function(e){
     if (confirm("Er du sikker på at du vil slette denne?"))
       var id = $(this).parent().attr('id');
       $.post({
           url: './PHP/handlers/delete_case_node.php',
           data: {id: id},
           success: function(result){
             e.preventDefault();
             location.reload();
           }
       });
  });

  //Endrer node
  $('.node_edit').on('click', function(e){
    e.preventDefault();
    e.stopImmediatePropagation();
    var id = $(this).parent().attr('id');
    $.post({
        url: './PHP/handlers/endre_node_modal.php',
        data: {id: id},
        success: function(result){
          if($('.empty_modal').find('.modal-content').is(':empty')){
              $(this).find(".modal-dialog").removeClass("modal-lg").addClass("modal-md");
               $('.empty_modal').find('.modal-content').append(result);
          }
          $(".empty_modal").modal('toggle');
        }
    });
  });

  //Sletter sub_node
  $(".sub_node_trash").click(function(e){
     if (confirm("Er du sikker på at du vil slette denne noden?")) {
       var id = $(this).parent().attr('id');
       $.post({
           url: './PHP/handlers/delete_case_subnode.php',
           data: {id: id},
           success: function(result){
             e.preventDefault();
             e.stopImmediatePropagation();
             location.reload();
           }
       });
    }
    else{
      e.preventDefault();
      e.stopImmediatePropagation();
    }
  });

  //Endrer subnode
  $('.sub_node_edit').on('click', function(e){
    e.preventDefault();
    e.stopImmediatePropagation();
    var id = $(this).parent().attr('id');
    $.post({
        url: './PHP/handlers/endre_subnode_modal.php',
        data: {id: id},
        success: function(result){
          if($('.empty_modal').find('.modal-content').is(':empty')){
               $('.empty_modal').find('.modal-content').append(result);
          }
          $(".empty_modal").modal('toggle');
        }
    });
  });

});
