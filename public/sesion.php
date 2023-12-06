<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .container {
            max-width: 400px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 6px;
        }
        
        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: calc(100% - 20px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        
        input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        input[type="submit"]:hover {
            background-color: #2980b9;
        }

        p.error-message {
            text-align: center;
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Iniciar Sesión</h2>
        <form action="" method="POST">
            <label for="username">Usuario</label>
            <input type="text" name="username" id="username" required>
            
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" required>
            
            <input type="submit" value="Iniciar Sesión">
        </form>

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
            $nombre = $_POST["username"];
            $password = $_POST["password"];

            $sql = "SELECT * FROM usuario WHERE nombre='$nombre' AND password='$password'";
            $result = $conn->query($sql);

            if ($result->num_rows == 1) {
                header("Location: principal.php");
                exit();
            } else {
                echo "<p class='error-message'>Usuario o contraseña incorrectos</p>";
            }
        }

        $conn->close();
        ?>
    </div>
</body>
</html>

