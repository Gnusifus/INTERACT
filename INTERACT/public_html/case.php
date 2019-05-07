<?php
include "./PHP/login_php.php";
include './html_elements/head.html';
?>
<body>
  <?php
  include "./html_elements/oslomet_logo.html";
   ?>
    <div class="container">
    <?php
    //Legger case id i variable
    $case = $_GET['case'];

    include "./PHP/brodsmule.php";
    include "./html_elements/new_node_modal.php";
    include './html_elements/show_main_modal.php';
    include "./html_elements/empty_modal.php";
     ?>
   </div>

 <!-- Cases body -->
  <div class="outer">
    <div class="middle">
      <!-- Main node + nodes -->
      <?php include "./PHP/show_main_case_node.php"; ?>
      <?php include "./PHP/show_all_case_nodes.php"; ?>
      <?php
      //Viser ikke pluss-button hvis siden vises i student-modus
      $sql="SELECT * FROM nodes WHERE cases_idcases = '$case'";
      $result = mysqli_query($conn,$sql);
      $count = mysqli_num_rows($result);

      if($_SESSION['loggetinn'] == true){
        if($count > 0 && $count <= 5){
          echo "<div class='pluss_btn'>
                  <button data-toggle='modal' data-target='.ny_case_node_modal' class='btn btn-primary btn-lg'><i class='fas fa-plus'></i></button>
                </div>";
        }
        else if ($count === 0){
          echo "<div class='pluss_btn'>
                  Klikk her for å begynne å legge til noder!
                  <button data-toggle='modal' data-target='.ny_case_node_modal' class='btn btn-primary btn-lg'><i class='fas fa-plus'></i></button>
                </div>";
        }
        else{
          echo "<div class='pluss_btn'>
                  Maks antall noder er nådd!
                  <button disabled class='btn btn-primary btn-lg'><i class='fas fa-plus'></i></button>
                </div>";
        }
      }
      ?>
      <!-- nodes end -->
    </div><!-- middle end -->
  </div><!-- outer end -->
</div><!-- container end -->

<?php
include './html_elements/logout_btn.php';
?>
</body>
</html>
