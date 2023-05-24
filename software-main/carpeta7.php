<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>CONTROL DE ACCIONES CORECTIVAS Y PREVENTIVAS</title>
</head>

<body>
    <div style="background-color: #429fe6;">
        <h2 style="text-align: center; font-family: georgia">CONTROL DE ACCIONES CORECTIVAS Y PREVENTIVAS</h2>
    </div>
    <!-- Tabla para visualizar datos registrados -->
    <div
        style="position: absolute; top: 20%; left: 50%; transform: translate(-50%, -50%); background-color:#429fe6; height: 10%; width: 80%; margin: 0, 30, 0, 0; ">

        <div style="margin-top: 20px; margin-left: 20px;">
            <h4>Datos Registrados</h4>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th>Proceso</th>
                        <th>Dirección </th>
                        <th>Parte del Proceso</th>
                        <th>Selección</th>
                        <th>Nombres</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Aquí se mostrarán los datos registrados desde el formulario -->
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

                    // Consulta para obtener los datos registrados
                    $consultaDatos = "SELECT proceso, direccion, cargo, seleccion, nombres, telefono, correo FROM inicio3";
                    $result = $conn->query($consultaDatos);

                    if ($result->num_rows > 0) {
                        // Mostrar los datos en la tabla
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['proceso'] . "</td>";
                            echo "<td>" . $row['direccion'] . "</td>";
                            echo "<td>" . $row['cargo'] . "</td>";
                            echo "<td>" . $row['seleccion'] . "</td>";
                            echo "<td>" . $row['nombres'] . "</td>";
                            echo "<td>" . $row['telefono'] . "</td>";
                            echo "<td>" . $row['correo'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No se encontraron datos registrados</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
            <div style="text-align: right;">
                <button style="float: right;" class="btn btn-primary" class="btn btn-primary">CIERRE</button>
            </div>
            <div style="text-align: left;">
                <button style="float: left; background-color: red" class="btn btn-primary"
                    onclick="goBack();">NCF</button>
            </div>
        </div>
    </div>
    

    <!-- Scripts de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Script para volver atrás -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function filterByCertification() {
            var certificacion = document.getElementById('certificacion').value;
            $.ajax({
                url: "carpeta4.php",
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