<!-- Modal endre bilde -->
<?php
include './PHP/dbconnect.php';
$case = $_GET['case'];
$sql = $conn->prepare("SELECT * FROM cases WHERE idcases = ?");
$sql->bind_param('i', $case);
$sql->execute();
$result = $sql->get_result();
$row = $result->fetch_assoc();
?>
<div class="modal fade endre_bilde_modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Endre "<?php echo $row['tittel']?>"</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="./PHP/endre_main_case.php?case=<?php echo $case ?>" method="post" enctype="multipart/form-data">

          <div class="form-group" required>
            <label>Endre tittel<div class="float-right text-muted" id="tellerTittel"></div></label>
            <input type="text" class="form-control" name="overskrift" onkeyup="countCharTitle(event, this)" value="<?php echo $row['tittel']?>" required>
          </div>

          <div class="form-group" required>
            <label for="beskrivelse">Endre beskrivelse<div class="float-right text-muted" id="tellerBeskrivelse"></div></label>
            <textarea class="form-control" name="beskrivelse" rows="3" required="required" onkeyup="countCharDesc(event, this)"><?php echo $row['tekst']?></textarea>
          </div>

          <div class="form-group lastOppBilde">
            <label>Bilde</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input nyBilde" id="inputGroupFile02" name="bildeup">
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
      </div>
    </form>
    </div>
  </div>
</div>
