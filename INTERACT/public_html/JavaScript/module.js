  //Teller chars i textaera
  function countChar(e, val) {
    var len = val.value.length;
    if (len >= 2000) {
      val.value = val.value.substring(0, 2000);
    } else {
      $(e.target).parent().find('#teller').text(2000 - len);
    }
  };

  //Teller chars i tittel
  function countCharTitle(e, val) {
    var len = val.value.length;
    if (len >= 45) {
      val.value = val.value.substring(0, 45);
    } else {
      $(e.target).parent().find('#tellerTittel').text(45 - len);
    }
  };

  //Teller chars i case beskrivelse
  function countCharDesc(e, val) {
    var len = val.value.length;
    if (len >= 500) {
      val.value = val.value.substring(0, 500);
    } else {
      $(e.target).parent().find('#tellerBeskrivelse').text(500 - len);
    }
  };

  //Teller chars i spørsmål
  function countCharSpm(e, val) {
    var len = val.value.length;
    if (len >= 255) {
      val.value = val.value.substring(0, 255);
    } else {
      $(e.target).parent().find('#tellerSpm').text(255 - len);
    }
  };

$(function(){
  //Viser filnavn i inputfelt når lastet opp
  $(document).on('change', '.custom-file-input', function(){
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').text(fileName);
  });

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

  //Sletter case
  $(".all_cases_delete").click(function(e){
     if (confirm("Er du sikker på at du vil slette denne casen, og alle tilhørende kort?")) {
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
     if (confirm("Er du sikker på at du vil slette dette temakoret?"))
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

  $(document).on('change', '.onoffswitch', function(){
    if($(this).find("input[type='checkbox']").prop('checked')){
      $(this).parents().eq(1).find(".custom-file").hide("200");
      $(this).parents().eq(1).find(".input").hide("200");
    }
    else{
      $(this).parents().eq(1).find(".custom-file").show("200");
      $(this).parents().eq(1).find(".input").show("200");
    }
  });

  //Sletter sub_node
  $(".sub_node_trash").click(function(e){
     if (confirm("Er du sikker på at du vil slette dette kortet?")) {
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
