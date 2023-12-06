<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'tiendaabejita';

// Conexión a la base de datos
$conexion = new mysqli($host, $user, $pass, $db);

if ($conexion->connect_error) {
    die('Error de conexión a la base de datos: ' . $conexion->connect_error);
}

// Nombre del archivo CSV
$archivo_csv = 'Karla21te0146_' . date('Y-m-d_H-i-s') . '.csv';

// Consulta SQL para obtener datos
$consulta_sql = "SELECT * FROM distribuidor";


// Ejecuta la consulta
$resultado = $conexion->query($consulta_sql);

if ($resultado) {
    // Abre el archivo CSV en modo escritura
    $archivo = fopen($archivo_csv, 'w');

    // Agrega un encabezado al archivo CSV
    fputcsv($archivo, array('id','nombre', 'apelidoP', 'apellidoM', 'telefono', 'region_distribuidora', 'genero', 'categoria_id', 'producto_id')); 

    // Escribe los datos en el archivo CSV
    while ($fila = $resultado->fetch_assoc()) {
        fputcsv($archivo, $fila);
    }

    // Cierra el archivo CSV
    fclose($archivo);

    // Descarga el archivo CSV
    header('Content-disposition: attachment; filename=' . $archivo_csv);
    header('Content-type: application/csv');
    readfile($archivo_csv);
} else {
    echo "Error en la consulta: " . $conexion->error;
}

// Cierra la conexión a la base de datos
$conexion->close();
?>
