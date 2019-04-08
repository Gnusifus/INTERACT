  //Teller chars i textaera
  function countChar(val) {
    var len = val.value.length;
    if (len >= 500) {
      val.value = val.value.substring(0, 500);
    } else {
      $('#teller').text(500 - len);
    }
  };

  $(function(){
  //Sjekker multimedia input
  $('.custom-file-input').on('change', function(){
    var file = this.files[0];
    var fileType = file["type"];
    var fileSize = this.files[0].size;

    if(fileSize > 2000000){
      console.log("ja");
      $(this).parent().find(".size").addClass("d-block");
      $(this).parent().find(".size").removeClass("d-none");
    }
    else {
      console.log("nei");
      $(this).parent().find(".size").removeClass("d-block");
      $(this).parent().find(".size").addClass("d-none");
    }

    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);

    var validImageTypes = ["image/gif", "image/jpeg", "image/png"];
    var validVideoTypes = ["video/mp4", "video/webm", "video/ogg"];
    var validDocTypes = ["application/pdf", "application/msword", "text/plain", "application/vnd.oasis.opendocument.text", "application/vnd.ms-powerpoint", "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet", "application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"];
    var validAudioTypes = ["audio/mpeg", "audio/ogg", "audio/wav"];

    if ($(this).hasClass("image-input")){
      if ($.inArray(fileType, validImageTypes) < 0) {
         $(this).parent().find(".feil").addClass("d-block");
         $(this).parent().find(".feil").removeClass("d-none");
       }
     else{
       $(this).parent().find(".feil").removeClass("d-block");
       $(this).parent().find(".feil").addClass("d-none");
     }
    }

    if ($(this).hasClass("video-input")){
      if ($.inArray(fileType, validVideoTypes) < 0) {
         $(this).parent().find(".feil").addClass("d-block");
         $(this).parent().find(".feil").removeClass("d-none");
       }
     else{
       $(this).parent().find(".feil").removeClass("d-block");
       $(this).parent().find(".feil").addClass("d-none");
     }
    }
    if ($(this).hasClass("audio-input")){
      if ($.inArray(fileType, validAudioTypes) < 0) {
         $(this).parent().find(".feil").addClass("d-block");
         $(this).parent().find(".feil").removeClass("d-none");
       }
     else{
       $(this).parent().find(".feil").removeClass("d-block");
       $(this).parent().find(".feil").addClass("d-none");
     }
    }

    if ($(this).hasClass("document-input")){
      //Sjekker dokument
      if ($.inArray(fileType, validDocTypes) < 0) {
         $(this).parent().find(".feil").addClass("d-block");
         $(this).parent().find(".feil").removeClass("d-none");
         $(this).parent().find(".anbefal").removeClass("d-block");
         $(this).parent().find(".anbefal").addClass("d-none");
       }
     else{
       if (fileType != "application/pdf"){
         $(this).parent().find(".feil").removeClass("d-block");
         $(this).parent().find(".feil").addClass("d-none");
         $(this).parent().find(".anbefal").addClass("d-block");
         $(this).parent().find(".anbefal").removeClass("d-none");
       }
       else{
         $(this).parent().find(".feil").removeClass("d-block");
         $(this).parent().find(".feil").addClass("d-none");
         $(this).parent().find(".anbefal").removeClass("d-block");
         $(this).parent().find(".anbefal").addClass("d-none");
       }
     }
    }
  });
});

function checkimg(){
  if($(".feil", ".size").hasClass("d-block")){
    return false;
  }
  else{
    return true;
  }
}
