<?php
require '../config/conexion.php';
$querySelect = "SELECT m.id, m.name, m.description,m.img, g.name As nameGen from movieso m INNER JOIN genero g ON m.id_genre = g.id;";

$Data = $con->query($querySelect);


?>




<table class="table mt-4">
        <thead class="table-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Genero</th>
            <th scope="col">Poster</th>
            <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while($campo = $Data->fetch_object()){?>
            <tr>
            <th scope="row"><?php echo $campo->id ?></th>
            <td><?php echo $campo->name ?></td>
            <td><?php echo $campo->description ?></td>
            <td><?php echo $campo->nameGen ?></td>
            <td>
                <img src="uploads/<?php echo $campo->id.$campo->img ?>" width="200px" height="200px" alt=""></td>
            <td>
                <button data-bs-id="<?php echo $campo->id?>" name="accion" value="Editar" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editModal">Editar</button>
                <button data-bs-id="<?php echo $campo->id?>" name="accion" value="Eliminar" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Eliminar</button>
            </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
        </table>



