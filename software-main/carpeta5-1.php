<!DOCTYPE html>
<html>

<head>
    <title>Registro de Acción Correctiva / Acción Preventiva</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div style="background-color: #429fe6;">
        <h2 style="text-align: center; font-family: georgia; ">Registro de Acción Correctiva / Acción Preventiva</h2>


    </div>
    <div class="container">
        <form class="cuerpo" action="conexion5-1.php" method="post">
            <div class="form-group">
                <label for="codigoNCF">Código NCF:</label>
                <input name="codigoNCF" type="text" class="form-control" id="codigoNCF">
            </div>
            <div class="form-group">
                <label for="solicitud">N° Solicitud:</label>
                <input name="solicitud" type="text" class="form-control" id="solicitud">
            </div>
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
            <div class="form-group">
                <label style="font-family: georgia; font-size: 20px;" for="proceso" for="proceso">SELECIONE EL
                    PROCESO</label>
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
            <div class="form-group">
                <label for="descripcion">Descripción de la No Conformidad o Potencial No Conformidad:</label>
                <input type="text" class="form-control" name="descripcion" id="descripcion">
            </div>
            <div class="form-group">
                <label for="conclusion">Conclusión de Análisis Causal:</label>
                <input type="text" class="form-control" name="conclusion" id="conclusion">
            </div>
            <h3>Acciones Correctivas / Preventivas Propuestas (Plan de Acción)</h3>
            <div class="form-group">
                <label for="acciones">Acciones Correctivas / Preventivas:</label>
                <input type="text" class="form-control" name="acciones" id="acciones">
            </div>
            <div class="form-group">
                <label for="responsable">Responsable:</label>
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
                $consultaProceso = "SELECT nombres FROM responsable";
                $resultadoProceso = $conn->query($consultaProceso);

                // Verificar si se obtuvieron resultados
                if ($resultadoProceso->num_rows > 0) {
                    // Crear el combo box con los datos obtenidos
                    echo "<select name='responsable'>";
                    while ($row = $resultadoProceso->fetch_assoc()) {
                        echo "<option value='" . $row["nombres"] . "'>" . $row["nombres"] . "</option>";
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
                    // Conecta a la base de datos
                    $conn = mysqli_connect('localhost', 'root', '', 'usuarios');

                    // Verifica la conexión
                    if (!$conn) {
                        die("Error al conectar a la base de datos: " . mysqli_connect_error());
                    }

                    // Consulta los cargos
                    $query = "SELECT * FROM inicio6";
                    $result = mysqli_query($conn, $query);

                    // Itera sobre los registros y muestra los datos en la tabla
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['categoria'] . "</td>";
                        echo "<td>" . $row['acciones'] . "</td>";
                        echo "<td>" . $row['responsable'] . "</td>";
                        echo "<td>" . $row['recursos'] . "</td>";
                        echo "<td>" . $row['fechaLimite'] . "</td>";
                        echo "</tr>";

                    }

                    // Cierra la conexión a la base de datos
                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Registrar</button>
            <button type="button" class="btn btn-success" id="agregar">Agregar</button>
            <button type="button" class="btn btn-danger" id="salir">Salir</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>