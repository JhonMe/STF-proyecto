<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>REPORTE DE PRODUCTO NO CONFORME/ NO CONFORMIDADES</title>
    <!-- Incluimos los estilos de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2 style="text-align: center; font-family: georgia;">Tabla de Datos</h2>

        <form action="carpeta1.php" method="POST" id="updateForm">
            <input type="hidden" name="id" id="idField">
        </form>

        <!-- Botón SAPC's y SACP's -->
        <button class="btn btn-primary" onclick="abrirFormulario('carpeta5-1.php')">AC/AP</button>
        <!-- Botón Eliminar -->
        <button class="btn btn-danger" onclick="eliminarRegistros()">Eliminar</button>
        <!-- Botón Actualizar -->
        <button class="btn btn-primary" onclick="actualizarRegistros()">Actualizar</button>

        <table class="table">
            <thead>
                <tr>
                    <th>Estado</th>
                    <th>Tipo</th>
                    <th>Proceso</th>
                    <th>Descripción</th>
                    <th>Acción Inmediata</th>
                    <th>Responsable</th>
                    <th>Fecha de Emisión</th>
                    <th>Alerta</th>
                    <th>Fecha Límite</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Configuración de la base de datos
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

                // Obtener la fecha actual
                $fechaActual = date('Y-m-d');

                // Construir la consulta SQL con la condición de fecha
                $consulta = "SELECT * FROM inicio1 WHERE fecha_emision >= '$fechaActual'";
                $resultado = $conn->query($consulta);

                // Verificar si se obtuvieron resultados
                if ($resultado->num_rows > 0) {
                    // Mostrar los datos en la tabla
                    while ($row = $resultado->fetch_assoc()) {
                        echo "<tr";

                        // Determinar el color según el estado y la fecha límite
                        $fechaLimite = strtotime($row['fecha_limite']);
                        $hoy = strtotime(date('Y-m-d'));
                        if ($fechaLimite < $hoy) {
                            echo " style='background-color: red;'";
                        } elseif ($fechaLimite - $hoy <= 259200) { // Menos de 3 días (259200 segundos)
                            echo " style='background-color: yellow;'";
                        } else {
                            echo " style='background-color: green;'";
                        }

                        echo ">";

                        // Imprimir las columnas de la fila
                        echo "<td>" . $row['estado'] . "</td>";
                        echo "<td>" . $row['tipo'] . "</td>";
                        echo "<td>" . $row['proceso'] . "</td>";
                        echo "<td>" . $row['descripcion'] . "</td>";
                        echo "<td>" . $row['accion_inmediata'] . "</td>";
                        echo "<td>" . $row['responsable'] . "</td>";
                        echo "<td>" . $row['fecha_emision'] . "</td>";
                        echo "<td>" . $row['alerta'] . "</td>";
                        echo "<td>" . $row['fecha_limite'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>No se encontraron registros</td></tr>";
                }
                // Cerrar la conexión a la base de datos
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <script>
        function abrirFormulario(url) {
            window.location.href = url;
        }

        function eliminarRegistros() {
            // Lógica para eliminar registros
            alert("Funcionalidad de eliminación no implementada");
        }

        function actualizarRegistros() {
            // Obtener el valor de id de la fila seleccionada
            var selectedRow = document.querySelector('tr[style="background-color: green;"]');
            var idField = document.getElementById('idField');
            if (selectedRow && idField) {
                var id = selectedRow.querySelector('td:first-child').textContent;
                idField.value = id;
                document.getElementById('updateForm').submit();
            } else {
                alert("No se ha seleccionado ninguna fila para actualizar.");
            }
        }
    </script>
</body>

</html>
