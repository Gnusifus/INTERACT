$(function(){
  //Sjekker multimedia input
  $(".custom-file-input").change(function(){
    var file = this.files[0];
    var fileType = file["type"];
    var fileSize = this.files[0].size;

    if($(this).hasClass("image-input")){
      var valid = ["image/gif", "image/jpeg", "image/png"];
      var max = 2000000; //2MB
    }
    if($(this).hasClass("document-input")){
      var valid =  ["application/pdf", "application/msword", "text/plain", "application/vnd.oasis.opendocument.text", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/vnd.ms-powerpoint", "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet", "application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"];
      var max = 2000000000; //2GB
    }
    if($(this).hasClass("video-input")){
      var valid = ["video/mp4", "video/webm", "video/ogg"];
      var max = 2000000000; //2GB
    }
    if($(this).hasClass("audio-input")){
      var valid = ["audio/ogg", "audio/wav", "audio/mp3"];
      var max = 2000000000; //2GB
    }

    if ($.inArray(fileType, valid) < 0) {
      if($(this).hasClass("document-input")){
        $(".documentInput_beskrivelse").hide("200");
      }
      $(this).parent().find(".feil").removeClass("d-none").addClass("d-block");
      $(this).parents('form').find('input[type="submit"]').prop("disabled", true);
     }
   else if(fileSize > max){
     if($(this).hasClass("document-input")){
       $(".documentInput_beskrivelse").hide("200");
     }
     $(this).parent().find(".size").removeClass("d-none").addClass("d-block");
     $(this).parents('form').find('input[type="submit"]').prop("disabled", true);
   }
   else{
     $(this).parent().find(".size").addClass("d-none").removeClass("d-block");
     $(this).parent().find(".feil").addClass("d-none").removeClass("d-block");
     $(this).parents('form').find('input[type="submit"]').prop("disabled", false);

     if($(this).hasClass("document-input")){
       $(".documentInput_beskrivelse").show("200");
     }

   }
});

  $('.link-input').keyup (function(){
    //RegEx hentet fra: https://stackoverflow.com/questions/18568244/url-validation-regex-url-just-valid-with-http
    var expression = /^http(s)?:\/\/(www\.)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/;
    var regex = new RegExp(expression);
    var val = $(this).val();

    if(val.match(regex)){
      $(".linkInput_beskrivelse").show("200");
      $(this).parent().find(".feil").addClass("d-none");
      $(this).parents('form').find('input[type="submit"]').prop("disabled", false);
    }
    else{
      $(".linkInput_beskrivelse").val("").hide("200");
      $(this).parent().find(".feil").removeClass("d-none");
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
      $(this).parent().find(".feil").addClass("d-none");
      $(this).parents('form').find('input[type="submit"]').prop("disabled", false);
    }
    else{
      $(this).parent().find(".feil").removeClass("d-none");
      $(this).parents('form').find('input[type="submit"]').prop("disabled", true);
    }
  });

  $(document).on("keyup", "textarea", function(){
    if($(this).val().length > 1970){
      $(this).parent().find(".mye_tekst").removeClass("d-none");
    }
    else{
      $(this).parent().find(".mye_tekst").addClass("d-none");
    }
  })

//Trengs for å vise tool-tips
  $("body").tooltip({
    selector: '[data-toggle=tooltip]',
    trigger: 'hover',
  });

});
