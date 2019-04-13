$(function(){

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
    //TODO: fjerne link og dokument beskrivelse, og dens input val
    $(this).parent().hide("200");
  })
});


//Publiser / avpubliser
$('.card-header').click(function() {
  //Publiserer casen
  if ($(this).find('.font-weight-bold').text() = 'Ikke publisert' ){
    var id = $(this).attr('id');
    $.ajax({
        url: './PHP/publish.php',
        type: "get",
        data:{
          id: id,
        },
        success: function(){
          $("#ikke_pub, #ikke_pub2").remove();
          $(this).append("<div id='pub' class='text-center text-success font-weight-bold'>Publisert!</div><br><div id='pub2' class='text-center text-success'>Klikk her for å avpublisere</div>");
        }
    });
  }
  //avpubliserer casen
  if($(this).find('.font-weight-bold').text() = 'Ikke publisert' ){
    var id = $(this).attr('id');
    $.ajax({
        url: './PHP/publish.php',
        type: "get",
        data:{
          id: id,
        },
        success: function(){
          $("#pub, #pub2").remove();
          $(this).append("<div id='ikke_pub' class='text-center text-danger font-weight-bold'>Ikke publisert</div><br><div id='ikke_pub2' class='text-center text-danger'>Klikk her for å publisere</div>");
        }
    });
  }
});
