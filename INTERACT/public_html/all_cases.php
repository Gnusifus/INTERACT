<?php
include "./PHP/login_php.php";
include './html_elements/head.html';
?>
    <body>
      <?php
      include "./html_elements/oslomet_logo.html";
       ?>
      <div id="page-container">
        <div id="content-wrap">
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
        </div>
      </div>
      <?php include './html_elements/logout_btn.php';?>
      <?php include './html_elements/footer.html'; ?>
    </body>
</html>
