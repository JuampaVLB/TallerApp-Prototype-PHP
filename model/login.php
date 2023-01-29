<?php

    include './conexion.php';

    $submit = $_POST['submit'];
    $nombre = $_POST['name'];
    $pass = $_POST['password'];

    if($submit) {

        $query = mysqli_query($conexion,"SELECT * FROM login WHERE name ='$nombre' AND password='$pass' ");
        
        if(mysqli_num_rows($query) > 0) {
            echo '
            <script>
              window.location = "../View/inicio.php";
            </script>
            '; 
        } else {

            echo '
            <script>
              alert("USUARIO INCORRECTO");
              window.location = "../index.php";
            </script>
            ';

        }

    } else {
        echo '
            <script>
                window.location = "../index.php";
            </script>
        ';
    }


?>