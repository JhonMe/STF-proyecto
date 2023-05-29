


<!DOCTYPE html>
<html>

<head>
    <title>Registro de Acción Correctiva / Acción Preventiva</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
</head>
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
        /* Estilos para el cuadro del formulario */
        .form-container {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
        }

        /* Estilos para los formularios */
        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .btn-primary,
        .btn-success {
            margin-top: 10px;
        }

        /* Estilos adicionales */
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
<body>
    <div style="background-color: #429fe6;">
        <h2 style="text-align: center; font-family: georgia; ">Registro de Acción Correctiva / Acción Preventiva</h2>
    </div>
    <div class="container">
        <form class="cuerpo" action="conexion5-1.php" method="post">
                 <div style="border: red;" >
                            <div  class="form-group">
                                <div style="display:flex;">
                                     <label for="codigoNCF">Código NCF:</label>
                                     <input style="width: 370px; margin-left:10px; background-color: blue; color:aliceblue;" name="codigoNCF" type="text" class="form-control" id="codigoNCF">
                                </div>
                               <div style="display:flex;">
                                   <label style="width: 100; margin-left:700px; margin-top:-40px;"  for="solicitud">N° Solicitud:</label>
                                   <input  name="solicitud" style="width: 700; margin-left:10px; margin-top:-35px; background-color: blue; color:aliceblue;" type="text" class="form-control" id="solicitud">
                                </div>
                            </div>
                            <div style="display:flex;">
                                    <div class="form-group">
                                        <label for="tipo">Tipo:</label>
                                        <br>

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
                                        // Consulta para obtener los datos de la tabla "proceso"
                                        $consultaProceso = "SELECT descripcion FROM tipo";
                                        $resultadoProceso = $conn->query($consultaProceso);

                                        // Verificar si se obtuvieron resultados
                                        if ($resultadoProceso->num_rows > 0) {
                                            // Crear el combo box con los datos obtenidos
                                            echo "<select name='tipo'>";
                                            while ($row = $resultadoProceso->fetch_assoc()) {
                                                echo "<option value='" . $row["descripcion"] . "'>" . $row["descripcion"] . "</option>";
                                            }
                                            echo "</select>";
                                        } else {
                                            echo "No se encontraron registros en la tabla 'tipo'.";
                                        }
                                        ?>
                                    </div>
                                    <div style="margin-left: 500px;" class="form-group">
                                        <label style="font-family: georgia; font-size: 20px;" for="proceso">SELECIONE EL PROCESO</label>
                                        <br>
                                        <?php
                                        // Consulta para obtener los datos de la tabla "proceso"
                                        $consultaProceso = "SELECT descripcion FROM proceso";
                                        $resultadoProceso = $conn->query($consultaProceso);

                                        // Verificar si se obtuvieron resultados
                                        if ($resultadoProceso->num_rows > 0) {
                                            // Crear el combo box con los datos obtenidos
                                            echo "<select name='proceso'>";
                                            while ($row = $resultadoProceso->fetch_assoc()) {
                                                echo "<option value='" . $row["descripcion"] . "'>" . $row["descripcion"] . "</option>";
                                            }
                                            echo "</select>";
                                        } else {
                                            echo "No se encontraron registros en la tabla 'proceso'.";
                                        }
                                        ?>
                                    </div>
                                    <div style="display:flex; margin-left:-1100px; margin-top:70px;">
                                            </div>
                                            <div class="form-group" style="margin-top:100px; margin-left:-40px;">
                                                <label for="descripcion">Descripción de la No Conformidad o Potencial No Conformidad:</label>
                                                <input type="text" style=" height: 100px;  background-color: blue; color:aliceblue;" class="form-control" name="descripcion" id="descripcion">
                                            </div>
                                            <div style="margin-left: 270px; margin-top:100px;"" class="form-group">
                                                <label for="conclusion">Conclusión de Análisis Causal:</label>
                                                <input type="text" style=" height: 70px;  background-color: blue; color:aliceblue;" class="form-control" name="conclusion" id="conclusion">
                                            </div>
                                    </div>
                 </div>
                   <div class="container" style="margin-top:30px;">
                     <div class="form-container">
                            <h3>Acciones Correctivas / Preventivas Propuestas (Plan de Acción)</h3>
                            <div class="form-group">
                                <label for="acciones">Acciones Correctivas / Preventivas:</label>
                                <input type="text" class="form-control" name="acciones" id="acciones">
                            </div>
                            <div class="form-group">
                                <label for="responsable">Responsable:</label>
                                <br>
                                <?php
                                // Consulta para obtener los datos de la tabla "proceso"
                                $consultaProceso = "SELECT nombre FROM responsable";
                                $resultadoProceso = $conn->query($consultaProceso);

                                // Verificar si se obtuvieron resultados
                                if ($resultadoProceso->num_rows > 0) {
                                    // Crear el combo box con los datos obtenidos
                                    echo "<select name='responsable'>";
                                    while ($row = $resultadoProceso->fetch_assoc()) {
                                        echo "<option value='" . $row["nombre"] . "'>" . $row["nombre"] . "</option>";
                                    }
                                    echo "</select>";
                                } else {
                                    echo "No se encontraron registros en la tabla 'responsable'.";
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="recursos">Recursos:</label>
                                <input name="recursos" type="text" class="form-control" id="recursos">
                            </div>
                            <div class="form-group">
                                <label>Tipo de Acción:</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tipoAccion" id="accionCorrectiva" value="AC">
                                    <label class="form-check-label" for="accionCorrectiva">Acciones Correctivas</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tipoAccion" id="accionPreventiva" value="AP">
                                    <label class="form-check-label" for="accionPreventiva">Acciones Preventivas</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="font-family: georgia; font-size: 20px;" for="fechaLimite">FECHA LIMITE</label>
                                <input class="form-control" type="date" id="fechaLimite" name="fechaLimite">
                            </div>
                     </div>
                </div>
        </form>
            <h3>Tabla de Acciones</h3>
            <table class="table">
            <thead>
                  <tr>
                        <th>Categoría</th>
                        <th>Acciones</th>
                        <th>Responsable</th>
                        <th>Recursos</th>
                        <th>Fecha</th>
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
                $consulta = "SELECT * FROM inicio6";
                $resultado = $conn->query($consulta);

                // Verificar si se obtuvieron resultados
                if ($resultado->num_rows > 0) {
                    // Mostrar los datos en la tabla
                    while ($row = $resultado->fetch_assoc()) {
                        echo "<tr";

                        // Determinar el color según el estado y la fecha límite
                        $fechaLimite = strtotime($row['fechaLimite']);
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
                        echo "<td>" . $row['categoria'] . "</td>";
                        echo "<td>" . $row['acciones'] . "</td>";
                        echo "<td>" . $row['responsable'] . "</td>";
                        echo "<td>" . $row['recursos'] . "</td>";
                        echo "<td>";
                        echo "<input type='text' class='datepicker' name='fechaLimite' value='" . $row['fechaLimite'] . "' onchange='guardarFechaLimite(this.value)'>";
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
    

           
            <div class="container" style="text-align: center; margin-top: 20px;">
                 <button type="submit" class="btn btn-primary">Guardar</button>
           </div>

            <button type="button" class="btn btn-success" id="agregar">Agregar</button>
            <button style="float: left; background-color: red" type="button" class="btn btn-success" id="salir"
                onclick="cerrarFormulario();">SALIR</button>
                <form action="carpeta5.php" method="POST" id="updateForm">
                       <input type="hidden" name="id" id="idField">
                 </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  <script>
                function cerrarFormulario() {
                window.close(); // Cierra la ventana actual del navegador
                window.location.href = "carpeta5.php"; // Redirige al usuario al menú principal
            }
            
            // Código JavaScript para ocultar el mensaje de éxito después de unos segundos
            $(document).ready(function () {
                // Ocultar el mensaje de éxito después de 3 segundos (3000 ms)
                setTimeout(function () {
                    $("#mensaje-exito").fadeOut("slow");
                }, 5000);
            });

             
        function abrirFormulario(url) {
            window.location.href = url;
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
                formData.append('fechaLimite', fechaLimite);

                // URL del script PHP para actualizar la fecha límite
                var updateUrl = 'actualizar_fecha_limite1.php';

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
