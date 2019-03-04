$(function(){
    $(".node").mouseenter(function(){
        //fjerner hover effekt på tomme nodes.
        if($(this).find(".node").hasClass("empty")){
          $(".node:hover").css("transform", "none");
        }
        //Viser edit_icons hvis .node ikke er tom ved mouseenter.
        else{
          $(this).find(".edit_icons").css("display", "block");
        };
    }).mouseleave(function(){
        //Skjuler .edit_icons ved mouseleave
        $(this).find(".edit_icons").css("display", "none");

        //gjør card-title ikke-editable ved mouseleave
        if($(this).find(".card-title").hasClass("editable")){
            $(".card-title").removeClass("editable");
        }
        //fjerner .display_block fra noden sin .new_picture div.
        if($(this).find(".new_picture").hasClass("display_block")){
           $(".new_picture").removeClass("display_block");
        };
    });

    $(".main-menu").hover(function(){
      //Setter farger på hvert ikon i valgmeny ved hover.
      $(".teksticon").css("color", "white");
      $(".bildeicon").css("color", "#FF5C44");
      $(".videoicon").css("color", "#FF72D3");
      $(".lydicon").css("color", "#896DFF");
      $(".dokumenticon").css("color", "#1ABFFF");
      $(".linkicon").css("color", "#1AD44A");
      $(".oppgaveicon").css("color", "#FF961A");
    }, function(){
      //Tilbakestiller fargen til alle ikoner i valgmeny, når ikke hover.
      $("li").find("i").css("color", "gray");
    })




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
