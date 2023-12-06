<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label,
        input,
        select {
            display: block;
            margin-bottom: 10px;
            width: calc(100% - 20px);
            padding: 8px;
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
        $producto_id = $_POST["id"];
        $nombre_producto = $_POST["nombre_producto"];
        $precio = $_POST["precio"];
        $imagen_url = $_POST["imagen_url"];
        $descripcion = $_POST["descripcion"];
        $uso_producto = $_POST["uso_producto"];
        $num_producto_disponible = $_POST["num_producto_disponible"];
        $direccion_tienda = $_POST["direccion_tienda"];

        $sql = "UPDATE producto SET nombre='$nombre_producto', precio='$precio', imagen_url='$imagen_url', descripcion='$descripcion', uso_producto='$uso_producto', num_producto_disponible='$num_producto_disponible', direccion_tienda='$direccion_tienda' WHERE id='$producto_id'";

        if ($conn->query($sql) === TRUE) {
            header("Location: consultar_productos.php");
            exit();
        } else {
            echo "Error al actualizar: " . $conn->error;
        }
    }

    // Obtener datos existentes
    $producto_id = $_GET["id"]; // ID del producto a editar
    $sql = "SELECT * FROM producto WHERE id = '$producto_id'";
    $result = $conn->query($sql);

    // Inicializar variables
    $nombre_producto = "";
    $precio = "";
    $imagen_url = "";
    $descripcion = "";
    $uso_producto = "";
    $num_producto_disponible = "";
    $direccion_tienda = "";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $nombre_producto = $row["nombre"];
            $precio = $row["precio"];
            $imagen_url = $row["imagen_url"];
            $descripcion = $row["descripcion"];
            $uso_producto = $row["uso_producto"];
            $num_producto_disponible = $row["num_producto_disponible"];
            $direccion_tienda = $row["direccion_tienda"];
        }
    } else {
        echo "No se encontraron resultados.";
    }
    
    ?>

    <form action="actualizar_producto.php" method="POST">
        <h2>Editar Producto</h2>
        <!-- Input oculto con el ID del producto -->
        <input type="hidden" name="id" value="<?php echo $producto_id; ?>">
        
        <label for="nombre_producto">Nombre del Producto</label>
        <input type="text" name="nombre_producto" id="nombre_producto" value="<?php echo $nombre_producto; ?>" required>
        
        <label for="precio">Precio</label>
        <input type="text" name="precio" id="precio" value="<?php echo $precio; ?>" required>
        
        <label for="imagen_url">URL de la Imagen</label>
        <input type="text" name="imagen_url" id="imagen_url" value="<?php echo $imagen_url; ?>">
        
        <label for="descripcion">Descripción</label>
        <input type="text" name="descripcion" id="descripcion" value="<?php echo $descripcion; ?>" required>
        
        <label for="uso_producto">Uso del Producto</label>
        <select name="uso_producto" id="uso_producto">
            <option value="Medicina" <?php if ($uso_producto === "Medicina") echo "selected"; ?>>Medicina</option>
            <option value="Cosmético" <?php if ($uso_producto === "Cosmético") echo "selected"; ?>>Cosmético</option>
            <option value="Consumo Humano" <?php if ($uso_producto === "Consumo Humano") echo "selected"; ?>>Consumo Humano</option>
        </select>
        
        <label for="num_producto_disponible">Cantidad Disponible</label>
        <input type="text" name="num_producto_disponible" id="num_producto_disponible" value="<?php echo $num_producto_disponible; ?>" required>
        
        <label for="direccion_tienda">Dirección de la Tienda</label>
        <select name="direccion_tienda" id="direccion_tienda">
            <option value="Plaza Crystal" <?php if ($direccion_tienda === "Plaza Crystal") echo "selected"; ?>>Plaza Crystal</option>
            <option value="Cuauhtemoc" <?php if ($direccion_tienda === "Cuauhtemoc") echo "selected"; ?>>Cuauhtemoc</option>
            <option value="Allende" <?php if ($direccion_tienda === "Allende") echo "selected"; ?>>Allende</option>
        </select>
        
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>
