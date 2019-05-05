<?php
include '../dbconnect.php';
$nodeid = $_POST['id'];

$sql="SELECT * FROM nodes WHERE idnodes = '$nodeid'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
 ?>

<div class='modal-header'>
  <h5 class='modal-title' id='exampleModalLongTitle'>Endre "<?php echo $row['overskrift'] ?>"</h5>
  <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>
<div class="modal-body">
  <form action="./PHP/endre_node.php?node=<?php echo $nodeid ?>&case=<?php echo $row['cases_idcases'] ?>" method="post" enctype="multipart/form-data">

    <div class="form-group" required>
      <label for="exampleFormControlInput1">Endre node overskrift</label>
      <input type="text" class="form-control" name="overskrift" value="<?php echo $row['overskrift']?>" required>
    </div>


  <div class="form-group lastOppBilde">
    <div class="custom-file">
      <input type="file" class="custom-file-input nyBilde" id="inputGroupFile02" name="bildeup">
      <label class="custom-file-label" for="inputGroupFile02">Last opp nytt bilde...</label>
      <div class="feil d-none text-danger">Bildet må være av typen .gif, .jpeg eller .png!</div>
      <div class="size d-none text-danger">Filen kan ikke være større enn 2MB!</div>
    </div>
  </div>

  <div class="form-group float-right">
    <label for="checkbox" class="btn btn-warning">Slett bilde
      <input type="checkbox" id="checkbox" class="badgebox" name="slett_bilde">
      <span class="badge">&check;</span>
    </label>
  </div>
  <br><br><hr>
    <input type="submit" value="Lagre endringer" name="submit_endre" class="btn btn-primary mb-2">
</div>
</form>
