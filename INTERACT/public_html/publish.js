$('.card-header').click(function() {
  console.log("hei");
  //Publiserer casen
  if ($(this).find('.font-weight-bold').text() = 'Ikke publisert' ){
    var id = $(this).attr('id');
    $.ajax({
        url: './PHP/publish.php',
        type: "get",
        data:{
          id: id,
        },
        success: function(){
          $("#ikke_pub, #ikke_pub2").remove();
          $(this).append("<div id='pub' class='text-center text-success font-weight-bold'>Publisert!</div><br><div id='pub2' class='text-center text-success'>Klikk her for å avpublisere</div>");
        }
    });
  }
  //avpubliserer casen
  if($(this).find('.font-weight-bold').text() = 'Ikke publisert' ){
    var id = $(this).attr('id');
    $.ajax({
        url: './PHP/publish.php',
        type: "get",
        data:{
          id: id,
        },
        success: function(){
          $("#pub, #pub2").remove();
          $(this).append("<div id='ikke_pub' class='text-center text-danger font-weight-bold'>Ikke publisert</div><br><div id='ikke_pub2' class='text-center text-danger'>Klikk her for å publisere</div>");
        }
    });
  }
});
