$(function(){

    $(".case_card").mouseenter(function(){
        $(this).find(".all_cases_delete").css("display", "block");
    }).mouseleave(function(){
        $(this).find(".all_cases_delete").css("display", "none");
    });

    //Klikke på søppelbøtte, kaller på php som sletter
    $(".fa-trash-alt").click(function(){
       if (confirm("Er du sikker på at du vil slette denne casen?")) {
         var id = $(this).attr('id');
         $.post({
             url: './PHP/delete_case.php',
             data: {id: id},
             success: function(result){
               location.reload();
             }
         });
      }
    });

});
