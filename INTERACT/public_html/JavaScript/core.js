$(function(){
  //Sjekker multimedia input
  $(document).on('change', '.custom-file-input', function(){
    var file = this.files[0];
    var fileType = file["type"];
    var fileSize = this.files[0].size;

    if($(this).hasClass("image-input")){
      var valid = ["image/gif", "image/jpeg", "image/png"];
      var max = 2000000; //2MB
    }
    if($(this).hasClass("document-input")){
      var valid =  ["application/pdf", "application/msword", "text/plain", "application/vnd.oasis.opendocument.text", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/vnd.ms-powerpoint", "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet", "application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"];
      var max = 2000000;
    }
    if($(this).hasClass("video-input")){
      var validVideoTypes = ["video/mp4", "video/webm", "video/ogg"];
      var max = 2000000000; //2GB
    }
    if($(this).hasClass("audio-input")){
      var validAudioTypes = ["audio/ogg", "audio/wav", "audio/mp3"];
      var max = 2000000000; //2GB
    }

    if ($.inArray(fileType, valid) < 0) {
      if($(this).hasClass("document-input")){
        $(".documentInput_beskrivelse").hide("200");
      }
      $(this).parent().find(".feil").addClass("d-block").removeClass("d-none");
      $(this).parents('form').find('input[type="submit"]').prop("disabled", true);
     }
   else if(fileSize > max){
     if($(this).hasClass("document-input")){
       $(".documentInput_beskrivelse").hide("200");
     }
     $(this).parent().find(".size").removeClass("d-none");
     $(this).parents('form').find('input[type="submit"]').prop("disabled", true);
   }
   else{
     if($(this).hasClass("document-input")){
       $(".documentInput_beskrivelse").show("200");
     }
     $(this).parent().find(".size").removeClass("d-block").addClass("d-none");
     $(this).parent().find(".feil").removeClass("d-block").addClass("d-none");
     $(this).parents('form').find('input[type="submit"]').prop("disabled", false);
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
      $(this).parents('form').find('input[type="submit"]').prop("disabled", false);
    }
    else{
      $(".linkInput_beskrivelse").val("").hide("200");
      $(this).parent().find(".feil").addClass("d-block").removeClass("d-none");
      $(this).parents('form').find('input[type="submit"]').prop("disabled", true);
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
      $(this).parents('form').find('input[type="submit"]').prop("disabled", false);
    }
    else{
      $(this).parent().find(".feil").addClass("d-block").removeClass("d-none");
      $(this).parents('form').find('input[type="submit"]').prop("disabled", true);
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
