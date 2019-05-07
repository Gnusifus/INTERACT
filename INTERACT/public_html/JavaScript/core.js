$(function(){
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
      $(this).parent().find(".size").removeClass("d-block").addClass("d-none");
      $(this).parent().parent().parent().parent().find('input[type="submit"]').prop("disabled", false);
    }

    if ($(this).hasClass("image-input")){
      if ($.inArray(fileType, validImageTypes) < 0) {
          $(this).parent().find(".feil").addClass("d-block").removeClass("d-none");
          $(this).parent().parent().parent().parent().find('input[type="submit"]').prop("disabled", true);
       }
     else{
        $(this).parent().find(".feil").removeClass("d-block").addClass("d-none");
        $(this).parent().parent().parent().parent().find('input[type="submit"]').prop("disabled", false);
     }
    }

    if ($(this).hasClass("video-input")){
      if ($.inArray(fileType, validVideoTypes) < 0) {
          $(this).parent().find(".feil").addClass("d-block").removeClass("d-none");
          $(this).parent().parent().parent().parent().find('input[type="submit"]').prop("disabled", true);
       }
     else{
        $(this).parent().find(".feil").removeClass("d-block").addClass("d-none");
        $(this).parent().parent().parent().parent().find('input[type="submit"]').prop("disabled", false);
     }
    }

if ($(this).hasClass("audio-input")){
      if ($.inArray(fileType, validAudioTypes) < 0) {
         $(this).parent().find(".feil").addClass("d-block").removeClass("d-none");
         $(this).parent().parent().parent().parent().find('input[type="submit"]').prop("disabled", true);
       }
     else{
       $(this).parent().find(".feil").removeClass("d-block").addClass("d-none");
       $(this).parent().parent().parent().parent().find('input[type="submit"]').prop("disabled", false);
     }
    }

    if ($(this).hasClass("document-input")){
      //Sjekker dokument
      if ($.inArray(fileType, validDocTypes) < 0) {
        $('.documentInput_beskrivelse').val("").hide("200");
        $(this).parent().find(".feil").addClass("d-block").removeClass("d-none");
        $(this).parent().parent().parent().parent().find('input[type="submit"]').prop("disabled", true);
       }

     else{
         $('.documentInput_beskrivelse').show("200");
         $(this).parent().find(".feil").removeClass("d-block").addClass("d-none");
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
      $(".linkInput_beskrivelse").show("200");
      $(this).parent().find(".feil").removeClass("d-block").addClass("d-none");
      $(this).parent().parent().parent().parent().find('input[type="submit"]').prop("disabled", false);
    }
    else{
      $(".linkInput_beskrivelse").val("").hide("200");
      $(this).parent().find(".feil").addClass("d-block").removeClass("d-none");
      $(this).parent().parent().parent().parent().find('input[type="submit"]').prop("disabled", true);
    }
  });

//YT video Regex
//https://stackoverflow.com/questions/28735459/how-to-validate-youtube-url-in-client-side-in-text-box
  $('.yt-video').keyup (function(){
    var expression = /^(?:https?:\/\/)?(?:m\.|www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
    var regex = new RegExp(expression);
    var val = $(this).val();

    if(val.match(regex)){
      $(this).parent().find(".feil").removeClass("d-block").addClass("d-none");
      $(this).parent().parent().parent().parent().find('input[type="submit"]').prop("disabled", false);
    }
    else{
      $(this).parent().find(".feil").addClass("d-block").removeClass("d-none");
      $(this).parent().parent().parent().parent().find('input[type="submit"]').prop("disabled", true);
    }
  });



//Trengs for å vise tool-tips
  $("body").tooltip({
    selector: '[data-toggle=tooltip]'
  });

  $('[data-toggle="tooltip"]').tooltip({
    animation: true,
  });

});
