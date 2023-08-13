
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteModal"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Deseas Eliminar este registro?
      </div>
      <div class="modal-footer">
      <!-- <form method="post" enctype="multipart/form-data"> -->
        <input type="hidden" name="id" id="id">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="submit" name="accion" value="eliminar" class="btn btn-danger">Eliminar</button> -->
        <button onclick="deleteMovies(document.getElementById('id').value)" class="btn btn-danger">Eliminar</button>
      <!-- </form> -->
      </div>
    </div>
  </div>
</div>