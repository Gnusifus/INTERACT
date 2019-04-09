<?php
session_start();
include './html_elements/head.html';
?>
    <body>
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
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="..." alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
          <?php include './PHP/show_all_cases.php'; ?>
          <script>
          //Viser tooltip når hover over tom case
          $(document).ready(function() {
              $("body").tooltip({ selector: '[data-toggle=tooltip]' });
          });
          </script>
        </div><!-- row end -->
      </div><!-- container end -->

      <?php include './html_elements/logout_btn.php';?>

      <?php include './html_elements/footer.html'; ?>

      <imput type="button" value="slett">
    </body>
</html>
