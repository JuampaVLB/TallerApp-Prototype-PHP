<?php

include './conexion.php';

$get_id = $_GET["id"];

if($get_id) {

$consulta = "SELECT id FROM facturas where id = $get_id";

$ejecutar_consulta = $conexion->query($consulta);

if(mysqli_num_rows($ejecutar_consulta) > 0) {
    $delete_query = "DELETE FROM facturas WHERE id = $get_id";

    $delete = $conexion->query($delete_query);

    header('Location: ../View/facturas.php');

} else {
    echo '
        <script>
            alert("Error ID no encontrada!");
            window.location = "../View/facturas.php";
        </script>
';
}
//http://localhost/tools_db/Model/delete.php?id=2527

} else {
    echo '
        <script>
            alert("Error ID NULL");
            window.location = "../View/facturas.php";
        </script>
    ';
    
}
?>