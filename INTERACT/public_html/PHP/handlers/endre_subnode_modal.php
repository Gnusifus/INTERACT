<?php
include '../dbconnect.php';
$idsub_nodes = $_POST['id'];

$sql="SELECT * FROM sub_nodes WHERE idsub_nodes = '$idsub_nodes'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
?>
<!-- Modal ny node -->
      <div class="modal-header" id="endre_subnode">
        <h5 class="modal-title">Endre "<?php echo $row['overskrift'] ?>"</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="./PHP/endre_subnode.php?sub_node=<?php echo $idsub_nodes?>&case=<?php echo $row['nodes_cases_idcases'] ?>&node=<?php echo $row['nodes_idnodes'] ?>" method="post" enctype="multipart/form-data">

            <!--Overskrift * -->
            <div class="form-group">
              <label>Overskrift</label>
              <input type="text" class="form-control" name="overskrift" value="<?php echo $row['overskrift'] ?>" required>
            </div>

            <?php
            $sqlBilde="SELECT * FROM bilde WHERE sub_nodes_idsub_nodes = '$idsub_nodes'";
            $resultBilde = mysqli_query($conn,$sqlBilde);
            if(mysqli_num_rows($resultBilde) > 0){
              while($rowBilde = mysqli_fetch_array($resultBilde)){ ?>
                <!-- Bilde -->
                <div class="form-group">
                  <label>Bilde</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input image-input" id="inputGroupFile02" name="bildeup">
                    <label class="custom-file-label" name="bilde" for="inputGroupFile02"><?php echo $rowBilde['bilde'] ?></label>
                    <div class="feil d-none text-danger">Bildet må være av typen gif, jpeg eller png!</div>
                    <div class="size d-none text-danger">Filen kan ikke være større enn 2MB!</div>
                  </div>
                    <div class="float-right">
                      <div class="onoffswitch">
                        <input type="checkbox" name="slett_bilde" class="onoffswitch-checkbox" id="myonoffswitch1">
                        <label class="onoffswitch-label" for="myonoffswitch1">
                            <span class="onoffswitch-inner"></span>
                            <span class="onoffswitch-switch"></span>
                        </label>
                    </div>
                  </div>
                </div>
              <?php
              }
            }
            else{ ?>
              <div class="form-group imageInput">
                <label>Legg til bilde<div class="removeInput"><div id="removeInput-text">Fjern bildet</div><i class="fa fa-remove"></i></div></label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input image-input" id="inputGroupFile02" name="bildeup">
                  <label class="custom-file-label" name="bilde" for="inputGroupFile02">Last opp et bilde her...</label>
                  <div class="feil d-none text-danger">Bildet må være av typen gif, jpeg eller png!</div>
                  <div class="size d-none text-danger">Filen kan ikke være større enn 2MB!</div>
                </div>
              </div>
            <?php
            }


            $sqlDoc="SELECT * FROM dokument WHERE sub_nodes_idsub_nodes = '$idsub_nodes'";
            $resultDoc = mysqli_query($conn,$sqlDoc);
            if(mysqli_num_rows($resultDoc) > 0){
              while($rowDoc = mysqli_fetch_array($resultDoc)){ ?>
                <!-- Dokument -->
                <div class="form-group">
                <label>Dokument</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input document-input" id="inputGroupFile02" name="dokumentup">
                    <label class="custom-file-label" name="dokument" for="inputGroupFile02"><?php echo $rowDoc['dokument'] ?></label>
                    <div class="feil d-none text-danger">Dokumentet du har lastet opp er i et ugyldig format!</div>
                    <div class="size d-none text-danger">Filen kan ikke være større enn 2MB!</div>
                  </div>
                  <div class="float-right">
                    <div class="onoffswitch">
                      <input type="checkbox" name="slett_dokument" class="onoffswitch-checkbox" id="myonoffswitch2">
                      <label class="onoffswitch-label" for="myonoffswitch2">
                          <span class="onoffswitch-inner"></span>
                          <span class="onoffswitch-switch"></span>
                      </label>
                  </div>
                </div>
                </div>

                <!-- dokument beksrivelse -->
                <div class="form-group">
                  <label>Skriv gjerne inn tittelen på dokumentet, lar du denne stå tom vises kun filnavnet på dokumentet.</label>
                  <input type="text" class="form-control doc-desc" name="dokument_beksrivelse" value="<?php echo $rowDoc['beskrivelse'] ?>">
                </div>
              <?php
              }
            }
            else{ ?>
              <!-- Dokument -->
              <div class="form-group documentInput">
              <label>Last opp dokument<div class="removeInput"><div id="removeInput-text">Fjern dokumentet</div><i class="fa fa-remove"></i></div></label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input document-input" id="inputGroupFile02" name="dokumentup">
                  <label class="custom-file-label" name="dokument" for="inputGroupFile02">Last opp et dokument her...</label>
                  <div class="feil d-none text-danger">Dokumentet du har lastet opp er i et ugyldig format!</div>
                  <div class="size d-none text-danger">Filen kan ikke være større enn 2MB!</div>
                </div>
              </div>

              <!-- dokument beksrivelse -->
              <div class="form-group documentInput_beskrivelse">
                <label>Skriv gjerne inn tittelen på dokumentet, lar du denne stå tom vises kun filnavnet på dokumentet.</label>
                <input type="text" class="form-control doc-desc" name="dokument_beksrivelse" placeholder="Feks. Olas regnskap, lampe bruksanvisning eller lønnsslipp">
              </div>
            <?php
            }

            $sqlLenke="SELECT * FROM link WHERE sub_nodes_idsub_nodes = '$idsub_nodes'";
            $resultLenke = mysqli_query($conn,$sqlLenke);
            if(mysqli_num_rows($resultLenke) > 0){
              while($rowLenke = mysqli_fetch_array($resultLenke)){ ?>
                <!-- Lenke -->
                <div class="form-group">
                  <div class="input">
                    <label>Lenke</label>
                    <div class="input">
                      <input type="text" class="form-control link-input" name="lenke" value="<?php echo $rowLenke['link'] ?>">
                      <div class="feil d-none text-danger">Påse at du har kopiert lenken direkte fra nettleseren, denne lenken er ikke gyldig!</div>
                    </div>
                  </div>
                  <div class="float-right">
                    <div class="onoffswitch">
                      <input type="checkbox" name="slett_lenke" class="onoffswitch-checkbox" id="myonoffswitch3">
                      <label class="onoffswitch-label" for="myonoffswitch3">
                          <span class="onoffswitch-inner"></span>
                          <span class="onoffswitch-switch"></span>
                      </label>
                  </div>
                </div>
                </div>

                <!-- Lenke beksrivelse -->
                <div class="form-group">
                  <label>Skriv inn et ord eller to om hva som befinner seg bak linken</label>
                  <input type="text" class="form-control link-desc" name="lenke_beksrivelse" value="<?php echo $rowLenke['beskrivelse'] ?>">
                </div>
              <?php
              }
            }
            else{ ?>
              <!-- Lenke -->
              <div class="form-group linkInput">
                <label>Legg til lenke<div class="removeInput"><div id="removeInput-text">Fjern lenken</div><i class="fa fa-remove"></i></div></label>
                <input type="text" class="form-control link-input" name="lenke" placeholder="Lim inn en lenke her...">
                <div class="feil d-none text-danger">Påse at du har kopiert lenken direkte fra nettleseren, denne lenken er ikke gyldig!</div>
              </div>

              <!-- Lenke beksrivelse -->
              <div class="form-group linkInput_beskrivelse">
                <label>Skriv inn et ord eller to om hva som befinner seg bak lenken</label>
                <input type="text" class="form-control link-desc" name="lenke_beksrivelse" placeholder="Feks. kosthold, legemiddelhåndtering eller bruk av tannpirker">
              </div>
            <?php
            }

            $sqlTxt="SELECT * FROM tekst WHERE sub_nodes_idsub_nodes = '$idsub_nodes'";
            $resultTxt = mysqli_query($conn,$sqlTxt);
            if(mysqli_num_rows($resultTxt) > 0){
              while($rowTxt = mysqli_fetch_array($resultTxt)){ ?>
                <!-- Tekst -->
                <div class="form-group">
                  <label>Tekst</label><div class="float-right text-muted" id="teller"></div>
                  <div class="input">
                    <textarea class="form-control" name="tekst" rows="3" onkeyup="countChar(this)"><?php echo $rowTxt['tekst'] ?></textarea>
                    <div class="mye_tekst d-none text-warning">Oisann, ikke plass til alt? Vurder heller å laste opp et dokument.</div>
                  </div>
                    <div class="float-right">
                      <div class="onoffswitch">
                        <input type="checkbox" name="slett_tekst" class="onoffswitch-checkbox" id="myonoffswitch4">
                        <label class="onoffswitch-label" for="myonoffswitch4">
                            <span class="onoffswitch-inner"></span>
                            <span class="onoffswitch-switch"></span>
                        </label>
                    </div>
                  </div>
                </div>
              <?php
              }
            }
            else{ ?>
              <!-- Tekst -->
              <div class="form-group textInput">
                <label>Legg til tekst<div class="removeInput"><div id="removeInput-text">Fjern teksten</div><i class="fa fa-remove"></i></div></label><div class="float-right text-muted" id="teller"></div>
                <textarea class="form-control" name="tekst" rows="3" onkeyup="countChar(this)" placeholder="Skriv tekst her..."></textarea>
                <div class="mye_tekst d-none text-warning">Oisann, ikke plass til alt? Vurder heller å laste opp et dokument.</div>
              </div>
            <?php
            }

            $sqlYt="SELECT * FROM videolink WHERE sub_nodes_idsub_nodes = '$idsub_nodes'";
            $resultYt = mysqli_query($conn,$sqlYt);
            if(mysqli_num_rows($resultYt) > 0){
              while($rowYt = mysqli_fetch_array($resultYt)){
                $fullLink = "https://www.youtube.com/watch?v=" . $rowYt['videolink'];
                 ?>
                <!-- Youtube -->
                <div class="form-group">
                <label>Youtube-video</label>
                  <div class="input">
                    <input type="text" class="form-control yt-video" name="ytvideo" value="<?php echo $fullLink ?>">
                    <div class="feil d-none text-danger">Lenken du har limt inn er ingen gyldig YouTube-lenke, <br>
                                                        påse at du har kopiert lenken direkte fra YouTube</div>
                  </div>
                  <div class="float-right">
                    <div class="onoffswitch">
                      <input type="checkbox" name="slett_youtube" class="onoffswitch-checkbox" id="myonoffswitch5">
                      <label class="onoffswitch-label" for="myonoffswitch5">
                          <span class="onoffswitch-inner"></span>
                          <span class="onoffswitch-switch"></span>
                      </label>
                  </div>
                </div>
                </div>
              <?php
              }
            }
            else{ ?>
              <!-- Youtube -->
              <div class="form-group videoInput">
              <label>Legg til youtube-video<div class="removeInput"><div id="removeInput-text">Fjern YouTube-videoen</div><i class="fa fa-remove"></i></div></label>
                <input type="text" class="form-control yt-video" name="ytvideo" placeholder="Lim inn en lenke her...">
                <div class="feil d-none text-danger">Lenken du har limt inn er ingen gyldig YouTube-lenke, <br>
                                                    påse at du har kopiert lenken direkte fra YouTube</div>
              </div>
            <?php
            }

            $sqlVideo="SELECT * FROM video WHERE sub_nodes_idsub_nodes = '$idsub_nodes'";
            $resultVideo = mysqli_query($conn,$sqlVideo);
            if(mysqli_num_rows($resultVideo) > 0){
              while($rowVideo = mysqli_fetch_array($resultVideo)){ ?>
                <!-- Video -->
                  <div class="form-group">
                  <label>Video</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input video-input" id="inputGroupFile02" name="videoup">
                      <label class="custom-file-label" name="video" for="inputGroupFile02"><?php echo $rowVideo['video'] ?></label>
                      <div class="feil d-none text-danger">Videoen må være av typen .mp4, .ogg eller .webm!</div>
                      <div class="size d-none text-danger">Filen kan ikke være større enn 2GB!</div>
                    </div>
                    <div class="float-right">
                      <div class="onoffswitch">
                        <input type="checkbox" name="slett_video" class="onoffswitch-checkbox" id="myonoffswitch6">
                        <label class="onoffswitch-label" for="myonoffswitch6">
                            <span class="onoffswitch-inner"></span>
                            <span class="onoffswitch-switch"></span>
                        </label>
                    </div>
                  </div>
                  </div>
              <?php
              }
            }
            else{ ?>
              <!-- Video -->
                <div class="form-group videoInput">
                <label>Legg til video<div class="removeInput"><div id="removeInput-text">Fjern videoen</div><i class="fa fa-remove"></i></div></label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input video-input" id="inputGroupFile02" name="videoup">
                    <label class="custom-file-label" name="video" for="inputGroupFile02">Last opp en video her...</label>
                    <div class="feil d-none text-danger">Videoen må være av typen .mp4, .ogg eller .webm!</div>
                    <div class="size d-none text-danger">Filen kan ikke være større enn 2GB!</div>
                  </div>
                </div>
            <?php
            }

            $sqlLyd="SELECT * FROM lyd WHERE sub_nodes_idsub_nodes = '$idsub_nodes'";
            $resultLyd = mysqli_query($conn,$sqlLyd);
            if(mysqli_num_rows($resultLyd) > 0){
              while($rowLyd = mysqli_fetch_array($resultLyd)){ ?>
                <!-- Lyd -->
                <div class="form-group">
                <label>Lydfil</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input audio-input" id="inputGroupFile02" name="lydup">
                    <label class="custom-file-label" name="lyd" for="inputGroupFile02">Last opp en ny lydfil her...</label>
                    <div class="feil d-none text-danger">Lydfil må være av typen .mp3, .ogg eller .wav!</div>
                    <div class="size d-none text-danger">Filen kan ikke være større enn 2GB!</div>
                  </div>
                  <div class="float-right">
                    <div class="onoffswitch">
                      <input type="checkbox" name="slett_lyd" class="onoffswitch-checkbox" id="myonoffswitch7">
                      <label class="onoffswitch-label" for="myonoffswitch7">
                          <span class="onoffswitch-inner"></span>
                          <span class="onoffswitch-switch"></span>
                      </label>
                  </div>
                </div>
                </div>
              <?php
              }
            }
            else{ ?>
              <!-- Lyd -->
              <div class="form-group audioInput">
              <label>Legg til lydfil<div class="removeInput"><div id="removeInput-text">Fjern lydfilen</div><i class="fa fa-remove"></i></div></label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input audio-input" id="inputGroupFile02" name="lydup">
                  <label class="custom-file-label" name="lyd" for="inputGroupFile02">Last opp en lydfil her...</label>
                  <div class="feil d-none text-danger">Lydfil må være av typen .mp3, .ogg eller .wav!</div>
                  <div class="size d-none text-danger">Filen kan ikke være større enn 2GB!</div>
                </div>
              </div>
            <?php
            }

            $sqlSpm="SELECT * FROM sporsmaal WHERE sub_nodes_idsub_nodes = '$idsub_nodes'";
            $resultSpm = mysqli_query($conn,$sqlSpm);
            if(mysqli_num_rows($resultSpm) > 0){ ?>
              <div class="form-group">
              <label class= "spmlabel">Spørsmål</label>
              <?php
              while($rowSpm = mysqli_fetch_array($resultSpm)){ ?>
                <!-- Spørsmål -->
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-remove"></i></span>
                  </div>
                  <input type="text" class="form-control" name="sporsmaal[]" value="<?php echo $rowSpm['sporsmaal'] ?>" aria-label="sporsmaal" aria-describedby="basic-addon1">
                </div>
              <?php
              } ?>
              <div class="btn btn-secondary addSpm">Legg til flere spørsmål</div>
            </div>
              <?php
            }
            else{ ?>
              <!-- Spørsmål -->
              <div class="form-group col-md-12 questionInput">
              <label class= "spmlabel">Spørsmål</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fa fa-remove"></i></span>
                </div>
                <input type="text" class="form-control" name="sporsmaal[]" placeholder="Skriv inn ett spørsmål i hvert felt..." aria-label="sporsmaal" aria-describedby="basic-addon1">
              </div>
                <div class="btn btn-secondary addSpm">Legg til flere spørsmål</div>
              </div>
            <?php
            }
            ?>

            <div class="form-group">
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

            <input type="submit" value="Lagre endringer" name="submit" class="btn btn-primary mb-2">
          </form>

      </div><!-- modal-body end -->
