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

    $sql = "DELETE FROM distribuidor WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id); 
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        http_response_code(200); 
    } else {
        http_response_code(500); 
    }

    $stmt->close();
    $conn->close();
}
?>