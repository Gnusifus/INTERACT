$(function(){
    $(".case_card").mouseenter(function(){
        $(this).find(".all_cases_delete").css("display", "block");
    }).mouseleave(function(){
        //Skjuler .edit_icons ved mouseleave
        $(this).find(".all_cases_delete").css("display", "none");
    });

    //Klikke på edit-ikonene
    $(".fa-trash-alt").click(function(){
       if (confirm("Er du sikker på at du vil slette dette elementet?")) {
        txt = "You pressed OK!";
        //TODO slette bildet
      }
    });
});
