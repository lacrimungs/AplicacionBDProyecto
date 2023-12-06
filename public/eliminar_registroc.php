<?php
if ($_SERVER['REQUEST_METHOD'] === 'DELETE' && isset($_GET['id'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tiendaabejita";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $id = $_GET['id'];
    $sql = "DELETE FROM categoriaproducto WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        http_response_code(200);
    } else {
        http_response_code(500);
    }
    $conn->close();
}
?>
