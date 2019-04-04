<?php
session_start();
include './html_elements/head.html';
?>
    <body>
      <?php
      include "./html_elements/oslomet_logo.html";
      include "./PHP/case_mer_nav.php";
      ?>
      <div class="container">
      <?php
      include "./PHP/brodsmule.php";
      ?>
        <!-- Modal klikk node -->
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">GET_NODE TITLE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p class="card-text">Her finer du Olas sykehusdokuemt, for oppholder januar 2019.<br>
                <a download="ex.pdf" href="./doc/ex.pdf" title="Ex" target="_blank">Sykehusopphold.pdf<i class="far fa-file"></i></a></p>
              </div>
              </div>
            </div>
          </div>
        <!-- Modal end -->


        <!-- Cases oversikt -->
          <div class="container">
            <div class="row">
              <?php
              include "./PHP/show_all_case_subnodes.php";
              ?>
              <!--

              <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
                <div class="card h-100" data-toggle="modal" data-target=".bd-example-modal-lg">
                  <div class="card-body">
                    <h4 class="card-title">Sykehusopphold</h4>
                      <p class="card-text">Her finer du Olas sykehusdokuemt, for oppholder januar 2019.<br>
                      <a download="ex.pdf" href="./doc/ex.pdf" title="Ex" target="_blank">Sykehusopphold.pdf<i class="far fa-file"></i></a></p>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                  <a href="#"><img class="card-img-top" src="./img/rehab.png" alt=""></a>
                  <div class="card-body">
                    <h4 class="card-title">Rehabilitering</h4>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                  <audio controls>
                    <source src="horse.ogg" type="audio/ogg">
                    <source src="horse.mp3" type="audio/mpeg">
                    Your browser does not support the audio element.
                  </audio>
                  <div class="card-body">
                    <h4 class="card-title">Psykolog</h4>
                    <p class="card-text">Her kan du lytte til lydfil fra Olas femte time hos sin psykolog.</p>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                  <a href="#"><img class="card-img-top" src="./img/utgifter.png" alt=""></a>
                  <div class="card-body">
                    <h4 class="card-title">Utgifter</h4>
                      <p class="card-text"> Lenken nedfor viser Olas helseutgifter.<br>
                      <a href="https://helsenorge.no/">helsenorge.no<i class="fas fa-external-link-alt"></i></a></p>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                  <a href="#"><img class="card-img-top" src="./img/etter.png" alt=""></a>
                  <div class="card-body">
                    <h4 class="card-title">Ettervern</h4>
                    <p class="card-text">
                        <i class="fas fa-question"></i>Hvor lenge bør Ola benytte seg av ettervern-tilbudet fra kommunen?<br>
                        <i class="fas fa-question"></i>Hvilke problemer kan Ola støte på underveis?<br>
                        <i class="fas fa-question"></i>Hvilke rettigheter har Ola når han er under kommunalt ettervern?<br>
                    </p>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                  <iframe src="https://www.youtube.com/embed/00Vwd_LIaVs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  <div class="card-body">
                    <h4 class="card-title">Medikamenter</h4>
                    <p class="card-text">Her inkluderer vi en videosnutt for legemiddelhåndtering.</p>
                  </div>
                -->
                </div><!-- Row slutt -->
              </div><!--Container slutt -->
              <?php
              //Viser ikke pluss, når siden vises i student-modus
              if($_SESSION['loggetinn'] == true){
              include "./html_elements/new_case_subnode_modal.php";
              include './PHP/new_case_subnode.php';
                echo "
              <div class='col-lg-3 col-md-4 col-sm-6 portfolio-item empty'>
                <div class='card' data-toggle='modal' data-target='.ny_case_subnode_modal'>
                  <i class='new_node fas fa-plus'></i>
                </div>
              </div>
              ";}
              ?>
              <script>
              //HVA ER DET HER?
              $(document).ready(function () {
                  $('.material-button-toggle').on("click", function () {
                      $(this).toggleClass('open');
                      $('.option').toggleClass('scale-on');
                  });
              });
              </script>
          </div><!-- Container slutt -->
        <!-- case oversikt slutt -->

     <?php include './html_elements/logout_btn.php'; ?>
     <?php include './html_elements/footer.html'; ?>
    </body>
</html>
