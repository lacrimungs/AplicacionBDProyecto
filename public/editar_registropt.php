<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Proveedor</title>
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
        $distribuidor_id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $apellidoP = $_POST["apellidoP"];
        $apellidoM = $_POST["apellidoM"];
        $telefono = $_POST["telefono"];
        $direccion = $_POST["direccion"];
        $genero = $_POST["genero"];
        $categoria_id = $_POST["categoria_id"];
        $producto_id = $_POST["producto_id"];

        $sql = "UPDATE distribuidor SET nombre='$nombre', apellidoP='$apellidoP', apellidoM='$apellidoM', telefono='$telefono', direccion='$direccion', genero='$genero', categoria_id='$categoria_id', producto_id='$producto_id' WHERE id='$distribuidor_id'";

        if ($conn->query($sql) === TRUE) {
            header("Location: consultard.php");
            exit();
        } else {
            echo "Error al actualizar: " . $conn->error;
        }
    }


    $distribuidor_id = $_GET["id"]; 
    $sql = "SELECT * FROM proveedor WHERE id = '$distribuidor_id'";
    $result = $conn->query($sql);

   
    $nombre = "";
    $apellidoP = "";
    $apellidoM = "";
    $telefono = "";
    $direccion = "";
    $genero = "";
    $categoria_id = "";
    $producto_id = "";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $nombre = $row["nombre"];
            $apellidoP = $row["apellidoP"];
            $apellidoM = $row["apellidoM"];
            $telefono = $row["telefono"];
            $direccion = $row["direccion"];
            $genero = $row["genero"];
            $categoria_id = $row["categoria_id"];
            $producto_id = $row["producto_id"];
        }
    } else {
        echo "No se encontraron resultados.";
    }
    ?>

    <div class="container">
        <h2>Editar Distribuidor</h2>
        <form action="editar_registrod.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $distribuidor_id; ?>">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="<?php echo $nombre; ?>" required>
            
            <label for="apellidoP">Apellido Paterno</label>
            <input type="text" name="apellidoP" id="apellidoP" value="<?php echo $apellidoP; ?>" required>
            
            <label for="apellidoM">Apellido Materno</label>
            <input type="text" name="apellidoM" id="apellidoM" value="<?php echo $apellidoM; ?>" required>
            
            <label for="telefono">Teléfono</label>
            <input type="text" name="telefono" id="telefono" value="<?php echo $telefono; ?>" required>
            
            <label for="direccion">Direccion</label>
            <input type="text" name="direccion" id="direccion" value="<?php echo $direccion; ?>" required>
            
            <label for="genero">Género</label>
            <select name="genero" id="genero">
                <option value="M" <?php if ($genero === 'M') echo 'selected'; ?>>Masculino</option>
                <option value="F" <?php if ($genero === 'F') echo 'selected'; ?>>Femenino</option>
            </select>
            
            <label for="categoria_id">Categoría</label>
            <input type="text" name="categoria_id" id="categoria_id" value="<?php echo $categoria_id; ?>" required>
            
            <label for="producto_id">Producto</label>
            <input type="text" name="producto_id" id="producto_id" value="<?php echo $producto_id; ?>" required>
            
            <input type="submit" value="Actualizar">
        </form>
    </div>
</body>
</html>
