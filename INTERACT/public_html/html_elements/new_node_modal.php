<!-- Modal ny node -->
<div class="modal fade ny_case_node_modal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Legg til en ny node</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="./PHP/new_case_node.php?case=<?php echo $case ?>" method="post" enctype="multipart/form-data" id="new_node_form">

            <div class="form-group">
              <label for="exampleFormControlInput1">Node overskrift</label>
              <input type="text" class="form-control" name="overskrift" placeholder="Skriv inn case tittel her..." required>
            </div>

            <div class="form-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input image-input" id="bilde" name="bildeup">
                <label class="custom-file-label" name="bilde" for="bilde">Last opp et bilde her...</label>
                <div class="feil d-none text-danger">Bildet må være av typen gif, jpeg eller png!</div>
                <div class="size d-none text-danger">Filen kan ikke være større enn 2MB!</div>
                <label class="control-label" for="bildeup"><small class="text-muted">Noden blir gitt en tilfeldig farge, dersom du velger å ikke laste opp et bilde.</small></label>
              </div>
            </div>

            <input type="submit" value="Legg til" name="submit" class="btn btn-primary mb-2">

          </form>
      </div><!-- modal-body end -->
    </div><!-- modal-content end -->
  </div><!-- modal-dialog end -->
</div><!-- modal end -->
