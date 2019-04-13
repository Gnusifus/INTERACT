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

//Viser ikoner
  $(".case_card").mouseenter(function(){
      $(this).find(".all_cases_delete").css("display", "block");
  }).mouseleave(function(){
      $(this).find(".all_cases_delete").css("display", "none");
  });

  $(".editable-card").mouseenter(function(){
      $(this).find(".edit_icons").css("display", "block");
  }).mouseleave(function(){
      $(this).find(".edit_icons").css("display", "none");
  });

  //Sletter case
  $(".all_cases_delete").click(function(){
     if (confirm("Er du sikker på at du vil slette denne casen, og alle dens noder?")) {
       var id = $(this).find('.edit').attr('id');
       $.post({
           url: './PHP/handlers/delete_case.php',
           data: {id: id},
           success: function(result){
             location.reload();
           }
       });
    }
  });

  //Sletter node
  $(".node_trash").click(function(){
       var id = $(this).parent().attr('id');
       $.post({
           url: './PHP/handlers/delete_case_node.php',
           data: {id: id},
           success: function(result){
             location.reload();
           }
       });
  });

  //Sletter sub_node
  $(".sub_node_trash").click(function(){
     if (confirm("Er du sikker på at du vil slette denne noden?")) {
       var id = $(this).parent().attr('id');
       $.post({
           url: './PHP/handlers/delete_case_subnode.php',
           data: {id: id},
           success: function(result){
             location.reload();
           }
       });
    }
  });
});
