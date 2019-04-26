<?php
include "./PHP/login_php.php";
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
      include "./html_elements/show_subnode_modal.php";
      ?>
        <!-- Cases oversikt -->
            <div class="row">
              <?php
              include "./PHP/show_all_case_subnodes.php";
              //Viser ikke pluss, når siden vises i student-modus
              if($_SESSION['loggetinn'] == true){
              include "./html_elements/new_case_subnode_modal.php";
              include './PHP/new_case_subnode.php';
                echo "
              <div class='col-lg-3 col-md-4 col-sm-6 portfolio-item empty'>
              <span data-toggle='tooltip' data-placement='right' title='Legg til ny node!'>
                <div class='card empty' data-toggle='modal' data-target='.ny_case_subnode_modal'>
                  <i class='new_node fas fa-plus'></i>
                </div>
              </span>
              </div>
              ";}
              ?>
            </div><!-- Row slutt -->
        </div><!-- Container slutt -->
        <!-- case oversikt slutt -->

     <?php include './html_elements/logout_btn.php'; ?>
     <?php include './html_elements/footer.html'; ?>
    </body>
</html>
