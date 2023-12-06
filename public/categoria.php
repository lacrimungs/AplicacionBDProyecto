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

    $nombre_categoria = $_POST["nombre_categoria"];
    $nombre_marca = $_POST["nombre_marca"];
    $created_at = $_POST["created_at"];

    $sql = "INSERT INTO categoriaproducto (nombre_categoria, nombre_marca, created_at) VALUES ('$nombre_categoria', '$nombre_marca', '$created_at')";

    if ($conn->query($sql) === TRUE) {
        header("Location: consultarc.php");
        exit(); 
    } else {
        echo "Error al insertar datos: " . $conn->error;
    }

    $conn->close();
}
?>

