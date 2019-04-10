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
    //Legger case id i variable
    $case = $_GET['case'];

    include "./PHP/brodsmule.php";
    include "./html_elements/new_node_modal.php";
    include "./html_elements/endre_bilde_modal.html";
    include './html_elements/show_main_modal.php'; ?>

 <!-- Cases body -->
  <div class="outer">
    <div class="middle">
      <!-- Main node + nodes -->
      <?php
      include "./PHP/show_main_case_node.php";
      include "./PHP/show_all_case_nodes.php";

      //Viser ikke pluss-button hvis siden vises i student-modus
      if($_SESSION['loggetinn'] == true){
        echo "<button data-toggle='modal' data-target='.ny_case_node_modal' class='button pluss'><i class='fas fa-plus'></i></button>";
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
