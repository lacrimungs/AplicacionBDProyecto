<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Proveedor</title>
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
        body {
            text-align: center;
            font-family: Arial, sans-serif;
        }
        
        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            background-color: #3498db;
            overflow: hidden;
        }

        nav ul li {
            float: left;
        }

        nav ul li a {
            display: block;
            color: #ecf0f1;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        nav ul li a:hover {
            background-color: #2980b9;
        }

        /* Estilos para el menú desplegable */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #3498db;
            min-width: 160px;
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a {
            color: #ecf0f1;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
<nav>
<nav>
            <ul>
                <li class="dropdown">
                    <a href="#" class="dropbtn">Consultas</a>
                    <div class="dropdown-content">
                        <a href="?consulta=1">Consulta 1</a>
                        <a href="?consulta=2">Consulta 2</a>
                        <a href="?consulta=3">Consulta 3</a>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="vistarespaldo.php" class="dropbtn">Respaldo de BD</a>
                </li>
                <li class="dropdown">
                <a href="#" class="dropbtn">Categoria</a>
                <div class="dropdown-content">
                <a href="agregarc.php" class="dropbtn">Agregar</a>
                <a href="consultarc.php" class="dropbtn">Consultar</a>
                </li>
                <li class="dropdown">
                <a href="#" class="dropbtn">Compra</a>
                <div class="dropdown-content">
                <a href="agregarcp.php" class="dropbtn">Agregar</a>
                <a href="consultarcp.php" class="dropbtn">Consultar</a>
             </li>
             <li class="dropdown">
                <a href="#" class="dropbtn">Producto</a>
                <div class="dropdown-content">
                <a href="agregarp.php" class="dropbtn">Agregar</a>
                <a href="consultarcp.php" class="dropbtn">Consultar</a>
             </li>
             <li class="dropdown">
             <a href="#" class="dropbtn">Distribuidor</a>
             <div class="dropdown-content">
             <a href="agregard.php" class="dropbtn">Agregar</a>
             <a href="consultard.php" class="dropbtn">Consultar</a>
          </li>
          <li class="dropdown">
          <a href="#" class="dropbtn">Proveedor</a>
          <div class="dropdown-content">
          <a href="agregarpt.php" class="dropbtn">Agregar</a>
          <a href="consultarpt.php" class="dropbtn">Consultar</a>
       </li>
            </ul>
        </nav>';
    </nav>

    <div class="container">
    <h2>Agregar Proveedor</h2>
    <form action="proveedor.php" method="POST">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" required>
        
        <label for="apellidoP">Apellido Paterno</label>
        <input type="text" name="apellidoP" id="apellidoP" required>
        
        <label for="apellidoM">Apellido Materno</label>
        <input type="text" name="apellidoM" id="apellidoM" required>
        
        <label for="telefono">Teléfono</label>
        <input type="text" name="telefono" id="telefono" required>
        
        <label for="direccion">Direccion</label>
        <input type="text" name="direccion" id="direccion" required>
        
        <label for="genero">Género</label>
        <select name="genero" id="genero">
            <option value="M">Masculino</option>
            <option value="F">Femenino</option>
        </select>
        
        <label for="categoria_id">Categoría</label>
        <select name="categoria_id" id="categoria_id">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "tiendaabejita";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            $sql = "SELECT id, nombre_categoria FROM categoriaproducto";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['nombre_categoria'] . "</option>";
                }
            } else {
                echo "<option value=''>No hay categorías disponibles</option>";
            }
            ?>
        </select>
        
        <!-- Selección de Producto -->
        <label for="producto_id">Producto</label>
        <select name="producto_id" id="producto_id">
            <?php
            $sql = "SELECT id, nombre FROM producto";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                }
            } else {
                echo "<option value=''>No hay productos disponibles</option>";
            }

            $conn->close();
            ?>
        </select>
        
        
        <input type="submit" value="Agregar">
    </form>
</div>
</body>
</html>
