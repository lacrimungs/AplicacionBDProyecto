<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Agregar Producto</title>
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
    </style>
</head>
<body>
<nav>
        <ul>
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
<body>
    <form action="producto.php" method="POST">
    <h2>Agregar Producto</h2>
        <label for="nombre">Nombre del Producto</label>
        <input type="text" name="nombre" id="nombre" required>
        
        <label for="precio">Precio</label>
        <input type="text" name="precio" id="precio" required>
        
        <label for="imagen_url">Subir Imagen</label>
        <input type="file" name="imagen_url" id="imagen_url">
        
        <label for="descripcion">Descripción</label>
        <input type="text" name="descripcion" id="descripcion" required>
        
        <label for="uso_producto">Uso del Producto</label>
        <select name="uso_producto" id="uso_producto">
            <option value="Medicina">Medicina</option>
            <option value="Cosmético">Cosmético</option>
            <option value="Consumo Humano">Consumo Humano</option>
        </select>
        
        <label for="num_producto_disponible">Cantidad Disponible</label>
        <input type="text" name="num_producto_disponible" id="num_producto_disponible" required>
        
        <label for="direccion_tienda">Dirección de la Tienda</label>
        <select name="direccion_tienda" id="direccion_tienda">
            <option value="Plaza Crystal">Plaza Crystal</option>
            <option value="Cuauhtemoc">Cuauhtemoc</option>
            <option value="Allende">Allende</option>
        </select>
        
        <input type="submit" value="Agregar Producto">
    </form>
</body>
</html>
