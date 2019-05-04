<?php
include "./PHP/login_php.php";
include './html_elements/head.html';
?>
    <body>
      <div id="page-container">
        <div id="content-wrap">
          <?php
          include "./html_elements/oslomet_logo.html";
           ?>

          <div class="container">
            <?php
            include "./PHP/brodsmule.php";
            include "./html_elements/new_case_modal.html";
            ?>

            <!-- Viser alle cases i en row -->
            <div class="row">
              <?php include './PHP/show_all_cases.php'; ?>
            </div><!-- row end -->
          </div><!-- container end -->

          <?php include './html_elements/logout_btn.php';?>

          <imput type="button" value="slett">
        </div>
      </div>
      <?php include './html_elements/footer.html'; ?>
    </body>
</html>
