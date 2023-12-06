<?php
// Datos de conexión a la base de datos
require 'principal.php';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consultas utilizando las vistas
    $sql_vista_perfil = "SELECT id_profile, nombre, genero, status, correo_electronico FROM vista_perfil";
    $sql_vista_compras = "SELECT id_compra, nombre_compra, cantidad, nombre_producto, descripcion, direccion_tienda FROM vista_compras";
    $sql_vista_productos = "SELECT id, nombre_categoria, nombre_marca FROM vista_categoria";
    $sql_vista_categoria = "SELECT id, nombre_categoria, nombre_marca FROM vista_categoria";
    $sql_vista_proveedores = "SELECT id, nombre, apellidoP, apellidoM, telefono, direccion, genero, categoria_id, producto_id FROM vista_proveedores";


    // Ejecutar consultas
    $result_vista_perfil = $conn->query($sql_vista_perfil);
    $result_vista_compras = $conn->query($sql_vista_compras);
    $result_vista_productos = $conn->query($sql_vista_productos);
    $result_vista_categoria = $conn->query($sql_vista_categoria);
    $result_vista_proveedores = $conn->query($sql_vista_proveedores);


    // Función para mostrar los resultados como tabla HTML
    function mostrarTabla($result, $titulo) {
        echo "<h2>$titulo</h2>";
        if ($result->rowCount() > 0) {
            echo "<table border='1'>
            <tr>";
            // Obtener los nombres de las columnas
            $columns = array();
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                foreach ($row as $key => $value) {
                    if (!in_array($key, $columns)) {
                        $columns[] = $key;
                    }
                }
            }
            foreach ($columns as $column) {
                echo "<th>$column</th>";
            }
            echo "</tr>";

            // Mostrar los datos en la tabla
            $result->execute();
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                foreach ($columns as $column) {
                    echo "<td>" . $row[$column] . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No se encontraron resultados para $titulo.";
        }
    }

    // Mostrar las tablas para cada consulta
    mostrarTabla($result_vista_perfil, "Vista de Perfil");
    mostrarTabla($result_vista_compras, "Vista de Compras");
    mostrarTabla($result_vista_productos, "Vista de Productos");
    mostrarTabla($result_vista_categoria, "Vista de Categoría");
    mostrarTabla($result_vista_proveedores, "Vista de Proveedores");

} catch(PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>

