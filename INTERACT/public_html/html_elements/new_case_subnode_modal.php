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
        <h5 class="modal-title">Legg til et kort i "<?php echo $row['overskrift'] ?>"</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="./PHP/new_case_subnode.php?case=<?php echo $case?>&node=<?php echo $node?>" method="post" enctype="multipart/form-data">
            <div class="form-row">

            <!--Overskrift * -->
            <div class="form-group col-md-12">
              <label>Overskrift<div class="float-right text-muted" id="tellerTittel"></div></label>
              <input type="text" class="form-control" name="overskrift" onkeyup="countCharTitle(event, this)" placeholder="Skriv inn en overskrift her..." required>
            </div>

            <!-- Bilde -->
            <div class="form-group col-md-12 imageInput">
              <label>Bilde<div class="removeInput"><div id="removeInput-text">Fjern bildet</div><i class="fa fa-remove"></i></div></label>
              <div class="custom-file">
                <input type="file" class="custom-file-input image-input" id="inputGroupFile02" name="bildeup">
                <label class="custom-file-label" name="bilde" for="inputGroupFile02">Last opp et bilde her...</label>
                <div class="feil d-none text-danger">Bildet må være av typen .gif, .jpeg eller .png!</div>
                <div class="size d-none text-danger">Filen kan ikke være større enn 2MB!</div>
              </div>
            </div>

            <!-- Dokument -->
            <div class="form-group col-md-12 documentInput">
            <label>Dokument<div class="removeInput"><div id="removeInput-text">Fjern dokumentet</div><i class="fa fa-remove"></i></div></label>
              <div class="custom-file">
                <input type="file" class="custom-file-input document-input" id="inputGroupFile02" name="dokumentup">
                <label class="custom-file-label" name="dokument" for="inputGroupFile02">Last opp et dokument her...</label>
                <div class="feil d-none text-danger">Dokumentet du har lastet opp er i et ugyldig format!</div>
                <div class="size d-none text-danger">Filen kan ikke være større enn 2MB!</div>
              </div>
            </div>

            <!-- dokument beksrivelse -->
            <div class="form-group col-md-12 documentInput_beskrivelse">
              <label>Skriv gjerne inn tittelen på dokumentet, lar du denne stå tom vises kun filnavnet på dokumentet.<div class="float-right text-muted" id="tellerTittel"></div></label>
              <input type="text" class="form-control doc-desc" onkeyup="countCharTitle(event, this)" name="dokument_beksrivelse" placeholder="Feks. Olas regnskap, lampe bruksanvisning eller lønnsslipp">
            </div>

            <!-- Lenke -->
            <div class="form-group col-md-12 linkInput">
              <label>Lenke<div class="removeInput"><div id="removeInput-text">Fjern lenken</div><i class="fa fa-remove"></i></div></label>
              <input type="text" class="form-control link-input" name="lenke" placeholder="Lim inn en lenke her...">
              <div class="feil d-none text-danger">Påse at du har kopiert linken direkte fra nettleseren, denne linken er ikke gyldig!</div>
            </div>

            <!-- Lenke beksrivelse -->
            <div class="form-group col-md-12 linkInput_beskrivelse">
              <label>Skriv inn et ord eller to om hva som befinner seg bak lenken<div class="float-right text-muted" id="tellerTittel"></div></label>
              <input type="text" class="form-control link-desc" onkeyup="countCharTitle(event, this)" name="lenke_beksrivelse" placeholder="Feks. kosthold, legemiddelhåndtering eller bruk av tannpirker">
            </div>

            <!-- Tekst -->
            <div class="form-group col-md-12 textInput">
              <label>Tekst<div class="removeInput"><div id="removeInput-text">Fjern teksten</div><i class="fa fa-remove"></i></div></label>
              <div class="float-right text-muted" id="teller"></div>
              <textarea class="form-control" name="tekst" rows="3" onkeyup="countChar(event, this)" placeholder="Skriv tekst her..."></textarea>
              <div class="mye_tekst d-none text-warning">Oisann, ikke plass til alt? Vurder heller å laste opp et dokument.</div>
            </div>

            <!-- Video -->
              <div class="form-group col-md-6 videoInput">
              <label>Video<div class="removeInput"><div id="removeInput-text">Fjern videoen</div><i class="fa fa-remove"></i></div></label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input video-input" id="inputGroupFile02" name="videoup">
                  <label class="custom-file-label" name="video" for="inputGroupFile02">Last opp en video her...</label>
                  <div class="feil d-none text-danger">Videoen må være av typen .mp4, .ogg eller .webm!</div>
                  <div class="size d-none text-danger">Filen kan ikke være større enn 2GB!</div>
                </div>
              </div>


              <div class="form-group col-md-6 videoInput">
              <label>YouTube-video<div class="removeInput"><div id="removeInput-text">Fjern videoen</div><i class="fa fa-remove"></i></div></label>
                <input type="text" class="form-control yt-video" name="ytvideo" placeholder="Lim inn en lenke her...">
                <div class="feil d-none text-danger">Lenken du har limt inn er ingen gyldig YouTube-lenke, <br>
                                                    påse at du har kopiert lenken direkte fra YouTube</div>
              </div>

            <!-- Lyd -->
            <div class="form-group col-md-12 audioInput">
            <label>Lydfil<div class="removeInput"><div id="removeInput-text">Fjern lydfilen</div><i class="fa fa-remove"></i></div></label>
              <div class="custom-file">
                <input type="file" class="custom-file-input audio-input" id="inputGroupFile02" name="lydup">
                <label class="custom-file-label" name="lyd" for="inputGroupFile02">Last opp en lydfil her...</label>
                <div class="feil d-none text-danger">Lydfil må være av typen .mp3, .ogg eller .wav!</div>
                <div class="size d-none text-danger">Filen kan ikke være større enn 2GB!</div>
              </div>
            </div>

            <!-- Spørsmål -->
            <div class="form-group col-md-12 questionInput">
            <label class="spmlabel">Spørsmål<div class="float-right text-muted" id="tellerSpm"></div></label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-remove"></i></span>
              </div>
              <input type="text" class="form-control" name="sporsmaal[]" onkeyup="countCharSpm(event, this)" maxlength="255" placeholder="Skriv inn ett spørsmål i hvert felt..." aria-label="sporsmaal" aria-describedby="basic-addon1">
            </div>
              <div class="btn btn-secondary addSpm">Legg til flere spørsmål</div>
            </div>

            <div class="form-group col-md-12">
              <span data-toggle='tooltip' data-placement='top' title='Legg til bilde'>
              <button type="button" class="addImage btn btn-primary btn-circle btn-xl"><i class="fas fa-camera"></i></button>
              </span>
              <span data-toggle='tooltip' data-placement='top' title='Legg til dokument'>
              <button type="button" class="addDocument btn btn-warning btn-circle btn-xl"><i class="far fa-file"></i></button>
              </span>
              <span data-toggle='tooltip' data-placement='top' title='Legg til lenke'>
              <button type="button" class="addLink btn btn-info btn-circle btn-xl"><i class="fas fa-link"></i></button>
              </span>
              <span data-toggle='tooltip' data-placement='top' title='Legg til tekst'>
              <button type="button" class="addText btn btn-danger btn-circle btn-xl"><i class="fas fa-font"></i></button>
              </span>
              <span data-toggle='tooltip' data-placement='top' title='Legg til video'>
              <button type="button" class="addVideo btn btn-secondary btn-circle btn-xl"><i class="fas fa-video"></i></button>
              </span>
              <span data-toggle='tooltip' data-placement='top' title='Legg til lydfil'>
              <button type="button" class="addAudio btn btn-success btn-circle btn-xl"><i class="fas fa-headphones"></i></button>
              </span>
              <span data-toggle='tooltip' data-placement='top' title='Legg til oppgave'>
              <button type="button" class="addQuestion btn btn-dark btn-circle btn-xl"><i class="fas fa-tasks"></i></button>
              </span>
            </div>

          </div>
            <input type="submit" value="Legg til" name="submit" class="btn btn-primary mb-2">
          </form>

      </div><!-- modal-body end -->
    </div><!-- modal-content end -->
  </div><!-- modal-dialog end -->
</div><!-- modal end -->
