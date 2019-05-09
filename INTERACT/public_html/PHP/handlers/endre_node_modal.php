<?php
include '../dbconnect.php';
$nodeid = $_POST['id'];

$sql = $conn->prepare("SELECT * FROM nodes WHERE idnodes = ?");
$sql->bind_param('i', $nodeid);
$sql->execute();
$result = $sql->get_result();
$row = $result->fetch_assoc();
 ?>
<script type="text/javascript" src="./JavaScript/core.js"></script>
<div class='modal-header'>
  <h5 class='modal-title' id='exampleModalLongTitle'>Endre temakortet "<?php echo $row['overskrift']?>"</h5>
  <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>
<div class="modal-body">
  <form action="./PHP/endre_node.php?node=<?php echo $nodeid ?>&case=<?php echo $row['cases_idcases'] ?>" method="post" enctype="multipart/form-data">

    <div class="form-group">
      <label>Endre overskrift<div class="float-right text-muted" id="tellerTittel"></div></label>
      <input type="text" class="form-control" onkeyup="countCharTitle(event, this)" name="overskrift" value="<?php echo $row['overskrift']?>" required>
    </div>


    <div class="form-group lastOppBilde">
      <label>Endre bilde</label>
      <div class="custom-file">
        <input type="file" class="custom-file-input image-input" id="inputGroupFile02" name="bildeup">
        <label class="custom-file-label" for="inputGroupFile02"><?php echo $row['bilde'] ?></label>
        <div class="feil d-none text-danger">Bildet må være av typen .gif, .jpeg eller .png!</div>
        <div class="size d-none text-danger">Filen kan ikke være større enn 2MB!</div>
      </div>
        <div class="float-right">
          <div class="onoffswitch">
            <input type="checkbox" name="slett_bilde" class="onoffswitch-checkbox" id="myonoffswitch">
            <label class="onoffswitch-label" for="myonoffswitch">
                <span class="onoffswitch-inner"></span>
                <span class="onoffswitch-switch"></span>
            </label>
        </div>
      </div>
    </div>

  <br><hr>
    <input type="submit" value="Lagre endringer" name="submit_endre" class="btn btn-primary mb-2">
    </form>
</div>
