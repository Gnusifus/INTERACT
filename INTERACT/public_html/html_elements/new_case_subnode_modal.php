<?php
$case = $_GET['case'];
$node = $_GET['node'];

$sql="SELECT * FROM nodes WHERE idnodes = '$node'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
?>
<!-- Modal ny node -->
<div class="modal fade ny_case_subnode_modal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Legg til en ny node i <?php echo $row['overskrift'] ?> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="./PHP/new_case_subnode.php?case=<?php echo $case?>&node=<?php echo $node?>" method="post" enctype="multipart/form-data">
            <div class="form-row">

            <!--Overskrift * -->
            <div class="form-group col-md-12">
              <label for="exampleFormControlInput1">Node overskrift</label>
              <input type="text" class="form-control" name="overskrift" placeholder="Skriv inn en overskrift her..." required>
            </div>

            <!-- Tekst -->
            <div class="form-group col-md-12" id="textInput">
              <label for="exampleFormControlInput1">Tekst</label>
              <textarea class="form-control" rows="3" name="tekst">Skriv tekst her...</textarea>
            </div>

            <!-- Bilde -->
            <div class="form-group col-md-12" id="imageInput">
              <label for="exampleFormControlInput1">Bilde</label>
              <div class="btn btn-circle btn-danger removeInput fa fa-remove"></div>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile02" name="bildeup">
                <label class="custom-file-label" name="bilde" for="inputGroupFile02">Last opp et bilde her...</label>
              </div>
            </div>

            <!-- Video -->
              <div class="form-group col-md-6 videoInput">
              <label for="exampleFormControlInput1">Video</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="inputGroupFile02" name="videoup">
                  <label class="custom-file-label" name="video" for="inputGroupFile02">Last opp en video her...</label>
                </div>
              </div>


              <div class="form-group col-md-6 videoInput">
              <label for="exampleFormControlInput1">Youtube-video</label>
                <input type="text" class="form-control" name="ytvideo" placeholder="Lim inn en lenke her...">
              </div>

            <!-- Lyd -->
            <div class="form-group col-md-12" id="audioInput">
            <label for="exampleFormControlInput1">Lydfil</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile02" name="lydup">
                <label class="custom-file-label" name="lyd" for="inputGroupFile02">Last opp en lydfil her...</label>
              </div>
            </div>


            <!-- Lenke -->
            <div class="form-group col-md-12" id="linkInput">
              <label for="exampleFormControlInput1">Lenke</label>
              <input type="text" class="form-control" name="lenke" placeholder="Lim inn en lenke her...">
            </div>

            <!-- Dokument -->
            <div class="form-group col-md-12" id="documentInput">
            <label for="exampleFormControlInput1">Dokument</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile02" name="dokumentup">
                <label class="custom-file-label" name="dokument" for="inputGroupFile02">Last opp et dokument her...</label>
              </div>
            </div>

            <!-- Spørsmål -->
            <div class="form-group col-md-12" id="questionInput">
            <label for="exampleFormControlInput1">Spørsmål</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">?</span>
              </div>
              <input type="text" class="form-control" name="sporsmaal" placeholder="Skriv inn ett spørsmål i hvert felt..." aria-label="sporsmaal" aria-describedby="basic-addon1">
            </div>
            <button type="submit" class="btn btn-secondary">Legg til flere spørsmål</button>
            </div>

            <div class="form-group col-md-12">
              <span data-toggle='tooltip' data-placement='top' title='Legg til tekst'>
              <button type="button" id='addText' class="btn btn-danger btn-circle btn-xl"><i class="fas fa-font"></i></button>
              </span>
              <span data-toggle='tooltip' data-placement='top' title='Legg til bilde'>
              <button type="button" id='addImage' class="btn btn-primary btn-circle btn-xl"><i class="fas fa-camera"></i></button>
              </span>
              <span data-toggle='tooltip' data-placement='top' title='Legg til video'>
              <button type="button" id='addVideo' class="btn btn-secondary btn-circle btn-xl"><i class="fas fa-video"></i></button>
              </span>
              <span data-toggle='tooltip' data-placement='top' title='Legg til lydfil'>
              <button type="button" id='addAudio' class="btn btn-success btn-circle btn-xl"><i class="fas fa-headphones"></i></button>
              </span>
              <span data-toggle='tooltip' data-placement='top' title='Legg til dokument'>
              <button type="button" id='addDocument' class="btn btn-warning btn-circle btn-xl"><i class="far fa-file"></i></button>
              </span>
              <span data-toggle='tooltip' data-placement='top' title='Legg til lenke'>
              <button type="button" id='addLink' class="btn btn-info btn-circle btn-xl"><i class="fas fa-link"></i></button>
              </span>
              <span data-toggle='tooltip' data-placement='top' title='Legg til oppgave'>
              <button type="button" id='addQuestion' class="btn btn-dark btn-circle btn-xl"><i class="fas fa-question"></i></button>
            </div>
            <script>
            //Viser tooltip når hover over tom case
            $(document).ready(function() {
                $("body").tooltip({
                  selector: '[data-toggle=tooltip]'
                });

                $('[data-toggle="tooltip"]').tooltip({
                  animation: true,
                  delay: {show: 1000, hide: 100}
                });
            });
            </script>

            </div>
            <button type="submit" name="submit" class="btn btn-primary mb-2">Legg til node</button>
          </form>

      </div><!-- modal-body end -->
    </div><!-- modal-content end -->
  </div><!-- modal-dialog end -->
</div><!-- modal end -->
