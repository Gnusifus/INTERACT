<?php
session_start();
include './html_elements/head.html';
?>
<body>
    <div class="container">
    <?php
    //Legger case id i variable
    $case = $_GET['case'];

    include "./PHP/brodsmule.php";
    include "./html_elements/new_node_modal.php";
    include "./html_elements/endre_bilde_modal.html"; ?>

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
              <p>GET_MAIN_TEKST</p>
            </div>
            </div>
          </div>
        </div>
      <!-- Modal end -->

 <!-- Cases body -->
  <div class="outer">
    <div class="middle">
      <!-- Main node + nodes -->
      <?php
      include "./PHP/show_main_case_node.php";
      include "./PHP/show_all_case_nodes.php";
      //Viser ikke card med pluss tegn hvis siden vises i student-modus
      if($_SESSION['loggetinn'] == true){
      echo "<button data-toggle='modal' data-target='.ny_case_node_modal' class='button pluss'><i class='fas fa-plus'></i></button>";
      }
      ?>
      <!-- nodes end -->

    </div><!-- middle end -->
  </div><!-- outer end -->
</div><!-- container end -->


<!-- Logg ut knapp -->
<div class="savelog">
  <!-- usikker på om vi trenger denne?
    <a href="#" class="lagre btn btn-info btn-lg" style="background-color: coral"> Large endringer</a>-->
  <?php include './html_elements/logout_btn.php' ?>
</div>
<?php include './html_elements/footer.html'; ?>

</body>
</html>
