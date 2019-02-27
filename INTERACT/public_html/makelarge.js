$(function(){
    
    $(".node").mouseenter(function(){
        if($(this).find(".node").hasClass("empty")){
        $(".node:hover").css("transform", "none");
    };
        $(this).find(".edit_icons").css("display", "block");
    }).mouseleave(function(){
        $(this).find(".edit_icons").css("display", "none");
        
        if($(this).find(".card-title").hasClass("editable")){
            $(".card-title").removeClass("editable");
        }
        if($(this).find(".new_picture").hasClass("display_block")){
           $(".new_picture").removeClass("display_block"); 
        };
    });
   
    
    
    //Klikke på edit-ikonene
    $(".fa-trash-alt").click(function(){
       if (confirm("Er du sikker på at du vil slette dette elementet?")) {
        txt = "You pressed OK!";
        //TODO slette bildet
      }
    });

    $(".fa-pencil-alt").click(function(){
        $(this).parent().parent().find(".new_picture").toggleClass("display_block");
        var $card = $(this).parent().parent().find(".card-title");
        var isEditable = $card.is('.editable');
        
        $($card).prop('contenteditable',!isEditable).toggleClass('editable');
    });
});