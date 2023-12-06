<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Categoria</title>
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
        <h2>Agregar Categoría</h2>
        <form action="categoria.php" method="POST">
            <label for="nombre_categoria">Nombre de la categoría</label>
            <input type="text" name="nombre_categoria" id="nombre_categoria" required>
            
            <label for="nombre_marca">Nombre de la Marca</label>
            <input type="text" name="nombre_marca" id="nombre_marca" required>
            
            <label for="created_at">Fecha</label>
            <input type="date" name="created_at" id="created_at">
                
            <input type="submit" value="Agregar">
        </form>
    </div>
</body>
</html>
