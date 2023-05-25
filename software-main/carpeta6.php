<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>REPORTE DE PRODUCTO NO CONFORME/ NO CONFORMIDADES</title>
    <!-- Incluimos los estilos de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Incluimos los estilos de DatePicker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <style>
        .selected-row {
            background-color: blue;
            color: white;
        }

        body {
            background: linear-gradient(to bottom, skyblue, blue);
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            height: 100%;
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

        .container {
            margin-top: 30px;
            color: white;
        }

        @media (max-width: 767px) {
            .container {
                margin-top: 10px;
            }
        }

    </style>
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

                // Construir la consulta SQL para obtener todos los registros
                $consulta = "SELECT * FROM inicio1";
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

                        // Agregar el atributo data-id con el valor del ID del registro
                        echo " data-id='" . $row['id'] . "'";

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
                        echo "<td>";
                        echo "<input type='text' class='datepicker' name='fecha_limite' value='" . $row['fecha_limite'] . "' onchange='guardarFechaLimite(this.value)'>";
                        echo "</td>";
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

    <!-- Incluimos los scripts de Bootstrap y DatePicker -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <script>
        function abrirFormulario(url) {
            window.location.href = url;
        }

        function eliminarRegistros() {
            // Obtener la fila seleccionada
            var selectedRow = document.querySelector('tr.selected-row');

            if (selectedRow) {
                // Obtener el ID del registro desde el atributo data-id
                var id = selectedRow.getAttribute('data-id');

                // Hacer la solicitud de eliminación a través de AJAX o fetch
                // Aquí se muestra un ejemplo usando fetch

                // URL del script PHP para eliminar el registro
                var deleteUrl = 'eliminar_registro.php';

                // Datos a enviar en la solicitud de eliminación
                var formData = new FormData();
                formData.append('id', id);

                // Opciones de la solicitud fetch
                var options = {
                    method: 'POST',
                    body: formData
                };

                // Realizar la solicitud fetch
                fetch(deleteUrl, options)
                    .then(function (response) {
                        if (response.ok) {
                            // Eliminación exitosa, recargar la página para ver los cambios
                            window.location.reload();
                        } else {
                            // Error en la eliminación
                            alert('Error al eliminar el registro.');
                        }
                    })
                    .catch(function (error) {
                        // Error en la solicitud fetch
                        alert('Error en la solicitud de eliminación: ' + error.message);
                    });
            } else {
                alert("No se ha seleccionado ninguna fila para eliminar.");
            }
        }

        function actualizarRegistros() {
            // Obtener el valor de id de la fila seleccionada
            var selectedRow = document.querySelector('tr.selected-row');
            var idField = document.getElementById('idField');
            if (selectedRow && idField) {
                var id = selectedRow.getAttribute('data-id');
                idField.value = id;
                document.getElementById('updateForm').submit();
            } else {
                alert("No se ha seleccionado ninguna fila para actualizar.");
            }
        }

        // Función para seleccionar una fila al hacer clic en ella
        document.addEventListener('DOMContentLoaded', function () {
            var table = document.querySelector('table');
            table.addEventListener('click', function (event) {
                var target = event.target;
                var row = target.closest('tr');

                if (row) {
                    // Quitar la selección de la fila anteriormente seleccionada
                    var selectedRow = document.querySelector('tr.selected-row');
                    if (selectedRow) {
                        selectedRow.classList.remove('selected-row');
                    }

                    // Seleccionar la nueva fila
                    row.classList.add('selected-row');
                }
            });
        });

        // Función para guardar la fecha límite actualizada
        function guardarFechaLimite(fechaLimite) {
            var selectedRow = document.querySelector('tr.selected-row');
            if (selectedRow) {
                var id = selectedRow.getAttribute('data-id');
                var formData = new FormData();
                formData.append('id', id);
                formData.append('fecha_limite', fechaLimite);

                // URL del script PHP para actualizar la fecha límite
                var updateUrl = 'actualizar_fecha_limite.php';

                // Opciones de la solicitud fetch
                var options = {
                    method: 'POST',
                    body: formData
                };

                // Realizar la solicitud fetch
                fetch(updateUrl, options)
                    .then(function (response) {
                        if (response.ok) {
                            // Actualización exitosa, recargar la página para ver los cambios
                            window.location.reload();
                        } else {
                            // Error en la actualización
                            alert('Error al actualizar la fecha límite.');
                        }
                    })
                    .catch(function (error) {
                        // Error en la solicitud fetch
                        alert('Error en la solicitud de actualización: ' + error.message);
                    });
            } else {
                alert("No se ha seleccionado ninguna fila para actualizar.");
            }
        }

        // Inicializar DatePicker
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true
        });

        // Función para animar el fondo de la página
        function animateBackground() {
            var colors = ['#FF5733', '#FFC300', '#DAF7A6', '#FF00BF', '#FF0000'];
            var currentIndex = 0;
            var body = document.querySelector('body');

            setInterval(function () {
                body.style.backgroundColor = colors[currentIndex];
                currentIndex = (currentIndex + 1) % colors.length;
            }, 3000);
        }

        animateBackground();
    </script>
</body>

</html>
