<?php

include './conexion.php';



// Metodo POST donde se guardan todos los valores de los input number.

$arr_tools = $_POST['tools'];

// Variables

$alumno = $_POST['alumno'];
$docente = $_POST['docente'];
$especialidad = $_POST['especialidad-op'];
$year = $_POST['year-op'];
$year_div = $_POST['year-div-op'];

$i = 0;

$path = '../public/js/tools_id.json';

// Obtener el contenido del archivo JSON.

$json_content = file_get_contents($path);

// Transformar ese contenido JSON a PHP.

$json_id = json_decode($json_content);

$max_tools = count($json_id);

// Array donde se guardaran los datos.

$json_tools_arr = array();

if(isset($_POST['submit_form'])) {
   foreach($arr_tools as $key) {
    ++$i;
    if($key > 0) {
        echo "<br>" . "ID " . $i . " - Cantidad - " . $key . " ";
        for($z = 0; $z < $max_tools; ++$z) {

            // Validar si la ID AUTO_INCREMENT del bucle es == a la id del JSON.

                if($i == $json_id[$z]->id) {
                    //array_push($json_tools_arr, $json_id[$z]->nombre); // Metodo para agregar al array los datos.

                    array_push($json_tools_arr, ['objeto' => $json_id[$z]->nombre, 'cantidad' => $key, 'alumno' => $alumno, 'especialidad' => $especialidad, 'docente' => $docente,'curso' => $year, 'division' => $year_div]);

                }
            }
        }
    }

    // Cantidad de elementos en el array de herramientas.

    $cant = count($json_tools_arr);

    if($cant > 0) {

        // Convertir array a JSON.

        $convertJSON = json_encode($json_tools_arr);

        // Query a la base de datos de facturas.

        $query = "INSERT INTO facturas(nombre, objetos)
        VALUES ('Juan', '$convertJSON')";

        // Ejecutar la Query.

        $ejecutar = mysqli_query($conexion, $query);
    }
}

?>