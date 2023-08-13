
<?php
require '../config/conexion.php';

$sqlGenre = "SELECT * FROM genero";

$generos = $con->query($sqlGenre);

?>
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editModal">Editar registro</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="actualizar.php" method="post" enctype="multipart/form-data">

            <input type="hidden" name="imgEdit" id="imgEdit">
            <input type="hidden" name="id" id="id">
            <div class="mb-3">
                <label class="form-label" for="name">Nombre:</label>
                <input class="form-control" type="text" name="name" id="name" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="description">Descripción: </label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label" for="genre">Genero:</label>
                <select class="form-control" name="genre" id="genre">
                    <option value="">Seleccionar</option>
                    <?php
                        while ($row_genero = $generos->fetch_object()) { ?>
                        <option value="<?php echo $row_genero->id ?>"><?php echo $row_genero->name ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="post">Poster:</label>
                <input class="form-control" type="file" name="post" id="post" required >
            </div>
            <div>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="accion" value="Actualizar" class="btn btn-warning">Actualizar</button>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>