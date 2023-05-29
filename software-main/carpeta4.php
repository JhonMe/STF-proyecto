<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usuarios";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Consulta inicial para obtener todos los registros
$consulta = "SELECT * FROM inicio3";
$resultado = $conn->query($consulta);

// Obtener los valores únicos para el campo "proceso"
$consultaProcesos = "SELECT DISTINCT proceso FROM inicio3";
$resultadoProcesos = $conn->query($consultaProcesos);

// Arreglo para almacenar las opciones del select
$options = "";

// Verificar si se obtuvieron resultados
if ($resultadoProcesos->num_rows > 0) {
    while ($row = $resultadoProcesos->fetch_assoc()) {
        $proceso = $row["proceso"];
        $options .= "<option value='$proceso'>$proceso</option>";
    }
} else {
    $options = "<option value=''>No se encontraron procesos</option>";
}

// Cerrar la conexión
$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<style>
     body {
            background-color: #429fe6;
            background-image: linear-gradient(45deg, #429fe6, #ffffff, #429fe6);
            background-size: 200% 200%;
            animation: gradientAnimation 10s ease infinite;
        }

        @keyframes gradientAnimation {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }
    .custom-button {
        background-color: red;
        color: white;
        font-family: georgia;
        font-size: 18px;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .custom-button:hover {
        background-color: #1c7bbf;
    }

    .custom-button-container {
        position: absolute;
        top: 50px;
        left: 1600px;
    }

    .custom-button-salir {
        position: absolute;
        margin-top: 50px;
        margin-left: 1600px;
        
    }
</style>

<body>
    <div style="background-color: #429fe6;">
        <h2 style="text-align: center; font-family: georgia; top:10px;">REGISTRO DEL PRODUCTO NO CONFORME Y NO CONFORMIDADES</h2>
    </div>

    <div
        style="position: absolute; top: 40%; left: 40%; transform: translate(-50%, -50%); background-color: tranparent; height: 50%; width: 70%; margin: 0, 30, 0, 0;"
        class="principal">
        <div class="form-group">
            <label style="font-family: georgia; font-size: 20px; " for="proceso">Buscar por Proceso:</label>
            <select class="form-control" id="proceso" onchange="filterByProceso()">
                <option style="width: 50px;" value="">Todos los procesos</option>
                <?php echo $options; ?>
            </select>
        </div>
        <br>
        <table class="table"  id="tabla-registros">
            <thead>
                <tr>
                    <th>PROCESO</th>
                    <th>DIRECCION</th>
                    <th>PARTES</th>
                    <th>SELECCION</th>
                    <th>EXTERNO</th>
                    <th>SELECCION1</th>
                    <th>NOMBRES</th>
                    <th>TELEFONO</th>
                    <th>CORREO</th>
                    <th>COMENTARIO</th>
                    <th>COMENTARIO DESCRIPCION</th>
                    <th>ID PROCESO</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Mostrar los registros obtenidos en la tabla
                if ($resultado->num_rows > 0) {
                    while ($row = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["proceso"] . "</td>";
                        echo "<td>" . $row["direccion"] . "</td>";
                        echo "<td>" . $row["parte"] . "</td>";
                        echo "<td>" . $row["seleccion"] . "</td>";
                        echo "<td>" . $row["externo"] . "</td>";
                        echo "<td>" . $row["seleccion1"] . "</td>";
                        echo "<td>" . $row["nombres"] . "</td>";
                        echo "<td>" . $row["telefono"] . "</td>";
                        echo "<td>" . $row["correo"] . "</td>";
                        echo "<td>" . $row["comentario"] . "</td>";
                        echo "<td>" . $row["comentario_descripcion"] . "</td>";
                        echo "<td>" . $row["idproceso"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='12'>No se encontraron registros</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="custom-button-container">
            <button class="custom-button" onclick="goToInicio()">Ir al Inicio</button>
        </div>
        <div class="custom-button-salir">
            <button class="custom-button" onclick="salir()">Salir</button>
        </div>
    </div>

    <script>
        function filterByProceso() {
            var proceso = document.getElementById("proceso").value;
            var table = document.getElementById("tabla-registros");
            var rows = table.getElementsByTagName("tbody")[0].getElementsByTagName("tr");

            for (var i = 0; i < rows.length; i++) {
                var procesoCell = rows[i].getElementsByTagName("td")[0];
                if (proceso === "" || procesoCell.textContent.trim() === proceso) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
        }

        function goToInicio() {
            window.location.href = "carpeta1.php"; // Reemplaza "carpeta1.php" con la URL de tu página de inicio
        }

        function salir() {
            window.location.href = "bienvenida.php"; // Reemplaza "salir.php" con la URL de tu página de salida
        }
    </script>

</body>

</html>