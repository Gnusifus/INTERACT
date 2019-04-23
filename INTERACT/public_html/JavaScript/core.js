$(function(){

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

  //Sjekker multimedia input
  //Deklarerer gyldige filtyper
  var validImageTypes = ["image/gif", "image/jpeg", "image/png"];
  var validVideoTypes = ["video/mp4", "video/webm", "video/ogg"];
  var validDocTypes = ["application/pdf", "application/msword", "text/plain", "application/vnd.oasis.opendocument.text", "application/vnd.ms-powerpoint", "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet", "application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"];
  var validAudioTypes = ["audio/ogg", "audio/wav", "audio/mp3"];

  $('.custom-file-input').on('change', function(){
    var file = this.files[0];
    var fileType = file["type"];
    var fileSize = this.files[0].size;

    //Godtar ikke filer større enn 2MB.
    if(fileSize > 2000000){
      $(this).parent().find(".size").removeClass("d-none");
      $(this).parent().parent().parent().parent().find('input[type="submit"]').prop("disabled", true);
    }
    else {
      $(this).parent().find(".size").removeClass("d-block");
      $(this).parent().find(".size").addClass("d-none");
      $(this).parent().parent().parent().parent().find('input[type="submit"]').prop("disabled", false);
    }

    //Viser filnavn i inputfelt når lastet opp
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);

    if ($(this).hasClass("image-input")){
      if ($.inArray(fileType, validImageTypes) < 0) {
         $(this).parent().find(".feil").addClass("d-block");
         $(this).parent().find(".feil").removeClass("d-none");
           $(this).parent().parent().parent().parent().find('input[type="submit"]').prop("disabled", true);
       }
     else{
       $(this).parent().find(".feil").removeClass("d-block");
       $(this).parent().find(".feil").addClass("d-none");
         $(this).parent().parent().parent().parent().find('input[type="submit"]').prop("disabled", false);
     }
    }

    if ($(this).hasClass("video-input")){
      if ($.inArray(fileType, validVideoTypes) < 0) {
         $(this).parent().find(".feil").addClass("d-block");
         $(this).parent().find(".feil").removeClass("d-none");
          $(this).parent().parent().parent().parent().find('input[type="submit"]').prop("disabled", true);
       }
     else{
       $(this).parent().find(".feil").removeClass("d-block");
       $(this).parent().find(".feil").addClass("d-none");
        $(this).parent().parent().parent().parent().find('input[type="submit"]').prop("disabled", false);
     }

    }

    $('.yt-video').keyup (function(){
console.log("fasfa");
      var expression = /^(?:https?:\/\/)?(?:m\.|www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
      var regex = new RegExp(expression);
      var val = $(this).val();

      if(val.match(regex)){
        //show Hva inneholder linken
        console.log("fasfa2");
        $(this).parent().find(".feil").removeClass("d-block");
        $(this).parent().find(".feil").addClass("d-none");
           $(this).parent().parent().parent().parent().find('input[type="submit"]').prop("disabled", false);
      }
      else{
        console.log("fasfa3");
        $(this).parent().find(".feil").addClass("d-block");
        $(this).parent().find(".feil").removeClass("d-none");
           $(this).parent().parent().parent().parent().find('input[type="submit"]').prop("disabled", true);
      }
    });

if ($(this).hasClass("audio-input")){
      if ($.inArray(fileType, validAudioTypes) < 0) {
         $(this).parent().find(".feil").addClass("d-block");
         $(this).parent().find(".feil").removeClass("d-none");
           $(this).parent().parent().parent().parent().find('input[type="submit"]').prop("disabled", true);
       }
     else{
       $(this).parent().find(".feil").removeClass("d-block");
       $(this).parent().find(".feil").addClass("d-none");
         $(this).parent().parent().parent().parent().find('input[type="submit"]').prop("disabled", false);
     }
    }

    if ($(this).hasClass("document-input")){
      //Sjekker dokument
      if ($.inArray(fileType, validDocTypes) < 0) {
        $('#documentInput_beskrivelse').hide("200");
         $(this).parent().find(".feil").addClass("d-block");
         $(this).parent().find(".feil").removeClass("d-none");
         $(this).parent().find(".anbefal").removeClass("d-block");
         $(this).parent().find(".anbefal").addClass("d-none");
           $(this).parent().parent().parent().parent().find('input[type="submit"]').prop("disabled", true);
       }

       //Anbefaler pdf, hvis andre gyldige filtyper er lastet opp.
       if (fileType != "application/pdf"){
         $('#documentInput_beskrivelse').show("200");
         $(this).parent().find(".feil").removeClass("d-block");
         $(this).parent().find(".feil").addClass("d-none");
         $(this).parent().find(".anbefal").addClass("d-block");
         $(this).parent().find(".anbefal").removeClass("d-none");
           $(this).parent().parent().parent().parent().find('input[type="submit"]').prop("disabled", false);
       }
       else{
         $('#documentInput_beskrivelse').show("200");
         $(this).parent().find(".feil").removeClass("d-block");
         $(this).parent().find(".feil").addClass("d-none");
         $(this).parent().find(".anbefal").removeClass("d-block");
         $(this).parent().find(".anbefal").addClass("d-none");
            $(this).parent().parent().parent().parent().find('input[type="submit"]').prop("disabled", false);
       }

    }
  });

  $('.link-input').keyup (function(){
    //RegEx hentet fra: https://stackoverflow.com/questions/3809401/what-is-a-good-regular-expression-to-match-a-url
    var expression = /(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})/gi;
    var regex = new RegExp(expression);
    var val = $(this).val();

    if(val.match(regex)){
      //show Hva inneholder linken
      $("#linkInput_beskrivelse").show("200");
      $(this).parent().find(".feil").removeClass("d-block");
      $(this).parent().find(".feil").addClass("d-none");
         $(this).parent().parent().parent().parent().find('input[type="submit"]').prop("disabled", false);
    }
    else{
      $("#linkInput_beskrivelse").hide("200");
      $(this).parent().find(".feil").addClass("d-block");
      $(this).parent().find(".feil").removeClass("d-none");
         $(this).parent().parent().parent().parent().find('input[type="submit"]').prop("disabled", true);
    }



  });

  $("body").tooltip({
    selector: '[data-toggle=tooltip]'
  });

  $('[data-toggle="tooltip"]').tooltip({
    animation: true,
  });

});
