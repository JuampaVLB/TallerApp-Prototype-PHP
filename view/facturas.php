<?php
    include '../Model/conexion.php';
    $query2 = "SELECT * FROM facturas";
    $consulta = $conexion->query($query2);
    $array = $consulta->fetch_array();
    $num = 0;
    
    $con = "SELECT COUNT(id) FROM facturas";
    $fetch = $conexion->query($query2);
    $assoc = $fetch->fetch_assoc();
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pañol/Factura</title>
    <link rel="stylesheet" href="../public/css/facturas.css">
</head>
<body>
   <div id="container">
   <header id="header">
				<navbar class="navbar">
				<img src="../public/assets/img/logo.png" alt="LOGO" class="logo">
				<input type="text" name="" placeholder="Buscador" class="search">
					<ul class="navbar-list">
						<li> <a href="../View/inicio.php">Inicio</a> </li>
						<li> <a href="../View/formulario.php">Formulario</a> </li>
						<li> <a href="../View/facturas.php">Facturas</a> </li>
					</ul>
				</navbar>
		</header>
    <div class="facturas-container">
        <div class="facturas-div">
   <?php 
     
            foreach($consulta as $key) {
               
                $arr_items = array();
                $arr_items_cant = array();
                $num++;

                $new = json_decode($key['objetos']);
                $new2 = json_decode($array['objetos']);
    ?>

    <?php

          foreach($new as $keyt) { ?>

    <div class = "factura-content">

    <?php

        array_push($arr_items, $keyt->objeto);
        array_push($arr_items_cant, $keyt->cantidad);

    ?>

    <?php

        error_reporting(0);

    }  $arr_count = count($arr_items);

    ?>
        
        <h1>Factura <?php echo $num ?></h1>
        <p>Alumno: <?php echo $keyt->alumno; ?> </p>
        <p>Especialidad: <?php echo $keyt->especialidad; ?> </p>
        <p>Docente: <?php echo $keyt->docente; ?></p>
        <p>Curso: <?php echo $keyt->curso; ?></p>
        <p>Division: <?php echo $keyt->division; ?></p>
    <?php

        for($q = 0; $q < $arr_count; $q++) {
    ?>

        <p>Herramienta <?php if($arr_count > 1) { echo ($q + 1); } ?>: <?php echo $arr_items[$q] . " - " . $arr_items_cant[$q]; ?></p>
    </div>
    <?php
        
        }
        
        $delete_id = $key['id'];
        
    ?>
    <script>
         function Delete(id) {
                window.location = `../Model/delete.php?id=${id}`;
            }
    </script>
    <div>
        <button>Editar</button>
        <button onclick = Delete("<?php echo $delete_id; ?>");>Borrar</button>
        
    </div>
    
    <?php
        unset($arr_items);
        unset($arr_items_cant);
    }
        
        // Verificacion de Facturas

        if(!$assoc) {
    
        echo '<script>
            const facturas = document.querySelector(".facturas-div");
            
            facturas.classList.toggle("active");
            
        </script>';
    ?>
       
        <!-- En caso de que no exista ninguna factura mostrar este mensaje -->

        <h1 class = 'vacio'>No hay Facturas Pendientes !</h1>
    
    <?php
        }
    ?>
    
            </div>
    
        </div>
        
        <a href="../Model/delete_all.php" class = "delete-all">Borrar Todo</a>
    </div>
</body>
</html>