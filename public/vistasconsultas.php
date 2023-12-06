<?php
// vistas.php

function mostrarConsulta1($result1) {
    echo "<h2>Consulta 1</h2>";
    echo "<table border='1'>
    <tr>
    <th>ID</th>
    <th>Nombre del usuario</th>
    <th>Perfil</th>
    <th>Nombre Real</th>
    <th>Apellido Paterno</th>
    <th>Apellido Materno</th>
    </tr>";
    foreach ($result1 as $row) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td>" . $row['profile'] . "</td>";
        echo "<td>" . $row['nombre_info'] . "</td>";
        echo "<td>" . $row['apellidoP'] . "</td>";
        echo "<td>" . $row['apellidoM'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
function mostrarConsulta2($result2) {
    echo "<h2>Consulta 2</h2>";
    echo "<table border='1'>
    <tr>
    <th>ID</th>
    <th>Nombre del proveedor</th>
    <th>Apellido paterno</th>
    <th>Apellido materno</th>
    <th>Nombre del producto</th>
    <th>Descripcion</th>
    </tr>";
    foreach ($result2 as $row) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td>" . $row['apellidoP'] . "</td>";
        echo "<td>" . $row['apellidoM'] . "</td>";
        echo "<td>" . $row['nombre_producto'] . "</td>";
        echo "<td>" . $row['descripcion'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

function mostrarConsulta3($result3) {
    echo "<h2>Consulta 3</h2>";
    echo "<table border='1'>
    <tr>
    <th>ID</th>
    <th>Nombre del producto</th>
    <th>Descripcion del producto</th>
    <th>Inventario</th>
    <th>Direccion tienda</th>
    <th>ID del proveedor</th>
    <th>Nombre del proveedor</th>
    <th>Apellido del proveedor</th>
    </tr>";
    foreach ($result3 as $row) {
        echo "<tr>";
        echo "<td>" . $row['id_producto'] . "</td>";
        echo "<td>" . $row['nombre_producto'] . "</td>";
        echo "<td>" . $row['descripcion_producto'] . "</td>";
        echo "<td>" . $row['num_producto_disponible'] . "</td>";
        echo "<td>" . $row['direccion_tienda'] . "</td>";
        echo "<td>" . $row['id_proveedor'] . "</td>";
        echo "<td>" . $row['nombre_proveedor'] . "</td>";
        echo "<td>" . $row['apellido_proveedor'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

?>
