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
                        <?php
                        include "./PHP/login_php.php";
                        if($_SESSION['loggetinn'] == true){
                          echo "
                          <h3>Du er allerede logget inn som administrator...</h3>
                          <form action='./PHP/login_php.php' method='post'>
                          <div class='text-center'>
                            <div class='form-group'>
                                <input type='submit' class='btnStudent' name='videre' value='Klikk her for å gå videre'/>
                            </div>
                            <div class='form-group'>
                                <input type='submit' class='btnSubmit' name='loggut' value='Logg meg ut' />
                            </div>
                          </div>
                          ";
                        }
                        else{ ?>
                          <h3>Jeg er administrator!</h3>
                          <div class="form-group">
                              <span class="btnForgetPwd d-none" id="feilpw">Feil passord!</span><br>
                              <span class="btnForgetPwd d-none" id="feilbruker">Det finnes ingen bruker registrert på denne epostadressen!</span><br>
                              <span class="btnForgetPwd d-none" id="feilconn">Kunne ikke koble til databasen.</span><br>
                          </div>
                          <form action='./PHP/login_php.php' method="post">
                          <div class="form-group">
                              <input type="text" name="email" class="form-control" placeholder="Skriv inn epostadresse..." value="" />
                          </div>
                          <div class="form-group">
                              <input type="password" name="password" class="form-control" placeholder="Skriv inn passord..." value="" />
                          </div>
                          <div class="form-group">
                              <input type="submit" class="btnSubmit" name="logginn" value="Logg inn" />
                          </div>
                          <div class="form-group">
                              <a href="#" class="btnForgetPwd">Glemt passord?</a>
                          </div>
                        <?php
                      }
                        ?>
                    </form>

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
