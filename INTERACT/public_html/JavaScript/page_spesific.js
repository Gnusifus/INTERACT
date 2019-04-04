$(function(){

//Slette case fra all_cases.php
  $(".case_card").mouseenter(function(){
      $(this).find(".all_cases_delete").css("display", "block");
  }).mouseleave(function(){
      $(this).find(".all_cases_delete").css("display", "none");
  });

  //Klikke på søppelbøtte, kaller på php som sletter
  $(".fa-trash-alt").click(function(){
     if (confirm("Er du sikker på at du vil slette denne casen, og alle dens noder?")) {
       var id = $(this).attr('id');
       $.post({
           url: './PHP/delete_case.php',
           data: {id: id},
           success: function(result){
             location.reload();
           }
       });
    }
  });

  //Klikke på card-header, publiserer case
  $(".card-header").click(function(){
       var id = $(this).attr('id');
         $.post({
           url: './PHP/publish_case.php',
           data: {id: id},
           success: function(result){
             location.reload();
           }
       });
  });


//Endre / slette noder
  $(".node").mouseenter(function(){
      $(this).find(".edit_icons").css("display", "block");
  }).mouseleave(function(){
      //Skjuler .edit_icons ved mouseleave
      $(this).find(".edit_icons").css("display", "none");

      //gjør card-title ikke-editable ved mouseleave
      if($(this).find(".card-title").hasClass("editable")){
          $(".card-title").removeClass("editable");
      }
      //fjerner .display_block fra noden sin .new_picture div.
      if($(this).find(".new_picture").hasClass("display_block")){
         $(".new_picture").removeClass("display_block");
      };
  });

  $(".fa-pencil-alt").click(function(){
      $(this).parent().parent().find(".new_picture").toggleClass("display_block");
      var $card = $(this).parent().parent().find(".card-title");
      var isEditable = $card.is('.editable');

      $($card).prop('contenteditable',!isEditable).toggleClass('editable');
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

  $(".removeInput").mouseenter(function(){
    $(this).find("#removeInput-text").stop(1,1).fadeIn("500");
  }).mouseleave(function () {
    $(this).find("#removeInput-text").stop(1,1).fadeOut("500");
  }).click(function(){
    $(this).parent().hide("200");
  })
});
