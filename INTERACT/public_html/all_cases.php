<!DOCTYPE html>
<html lang="no">

  <head>
    <meta charset="UTF-8">
    <title>INTERACT</title>

    <!--Bootstrap and jquery lib-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>


    <!--Egen css-->
    <link rel="stylesheet" type="text/css" href="css.css">

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
  </head>

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
              </div>

              </div>
            </div>
          </div>
        <!-- Modal end -->

        <!-- Cases oversikt -->
        <div class="row" id="row">
          <?php
          include './PHP/show_all_cases.php';
          ?>
            <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
            <div class="card h-100" data-toggle="modal" data-target=".bd-example-modal-lg">
                <i class="new_node fas fa-plus"></i>
            </div>
          </div>
          </div>
        <!-- case oversikt slutt -->
      </div>
      </div>
      <!-- container slutt -->

      <!-- Logg ut knapp -->
      <a href="login.html" class="logout btn btn-info btn-lg"> Logg ut</a>

      <!-- Footer -->
      <footer class="py-5 bg-dark footer">
        <div class="container">
          <p class="m-0 text-center text-white">Copyright &copy; INTERACT 2018</p>
        </div>
      </footer>
    </body>
</html>
