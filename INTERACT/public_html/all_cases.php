<?php
session_start();
include './PHP/login_php.php';
include './html_elements/head.html';
?>
    <body>
      <div class="container">
      <!-- Overskrift, brodsmulemeny -->
        <h1 class="my-4">INTERACT | <small>Dine caser</small></h1>

        <!-- Modal ny case -->
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Lag ny case</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <form action="./PHP/new_case.php" method="post">

                    <div class="form-group">
                      <label for="exampleFormControlInput1">Case tittel</label>
                      <input type="text" class="form-control" name="tittel" placeholder="Skriv inn case tittel her...">
                    </div>

                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Case beskrivelse</label>
                      <textarea class="form-control" name="beskrivelse" rows="3" placeholder="Beskriv casen her..."></textarea>
                    </div>

                    <div class="form-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile02">
                        <label class="custom-file-label" name="bilde" for="inputGroupFile02">Last opp et bilde her...</label>
                      </div>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary mb-2">Large case</button>
                  </form>

              </div><!-- modal-body end -->
            </div><!-- modal-content end -->
          </div><!-- modal-dialog end -->
        </div><!-- modal end -->

        <!-- Viser alle cases i en row -->
        <div class="row">
          <script>
          $(document).ready(function() {
              $("body").tooltip({ selector: '[data-toggle=tooltip]' });
          });
          </script>
          <?php
          include './PHP/show_all_cases.php';
          ?>
        </div><!-- row end -->
      </div><!-- container end -->

      <?php include './html_elements/logout_btn.php'; ?>
      <?php include './html_elements/footer.html'; ?>
    </body>
</html>
