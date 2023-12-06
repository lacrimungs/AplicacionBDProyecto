<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Compra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        
        .container {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        .container h2 {
            text-align: center;
        }
        
        label {
            display: block;
            margin-bottom: 6px;
        }
        
        input[type="text"],
        input[type="date"],
        select {
            width: calc(100% - 20px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        
        input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        input[type="submit"]:hover {
            background-color: #2980b9;
        }
        
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.8em;
            color: #888;
        }
    </style>
</head>
<body>
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
        $compra_id = $_POST["id"];
        $nombre_compra = $_POST["nombre_compra"];
        $cantidad = $_POST["cantidad"];
        $created_at = $_POST["created_at"];

        $sql = "UPDATE compra SET nombre_compra='$nombre_compra', cantidad='$cantidad', created_at='$created_at' WHERE id='$compra_id'";

        if ($conn->query($sql) === TRUE) {
            header("Location: consultarcp.php");
            exit();
        } else {
            echo "Error al actualizar: " . $conn->error;
        }
    }

    // Obtener datos existentes
    $compra_id = $_GET["id"]; // ID de la categoría a editar
    $sql = "SELECT * FROM compra WHERE id = '$compra_id'";
    $result = $conn->query($sql);

    // Inicializar variables
    $nombre_compra = "";
    $cantidad = "";
    $created_at = "";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $nombre_compra = $row["nombre_compra"];
            $cantidad = $row["cantidad"];
            $created_at = $row["created_at"];
        }
    } else {
        echo "No se encontraron resultados.";
    }
    
    ?>

    <div class="container">
        <h2>Editar Categoría</h2>
        <form action="editar_registrocp.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $compra_id; ?>">
            <label for="nombre_compra">Nombre de la compra</label>
            <input type="text" name="nombre_compra" id="nombre_compra" value="<?php echo $nombre_compra; ?>" required>
            
            <label for="cantidad">Cantidad</label>
            <input type="text" name="cantidad" id="cantidad" value="<?php echo $cantidad; ?>" required>
            
            <label for="created_at">Fecha</label>
            <?php
            $formatted_date = date("Y-m-d", strtotime($created_at));
            ?>
            <input type="date" name="created_at" id="created_at" value="<?php echo $formatted_date; ?>">
                
            <input type="submit" value="Actualizar">
        </form>
    </div>
</body>
</html>
