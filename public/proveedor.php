<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tiendaabejita";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellidoP = $_POST["apellidoP"];
    $apellidoM = $_POST["apellidoM"];
    $telefono = $_POST["telefono"];
    $direccion = $_POST["direccion"]; 
    $genero = $_POST["genero"];
    $categoria_id = $_POST["categoria_id"];
    $producto_id = $_POST["producto_id"];

    $sql = "INSERT INTO proveedor (nombre, apellidoP, apellidoM, telefono, direccion, genero, categoria_id, producto_id) 
    VALUES ('$nombre', '$apellidoP', '$apellidoM', '$telefono', '$direccion', '$genero', '$categoria_id', '$producto_id')";

    if ($conn->query($sql) === TRUE) {
        header("Location: consultarpt.php");
        exit();
    } else {
        echo "Error al insertar datos: " . $conn->error;
    }
}

$conn->close();
?>
