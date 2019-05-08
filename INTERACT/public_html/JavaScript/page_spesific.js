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

  $('.empty_modal').on('hide.bs.modal', function(e){
    if($(this).find("#endre_subnode").length > 0){
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
    }
  });

  //new_case_subnode_modal handler, viser input basert på ikon-klikk i sub-node-modal
  $(document).on('click','.addText',function(){
    $(this).parents().eq(3).find(".textInput").show("200");
  });
  $(document).on('click','.addImage',function(){
    $(this).parents().eq(3).find(".imageInput").show("200");
  });
  $(document).on('click','.addVideo',function(){
    $(this).parents().eq(3).find(".videoInput").show("200");
  });
  $(document).on('click','.addDocument',function(){
    $(this).parents().eq(3).find(".documentInput").show("200");
  });
  $(document).on('click','.addQuestion',function(){
    $(this).parents().eq(3).find(".questionInput").show("200");
  });
  $(document).on('click','.addLink',function(){
    $(this).parents().eq(3).find(".linkInput").show("200");
  });
  $(document).on('click','.addAudio',function(){
    $(this).parents().eq(3).find(".audioInput").show("200");
  });

  //Legger til flere spørsmål
  $(document).on('click', '.addSpm', function(){
    var $spm = "<div class='input-group mb-3'><div class='input-group-prepend'><span class='input-group-text' id='basic-addon1'><i class='fa fa-remove'></i></span></div><input type='text' maxlength='255' onkeyup='countCharSpm(event, this)' class='form-control' name='sporsmaal[]' placeholder='Skriv inn ett spørsmål i hvert felt...' aria-label='sporsmaal' aria-describedby='basic-addon1'></div>";
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
  $(document).on("mouseenter", ".removeInput", function(){
    $(this).find("#removeInput-text").css("display", "inline-block").stop(1,1).fadeIn("500");

  }).on("mouseleave", ".removeInput", function(){
    $(this).find("#removeInput-text").stop(1,1).fadeOut("500");
    
  }).on("click", ".removeInput", function(){
    //Fjerner opplastet fil
    $(this).parents().eq(1).find(".custom-file-input").val(null);
    console.log($(this).parents('custom-file'));
    $(this).parents().eq(1).find(".size").addClass("d-none").removeClass("d-block");
    $(this).parents().eq(1).find(".feil").addClass("d-none").removeClass("d-block");
    $(this).parents('form').find('input[type="submit"]').prop("disabled", false);
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
