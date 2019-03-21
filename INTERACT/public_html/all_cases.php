<?php
session_start();
include './PHP/login_php.php';
include './html_elements/head.html';
?>
    <body>
      <div class="container">
      <!-- Overskrift, brodsmulemeny -->
        <h1 class="my-4">INTERACT | <small>Dine caser</small></h1>

        <?php include "./html_elements/new_case_modal.html"; ?>

        <!-- Viser alle cases i en row -->
        <div class="row">
          <?php include './PHP/show_all_cases.php'; ?>
          <script>
          //Viser tooltip når hover over tom case
          $(document).ready(function() {
              $("body").tooltip({ selector: '[data-toggle=tooltip]' });
          });
          </script>
        </div><!-- row end -->
      </div><!-- container end -->

      <?php include './html_elements/logout_btn.php'; ?>
      <?php include './html_elements/footer.html'; ?>
    </body>
</html>