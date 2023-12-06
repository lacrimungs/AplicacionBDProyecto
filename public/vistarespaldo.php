<!DOCTYPE html>
<html>
<head>
    <title>Respaldo de Base de datos</title>
    <style>    body {
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

        /* Estilos del resto de la página */
        form {
            display: inline-block;
            background-color: blue;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        form input[type="submit"] {
            background-color: blue;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        .mensaje {
            font-size: 24px;
            font-weight: bold;
            color: black;
            margin-bottom: 120px;
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

        /* Estilos del resto de la página */
        form {
            display: inline-block;
            background-color: blue;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        form input[type="submit"] {
            background-color: blue;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        .mensaje {
            font-size: 24px;
            font-weight: bold;
            color: black;
            margin-bottom: 120px;
        }
    </style>
</head>
<body>
    <nav>
    <ul>
            <li class="dropdown">
                <a href="principal.php" class="dropbtn">Consultas</a>
                </div>
            </li>
            <li>
                <a href="vistarespaldo.php">Respaldo de BD</a>
            </li>
            <li>
                <a href="agregarc.php">Categoria</a>
            </li>
            <li>
                <a href="agregarcp.php">Compra</a>
            </li>
            <li>
                <a href="agregarp.php">Producto</a>
            </li>
            <li>
                <a href="agregard.php">Distribuidor</a>
            </li>
            <li>
                <a href="agregarpt.php">Proveedor</a>
            </li>
        </ul>
    </nav>

    <!-- Contenido principal -->
    <div class="mensaje">Hola Hermosa, aquí puedes exportar tu base de datos</div>
    <form action="respaldo.php" method="post">
        <input type="submit" name="exportar" value="Exportar Base de datos">
    </form>
</body>
</html>
