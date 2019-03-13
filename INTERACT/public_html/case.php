<?php
session_start();
include './html_elements/head.html';
?>
<body>
    <div class="container">
     <!-- Overskrift, brodsmulemeny -->
     <!-- Skal oppdateres automatisk med php / js -->
    <h1 class="my-4"><a href="all_cases.html">INTERACT</a> | <small>case</small></h1>

      <!-- Modal endre bilde -->
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Endre/slett bildet for GET_TITLE</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="input-group mb-3">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="inputGroupFile02">
                  <label class="custom-file-label" for="inputGroupFile02">Veldg fil</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text" id="">Last opp</span>
                </div>
              </div>
                  <hr/>
                  <center><i>eller</i></center><br>
                  <center><button type="button" style="background-color: coral" class="btn btn-primary">Slett bildet</button></center>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary">Lagre</button>
            </div>

          </div>
        </div>
      </div>
      <!-- Modal end -->

      <!-- Modal hover main bilde -->
      <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">GET_MAIN TITLE</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <img src="#">
              <p>tekst</p>
            </div>
            </div>
          </div>
        </div>
      <!-- Modal end -->

      <!-- Modal ny node -->
      <div class="modal fade ny_case_node_modal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Legg til en ny node</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="./PHP/new_case_node.php" method="post">

                  <div class="form-group">
                    <label for="exampleFormControlInput1">Node overskrift</label>
                    <input type="text" class="form-control" name="overskrift" placeholder="Skriv inn case tittel her...">
                  </div>

                  <div class="form-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="inputGroupFile02">
                      <label class="custom-file-label" name="bilde" for="inputGroupFile02">Last opp et bilde her...</label>
                    </div>
                  </div>

                  <button type="submit" name="submit" class="btn btn-primary mb-2">Legg til node</button>
                </form>

            </div><!-- modal-body end -->
          </div><!-- modal-content end -->
        </div><!-- modal-dialog end -->
      </div><!-- modal end -->

 <!-- Cases body -->
  <div class="outer">
    <div class="middle">
      <div class="main">
        <div class="card" data-toggle="modal" data-target=".bd-example-modal-lg">
          <div class="edit_icons">
            <i class="edit fas fa-pencil-alt"></i>
          </div>
          <div class="new_picture" data-toggle="modal" data-target="#exampleModalCenter">
            <span>Endre bildet</span>
          </div>
        <a href="#"><img class="card-img-top" src="#"></a>
          <div class="card-body">
            <h4 class="card-title"><a href="#">title</a></h4>
            <p class="card-text">tekst...</p>
          </div>
        </div>
      </div><!-- main end -->

      <!-- nodes -->
      <?php
      include "./PHP/show_all_case_nodes.php";
      //Viser ikke card med pluss tegn hvis siden vises i student-modus
      if($_SESSION['loggetinn'] == true){
      echo "
      <div class='empty node n6'>
        <div class='card' data-toggle='modal' data-target='.ny_case_node_modal'>
          <i class='new_node fas fa-plus'></i>
        </div>
      </div>";
      }
      ?>
      <!-- nodes end -->

    </div><!-- middle end -->
  </div><!-- outer end -->
</div><!-- container end -->


<!-- Logg ut knapp -->
<button class="button pluss"><i class="fas fa-plus"></i></button>
<div class="savelog">
  <!-- usikker på om vi trenger denne? -->
  <a href="#" class="lagre btn btn-info btn-lg" style="background-color: coral"> Large endringer</a>

  <?php include './html_elements/logout_btn.php' ?>
</div>
<?php include './html_elements/footer.html'; ?>

</body>
</html>
