<?php
session_start();
include './html_elements/head.html';
?>
    <body>
      <?php
      include "./html_elements/oslomet_logo.html";
       ?>
    <!-- https://bootsnipp.com/snippets/z8l2X -->
    <div class="container login-container">
        <h1 class="my-4">INTERACT | <small>Hvem er du?</small></h1>
            <div class="row">
                <div class="col-md-6 login-form-1">
                  <h3>Jeg er administrator!</h3>
                <form action='#' method="post">
                  <div class="form-group">
                      <input type="text" name="email" class="form-control" placeholder="Skriv inn epostadresse..." value="" />
                  </div>
                  <div class="form-group">
                      <input type="password" name="password" class="form-control" placeholder="Skriv inn passord..." value="" />
                  </div>
                  <div class="form-group">
                      <input type="submit" class="btnSubmit" name="logginn" value="Logg inn" />
                  </div>
                  <!--
                  <div class="form-group">
                      <a href="#" class="btnForgetPwd">Glemt passord?</a>
                  </div>-->
                  <?php
                  if(isset($_POST['logginn']) && $_SESSION['loggetinn'] == FALSE){
                    echo "
                    <div class='form-group'>
                        <span class='btnForgetPwd'>Feil passord!</span><br>
                    </div>
                    ";
                  }
                  ?>
              </form>

              <?php
              //Sjekker logginn validering, logger inn bruker hvis riktig
              if(isset($_POST['logginn'])){
                include './PHP/dbconnect.php';

                $_SESSION['email'] = $_POST['email'];
                $_SESSION['password'] = $_POST['password'];

                //Sikrer sql-injection
                $email = $_SESSION['email'];
                $password = $_SESSION['password'];

                $sql = $conn->prepare("SELECT epost, passord FROM admin WHERE epost = ? AND passord = ?");
                $sql->bind_param('ss', $email, $password);
                $sql->execute();
                $result = $sql->get_result();
                $count = mysqli_num_rows($result);

                if($count == 1){
                  while ($row = $result->fetch_assoc()){
                    $check_email = $row['epost'];
                    $check_pw = $row['passord'];
                  }

                  if ($email == $check_email && $password == $check_pw){
                    $_SESSION['loggetinn'] = true;
                    header("Location: ./all_cases.php");
                    exit();
                  }
                }
              }
              else{
                $_SESSION['loggetinn'] = false;
              }
              ?>

                </div>
                <div class="col-md-6 login-form-2">
                    <h3>Jeg er student!</h3>
                    <div class="form-group">
                        <a href="all_cases.php"><input type="submit" class="btnStudent" value="Se caser"/></a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
