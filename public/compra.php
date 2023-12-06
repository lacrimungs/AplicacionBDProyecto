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

    $nombre_compra = $_POST["nombre_compra"];
    $cantidad = $_POST["cantidad"];
    $created_at = $_POST["created_at"];

    $sql = "INSERT INTO compra (nombre_compra, cantidad, created_at) VALUES ('$nombre_compra', '$cantidad', '$created_at')";

    if ($conn->query($sql) === TRUE) {
        header("Location: consultarcp.php");
        exit(); 
    } else {
        echo "Error al insertar datos: " . $conn->error;
    }

    $conn->close();
}
?>