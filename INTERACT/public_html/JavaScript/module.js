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

  //Viser tekst i label for bilde når bilde er lastet opp
  $('.custom-file-input').on('change', function() {
     let fileName = $(this).val().split('\\').pop();
     $(this).next('.custom-file-label').addClass("selected").html(fileName);
  });

  //Sjekker bilde input
  $('.image-input').on('change', function(){
    var file = this.files[0];
    console.log(file);
    var fileType = file["type"];
    console.log(fileType); //image/jpeg
    var validImageTypes = ["image/gif", "image/jpeg", "image/png"];
    if ($.inArray(fileType, validImageTypes) < 0) {
       $(".feil").addClass("d-block");
       $(".feil").removeClass("d-none");
     }
   else{
     $(".feil").removeClass("d-block");
     $(".feil").addClass("d-none");
   }
  });

});

function checkimg(){
  if($(".feil").hasClass("d-block")){
    return false;
  }
  else{
    return true;
  }
}
