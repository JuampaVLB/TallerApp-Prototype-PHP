<?php


    include './conexion.php';

    $query2 = "DELETE FROM facturas";
    $consulta = $conexion->query($query2);

    header('Location: ../View/facturas.php');

?>