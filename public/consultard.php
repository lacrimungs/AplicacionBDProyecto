<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Consulta de Distribuidores</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        .delete-button {
            background-color: #ff5555;
            color: white;
            border: none;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 4px;
            cursor: pointer;
        }

        .delete-button:hover {
            background-color: #ff0000;
        }

        .edit-button {
            background-color: #55aaff;
            color: white;
            border: none;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 4px;
            cursor: pointer;
        }

        .edit-button:hover {
            background-color: #0088ff;
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

    $sql = "SELECT * FROM distribuidor";
    $result = $conn->query($sql);
    ?>

    <h2>Consulta de Distribuidores</h2>
    <?php
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Nombre del Distribuidor</th><th>Apellido paterno</th><th>Apellido Materno</th><th>Telefono</th><th>Region distribuidora</th><th>Genero</th><th>Producto</th><th>Categoria</th><th>Acciones</th></tr>";
        while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["nombre"] . "</td><td>" . $row["apellidoP"] . "</td><td>" . $row["apellidoM"] . "</td><td>" . $row["telefono"] . "</td><td>" . $row["region_distribuidora"] . "</td><td>" . $row["genero"] . "</td><td>" . $row["producto_id"] . "</td><td>" . $row["categoria_id"] . "</td><td><button class='delete-button' data-id='" . $row['id'] . "'>Eliminar</button> <a href='editar_registrod.php?id=" . $row['id'] . "' class='edit-button'>Editar</a></td></tr>";
        }
        echo "</table>";
    } else {
        echo "No se encontraron resultados.";
    }
    ?>

    <script>
        const deleteButtons = document.querySelectorAll('.delete-button');
        deleteButtons.forEach(button => {
            button.addEventListener('click', () => {
                const id = button.getAttribute('data-id');
                if (confirm('¿Estás seguro que deseas eliminar este registro?')) {
                    const xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            if (xhr.status === 200) {
                                location.reload();
                            } else {
                                console.error('Error al eliminar el registro.');
                            }
                        }
                    };
                    xhr.open('DELETE', 'eliminar_registrod.php?id=' + id, true);
                    xhr.send();
                }
            });
        });
    </script>
</body>
</html>