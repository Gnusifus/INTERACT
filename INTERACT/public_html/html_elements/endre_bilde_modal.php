<!-- Modal endre bilde -->
<?php
include './PHP/dbconnect.php';
$case = $_GET['case'];
$sql="SELECT * FROM cases WHERE idcases = '$case'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

?>
<div class="modal fade endre_bilde_modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Endre <?php echo $row['tittel']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="./PHP/endre_main_case.php?case=<?php echo $case ?>" method="post" enctype="multipart/form-data">

          <div class="form-group" required>
            <label for="exampleFormControlInput1">Endre case tittel</label><div class="float-right text-muted" id="tellerTittel"></div>
            <input type="text" class="form-control" name="overskrift" onkeyup="countCharTitle(this)" value="<?php echo $row['tittel']?>" required>
          </div>

          <div class="form-group" required>
            <label class="control-label" for="beskrivelse" >Case beskrivelse</label><div class="float-right text-muted" id="teller"></div>
            <textarea class="form-control" name="beskrivelse" rows="3" required="required" onkeyup="countChar(this)"><?php echo $row['tekst']?></textarea>
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

    </div>
  </div>
</div>
<!-- Modal end -->