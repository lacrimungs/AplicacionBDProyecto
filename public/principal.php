<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tiendaabejita";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Archivos con consultas y vistas después de establecer la conexión
    include_once 'consultas.php';
    include_once 'vistasconsultas.php';
    include_once 'vistashechas.php';

    // Variable para almacenar el contenido a mostrar
    $contenidoAMostrar = '';

    // Verificar si la función procesarConsulta() está definida antes de declararla
    if (!function_exists('procesarConsulta')) {
        // Definir la función procesarConsulta() solo si no está definida
        function procesarConsulta($conn, $consulta)
        {
            $contenidoAMostrar = '';
            
            switch ($consulta) {
                case '1':
                    $result1 = obtenerConsulta1($conn);
                    $contenidoAMostrar = mostrarConsulta1($result1);
                    break;
                case '2':
                    $result2 = obtenerConsulta2($conn);
                    $contenidoAMostrar = mostrarConsulta2($result2);
                    break;
                case '3':
                    $result3 = obtenerConsulta3($conn);
                    $contenidoAMostrar = mostrarConsulta3($result3);
                    break;
                default:
                    $contenidoAMostrar = "Selecciona una consulta de tabla relacionada.";
                    break;
            }

            return $contenidoAMostrar;
        }
    }

    // Mostrar el menú de navegación con un desplegable
    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Menú Desplegable</title>
        <style>
            /* Estilos del menú desplegable */
            body {
                font-family: Arial, sans-serif;
                background-color: #f0f0f0;
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

    // Procesar la consulta seleccionada si existe
    $consulta = isset($_GET['consulta']) ? $_GET['consulta'] : null;
    if ($consulta) {
        $contenidoAMostrar = procesarConsulta($conn, $consulta);
    } else {
        $contenidoAMostrar = "Selecciona una consulta.";
    }

    // Mostrar el contenido después de procesar la consulta
    echo '<div>' . $contenidoAMostrar . '</div>';

    echo '</body></html>'; // Cierre de etiquetas HTML

} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}

// Cerrar la conexión a la base de datos al finalizar
$conn = null;
?>
