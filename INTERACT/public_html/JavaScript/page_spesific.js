$(function(){
  //Publiser / avpubliser
  $(".card-header").click(function(){
       var id = $(this).attr('id');
         $.post({
           url: './PHP/handlers/publish_case.php',
           data: {id: id},
           success: function(result){
             location.reload();
           }
         });
       });

  $(".sub_node_card").on('click', function(){
       var id = $(this).attr('id');
       $.ajax({
          type: "POST",
           data: {id: id},
           url: './PHP/show_subnode_modal_content.php',
           success: function(result){
             if($('.show_subnode_content').find('.modal-content').is(':empty')){
                  $('.show_subnode_content').find('.modal-content').append(result);
             }
           }
       })
  });

  $('.show_subnode_content').on('hidden.bs.modal', function () {
      location.reload();
  })

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

  $('.main_node_edit').on('click', function(e){
    e.preventDefault();
    e.stopImmediatePropagation();
    $(".endre_bilde_modal").modal('toggle');
  });

  //new_case_subnode_modal handler
  $("#addText").click(function(){
    $("#textInput").show("200");
  });
  $("#addImage").click(function(){
    $("#imageInput").show("200");
  });
  $("#addVideo").click(function(){
    $(".videoInput").show("200");
  });
  $("#addDocument").click(function(){
    $("#documentInput").show("200");
  });
  $("#addQuestion").click(function(){
    $("#questionInput").show("200");
  });
  $("#addLink").click(function(){
    $("#linkInput").show("200");
  });
  $("#addAudio").click(function(){
    $("#audioInput").show("200");
  });

  //TODO: Slette det faktiske oplastede input value fra inputfeltet når den krysses ut
  //TESTDETTE

  $(".removeInput").mouseenter(function(){
    $(this).find("#removeInput-text").stop(1,1).fadeIn("500");
  }).mouseleave(function () {
    $(this).find("#removeInput-text").stop(1,1).fadeOut("500");
  }).click(function(){
    //Fjerner opplastet fil
    $(this).parent().find(".custom-file-input").val(null);
    $(this).parent().find('.custom-file-label').removeClass("selected").html("Last opp her..");
    $(this).parent().hide("200");
    $(this).parent().find(".form-control").val(null);
  })

  $("#documentInput").find(".removeInput").click(function(){
    $(this).parent().parent().find("#documentInput_beskrivelse").hide("200");
    $(this).parent().parent().find("#documentInput_beskrivelse").val(null);
  });

  $("#linkInput").find(".removeInput").click(function(){
    $(this).parent().parent().find("#linkInput_beskrivelse").hide("200");
    $(this).parent().parent().find("#linkInput_beskrivelse").val(null);
  });

  $(".addSpm").click(function(){
    var $spm = "<div class='input-group mb-3'><div class='input-group-prepend'><span class='input-group-text' id='basic-addon1'>?</span></div><input type='text' class='form-control' name='sporsmaal[]' placeholder='Skriv inn ett spørsmål i hvert felt...' aria-label='sporsmaal' aria-describedby='basic-addon1'></div>";
    $($spm).insertBefore(".addSpm");
  });
});
