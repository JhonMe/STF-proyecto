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
$consulta = "SELECT * FROM inicio2";
$resultado = $conn->query($consulta);

// Obtener los valores únicos para el campo "certificacion"
$consultaCertificaciones = "SELECT DISTINCT certificacion FROM inicio2";
$resultadoCertificaciones = $conn->query($consultaCertificaciones);

// Arreglo para almacenar las opciones del select
$options = "";

// Verificar si se obtuvieron resultados
if ($resultadoCertificaciones->num_rows > 0) {
    while ($row = $resultadoCertificaciones->fetch_assoc()) {
        $certificacion = $row["certificacion"];
        $options .= "<option value='$certificacion'>$certificacion</option>";
    }
} else {
    $options = "<option value=''>No se encontraron certificaciones</option>";
}

// Cerrar la conexión
$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
<link rel="icon" type="png" href="img/logo .png">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
    body{
        background-image: url("https://w.forfun.com/fetch/e5/e528d4597bd9fe6d7c993bdae0fd5ed9.jpeg");
    }
    .custom-button {
            background-color: #429fe6;
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
            left: 1150px;
            
        }
</style>
<body>
    <div style="background-color: #429fe6;">
        <h2 style="text-align: center; font-family: georgia;">REGISTRO DEL PRODUCTO NO CONFORME Y NO CONFORMIDADES</h2>
    </div>

    <div style="position: absolute; top: 40%; left: 50%; transform: translate(-50%, -50%); background-color: transparent; height: 50%; width: 90%; margin: 0, 30, 0, 0;" class="principal">
        <div class="form-group">
            <label style="font-family: georgia; font-size: 20px; " for="certificacion">Buscar por Certificación:</label>
            <select class="form-control" id="certificacion" onchange="filterByCertificacion()">
                <option style="width: 50px;" value="">Todas las certificaciones</option>
                <?php echo $options; ?>
            </select>
        </div>
        <br>
        <table class="table" id="tabla-registros">
            <thead>
                <tr>
                    <th style='font-family: Arial, sans-serif; font-weight: bold; font-size:25px; color:blue;'>PROCESO</th>
                    <th style='font-family: Arial, sans-serif; font-weight: bold; font-size:25px; color:blue;'>CERTIFICACION</th>
                    <th style='font-family: Arial, sans-serif; font-weight: bold; font-size:25px; color:blue;'>GRUPO</th>
                    <th style='font-family: Arial, sans-serif; font-weight: bold; font-size:25px; color:blue;'>REQUISITO</th>
                    <th style='font-family: Arial, sans-serif; font-weight: bold; font-size:25px; color:blue;'>DESCRIPCIÓN</th>
                    <th style='font-family: Arial, sans-serif; font-weight: bold; font-size:25px; color:blue;'>ORIGEN</th>
                    <th style='font-family: Arial, sans-serif; font-weight: bold; font-size:20px; color:blue;'>FECHA DEL HALLAZGO</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Mostrar los registros obtenidos en la tabla
                if ($resultado->num_rows > 0) {
                    while ($row = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td style='font-family: Arial, sans-serif; font-weight: bold;'>" . $row["proceso"] . "</td>";
                        echo "<td style='font-family: Arial, sans-serif; font-weight: bold;'>" . $row["certificacion"] . "</td>";
                        echo "<td style='font-family: Arial, sans-serif; font-weight: bold;'>" . $row["grupo"] . "</td>";
                        echo "<td style='font-family: Arial, sans-serif; font-weight: bold;'>" . $row["requisito"] . "</td>";
                        echo "<td style='font-family: Arial, sans-serif; font-weight: bold;'>" . $row["descripcion"] . "</td>";
                        echo "<td style='font-family: Arial, sans-serif; font-weight: bold;'>" . $row["origen"] . "</td>";
                        echo "<td style='font-family: Arial, sans-serif; font-weight: bold;'>" . $row["fecha_hallazgo"] . "</td>";
                        echo "</tr>";
                    }
                
            
                } else {
                    echo "<tr><td colspan='7'>No se encontraron registros</td></tr>";
                }
                ?>
            
            </tbody>
        </table>
    </div>
    <div class="custom-button-container">
        <button style="background-color: blue;" class="custom-button" onclick="goToInicio()">AC/AP</button>
    </div>

    <script>
        function filterByCertificacion() {
            var certificacion = document.getElementById("certificacion").value;
            var table = document.getElementById("tabla-registros");
            var rows = table.getElementsByTagName("tbody")[0].getElementsByTagName("tr");

            for (var i = 0; i < rows.length; i++) {
                var certificacionCell = rows[i].getElementsByTagName("td")[1];
                if (certificacion === "" || certificacionCell.textContent.trim() === certificacion) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
        }
        function goToInicio() {
            window.location.href = "carpeta5-1.php"; // Reemplaza "index.html" con la URL de tu página de inicio
        }
    </script>

</body>

</html>
