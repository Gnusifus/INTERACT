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

  $(".sub_node_card").click(function(){
       var id = $(this).attr('id');
       $.get({
           url: './PHP/show_subnode_modal_content.php',
           data: {id: id},
           success: function(result){
              $('.show_subnode_content').find('.modal-content').append(result);
           }
       });
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
    console.log("hei");
    $(this).parent().find(".mb-3").appendTo("#questionInput");
  })
});
