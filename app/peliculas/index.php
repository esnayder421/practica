<?php
// require '../config/conexion.php';
// $querySelect = "SELECT m.id, m.name, m.description,m.img, g.name As nameGen from movieso m INNER JOIN genero g ON m.id_genre = g.id;";

// $Data = $con->query($querySelect);


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud retomando</title>

    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
<div class="container py-3">
    <h2 class="text-center">Peliculas</h2>

    <div class="col-auto">
        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"> Nuevo registro</a>
    </div>
       <div id="listTable">

       </div>
</div>

<?php
include './modalM.php';
include './EliminarM.php';
//reseteamos la info
$generos->data_seek(0);
include './EditarM.php';

?>
</body>

<script>
    //==================   EDITAR    =======================================
    let EditModal = document.getElementById('editModal')
    EditModal.addEventListener('shown.bs.modal', event =>{
        //identificar a que fila se le dio click
        let button = event.relatedTarget
        //obtenemos el id 
        let id = button.getAttribute('data-bs-id')

        let inputId = EditModal.querySelector('.modal-body #id') 
        let inputName = EditModal.querySelector('.modal-body #name') 
        let inputDescription = EditModal.querySelector('.modal-body #description') 
        let inputGenre = EditModal.querySelector('.modal-body #genre')
        let inputimgEdit = EditModal.querySelector('.modal-body #imgEdit')  
        //let inputPost = EditModal.querySelector('.modal-body #post') 

        //================     AJAX  =============================================
        let url = "getMovies.php"
        let formData = new FormData()
        formData.append('id', id)

        fetch(url,{
            method: "POST",
            body: formData
        }).then(response => response.json())
        .then(data =>{
            //asignamos el resulktado a las variables
            inputId.value = data.id
            inputName.value = data.name
            inputDescription.value = data.description
            inputGenre.value = data.id_genre
            inputimgEdit.value = data.img


        }).catch(error => console.log(error))
    })

    let EliminarModal = document.getElementById('deleteModal')
    EliminarModal.addEventListener('shown.bs.modal', event =>{
        let button = event.relatedTarget
        let id = button.getAttribute('data-bs-id')
        let inputId = EliminarModal.querySelector('.modal-footer #id').value = id
        //inputId.value = data.id

    })
    document.getElementById("formSave").addEventListener("submit", function(event) {
        event.preventDefault(); // Detener el envío del formulario
        
        var formData = new FormData(this); //acemos referencia a este formulario actual
        fetch("guardar.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            cargarTabla()
            alert(data); // Muestra la respuesta del servidor
        })
        .catch(error => {
            console.error("Error:", error);
        });
    });

    const cargarTabla = ()=>{
        fetch("EjemTabla.php")
        .then(response => response.text())
        .then(data => {
            document.getElementById("listTable").innerHTML = data;
        })
        .catch(error => {
            console.error("Error:", error);
        });
    }
    cargarTabla()

    const deleteMovies = (id) =>{
        let formData = new FormData()
        formData.append('id', id)
        fetch("eliminar.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            cargarTabla()
            alert(data); // Muestra la respuesta del servidor
        })
        .catch(error => {
            console.error("Error:", error);
        });
    }

</script>



<script src="../../assets/js/bootstrap.bundle.min.js"></script>
</html>