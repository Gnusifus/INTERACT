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
          <form action="./PHP/new_case_node.php?case=<?php echo $case ?>" method="post" enctype="multipart/form-data">

            <div class="form-group">
              <label for="exampleFormControlInput1">Node overskrift</label>
              <input type="text" class="form-control" name="overskrift" placeholder="Skriv inn case tittel her..." required>
            </div>

            <div class="form-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="bilde" name="bildeup">
                <label class="custom-file-label" name="bilde" for="bilde">Last opp et bilde her...</label>
              </div>
            </div>

            <script>
            //Viser tekst i label for bilde når bilde er lastet opp
            $('.custom-file-input').on('change', function() {
               let fileName = $(this).val().split('\\').pop();
               $(this).next('.custom-file-label').addClass("selected").html(fileName);
            });
            </script>

            <button type="submit" name="submit" class="btn btn-primary mb-2">Legg til node</button>
          </form>

      </div><!-- modal-body end -->
    </div><!-- modal-content end -->
  </div><!-- modal-dialog end -->
</div><!-- modal end -->
