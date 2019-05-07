$(function(){
  //Publiser / avpubliser case
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
       $.post({
           data: {id: id},
           url: './PHP/show_subnode_modal_content.php',
           success: function(result){
             if($('.empty_modal').find('.modal-content').is(':empty')){
                  $('.empty_modal').find('.modal-content').append(result);
             }
           }
       })
  });

  //Reloader siden når sub-node-modal lukkes, dette for å tømme modalen for input
  $('.empty_modal').on('hidden.bs.modal', function () {
      location.reload();
  })

  //Sikker på du vil lukke sub-node-modalen, dine felt blir forkastet.
  $('.ny_case_subnode_modal').on('hide.bs.modal', function(e){
    var sure = confirm("Du er nå i ferd med å forkaste dine innfylte felt.\nVelg OK for å forkaste, eller AVBRYT for å fortsette innfyllingen.");
    if (sure == true) {
      $('.modal').on('hidden.bs.modal', function() {
        location.reload();
      });
    }
    else{
      e.preventDefault();
      e.stopImmediatePropagation();
      return false;
    }
  });

  //new_case_subnode_modal handler, viser input basert på ikon-klikk i sub-node-modal
  $(".addText").click(function(){
    $(this).parents().eq(3).find(".textInput").show("200");
  });
  $(".addImage").click(function(){
    $(this).parents().eq(3).find(".imageInput").show("200");
  });
  $(".addVideo").click(function(){
    $(this).parents().eq(3).find(".videoInput").show("200");
  });
  $(".addDocument").click(function(){
    $(this).parents().eq(3).find(".documentInput").show("200");
  });
  $(".addQuestion").click(function(){
    $(this).parents().eq(3).find(".questionInput").show("200");
  });
  $(".addLink").click(function(){
    $(this).parents().eq(3).find(".linkInput").show("200");
  });
  $(".addAudio").click(function(){
    $(this).parents().eq(3).find(".audioInput").show("200");
  });

  //Legger til flere spørsmål
  $(".addSpm").click(function(){
    var $spm = "<div class='input-group mb-3'><div class='input-group-prepend'><span class='input-group-text' id='basic-addon1'><i class='fa fa-remove'></i></span></div><input type='text' class='form-control' name='sporsmaal[]' placeholder='Skriv inn ett spørsmål i hvert felt...' aria-label='sporsmaal' aria-describedby='basic-addon1'></div>";
    $($spm).insertBefore(".addSpm");
  });

  $(document).on("mouseenter", "#basic-addon1", function(){
    $(this).css("color", "red");
  })

  $(document).on("mouseleave", "#basic-addon1", function(){
    $(this).css("color", "inherit");
  });

  $(document).on("click", "#basic-addon1", function(){
    $(this).parents().eq(1).find(".form-control").val("");
    $(this).parents().eq(1).hide("200");
  });

  //Fjener input-felt i "ny-subnode-modal"
  $(".removeInput").mouseenter(function(){
    $(this).find("#removeInput-text").css("display", "inline-block").stop(1,1).fadeIn("500");
  }).mouseleave(function () {
    $(this).find("#removeInput-text").stop(1,1).fadeOut("500");
  }).click(function(){
    //Fjerner opplastet fil
    $(this).parents().eq(1).find(".custom-file-input").val(null);
    $(this).parents().eq(1).find('.custom-file-label').removeClass("selected").html("Last opp her..");
    $(this).parents().eq(1).hide("200");
    $(this).parents().eq(1).find(".form-control").val(null);
  })

  $(".documentInput").find(".removeInput").click(function(){
    $(this).parents().eq(2).find(".documentInput_beskrivelse").hide("200");
    $(this).parents().eq(2).find(".documentInput_beskrivelse").val(null);
  });

  $(".linkInput").find(".removeInput").click(function(){
    $(this).parents().eq(2).find(".linkInput_beskrivelse").hide("200");
    $(this).parents().eq(2).find(".linkInput_beskrivelse").val(null);
  });
});
