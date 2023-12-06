<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tiendaabejita";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $imagen_url = $_POST["imagen_url"];
    $descripcion = $_POST["descripcion"];
    $uso_producto = $_POST["uso_producto"];
    $num_producto_disponible = $_POST["num_producto_disponible"];
    $direccion_tienda = $_POST["direccion_tienda"];


    $sql = "INSERT INTO producto (nombre, precio, imagen_url, descripcion, uso_producto, num_producto_disponible, direccion_tienda) VALUES ('$nombre', '$precio', '$imagen_url', '$descripcion', '$uso_producto', '$num_producto_disponible', '$direccion_tienda')";

    if ($conn->query($sql) === TRUE) {
        header("Location: consultarp.php");
        exit(); 
    } else {
        echo "Error al insertar datos: " . $conn->error;
    }

    $conn->close();
}
?>
