<!DOCTYPE html>
<html>

<head>
    <title>Registros Guardados</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    
</head>

<body>
    <div class="container">

        <div class="form-group">
            <label for="certificacion">Buscar por Certificación:</label>
            <select class="form-control" id="certificacion" onchange="filterByCertification()">
                <option value="">Todas las certificaciones</option>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "usuarios";

                // Crear conexión
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Verificar la conexión
                if ($conn->connect_error) {
                    die("Error en la conexión: " . $conn->connect_error);
                }

                // Consulta para obtener las certificaciones desde una tabla y columna específicas
                $consultaCertificaciones = "SELECT certificacion FROM inicio2";
                $resultadoCertificaciones = $conn->query($consultaCertificaciones);

                // Verificar si se obtuvieron resultados
                if ($resultadoCertificaciones->num_rows > 0) {
                    // Generar las opciones del select con los datos obtenidos
                    while ($row = $resultadoCertificaciones->fetch_assoc()) {
                        echo "<option value='" . $row["certificacion"] . "'>" . $row["certificacion"] . "</option>";
                    }
                } else {
                    echo "<option value=''>No se encontraron certificaciones</option>";
                }

                // Cerrar la conexión
                $conn->close();
                ?>
            </select>
        </div>

        <table class="table" id="registrosTable">
            <thead>
                
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "usuarios";

                // Crear conexión
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Verificar la conexión
                if ($conn->connect_error) {
                    die("Error en la conexión: " . $conn->connect_error);
                }

                // Obtener el valor seleccionado del combobox
                $certificacion = isset($_POST['certificacion']) ? $_POST['certificacion'] : '';

                // Consulta para obtener los registros filtrados por certificación
                $consultaRegistros = "SELECT * FROM inicio2";
                if (!empty($certificacion)) {
                    $consultaRegistros .= " WHERE certificacion = '$certificacion'";
                }
                $resultadoRegistros = $conn->query($consultaRegistros);

                // Verificar si se obtuvieron resultados
                if ($resultadoRegistros->num_rows > 0) {
                    // Recorrer los registros y mostrarlos en la tabla
                    while ($row = $resultadoRegistros->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["proceso"] . "</td>";
                        echo "<td>" . $row["certificacion"] . "</td>";
                        echo "<td>" . $row["grupo"] . "</td>";
                        echo "<td>" . $row["requisito"] . "</td>";
                        echo "<td>" . $row["descripcion"] . "</td>";
                        echo "<td>" . $row["origen"] . "</td>";
                        echo "<td>" . $row["fecha_hallazgo"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No se encontraron registros.</td></tr>";
                }

                // Cerrar la conexión
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function filterByCertification() {
            var certificacion = document.getElementById('certificacion').value;
            $.ajax({
                url: "hallazgo6.php",
                type: "POST",
                data: {
                    certificacion: certificacion
                },
                success: function(response) {
                    $('#registrosTable tbody').html(response);
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        }
    </script>
</body>

</html>