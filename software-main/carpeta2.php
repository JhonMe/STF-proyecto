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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $proceso = $_POST['proceso'];
    $certificacion = $_POST['certificacion'];
    $grupo = $_POST['grupo'];
    $requisito = $_POST['requisito'];
    $descripcion = $_POST['descripcion'];
    $origen = $_POST['origen'];
    $fecha_hallazgo = $_POST['fecha-hallazgo'];

    $sql = "INSERT INTO inicio2 (proceso, certificacion, grupo, requisito, descripcion, origen, fecha_hallazgo) VALUES ('$proceso', '$certificacion', '$grupo', '$requisito', '$descripcion', '$origen', '$fecha_hallazgo')";

    if ($conn->query($sql) === TRUE) {
        $mensajeExito = "¡LOS DATOS CORECTAMENTE REGISTRADOS!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <!-- Agregar los enlaces a las librerías de jQuery y Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div style="background-color: #429fe6;">
        <h2 style="text-align: center; font-family: georgia; ">REGISTRO DEL PODUCTO NO CONFORME Y NO CONFORMIDADES</h2>

    </div>
        <!-- Mensaje de éxito -->
        <?php if (isset($mensajeExito)): ?>
            <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: yellow; color: black; padding: 30px; z-index: 9999;" class="alert alert-success mt-3" id="mensaje-exito" role="alert">
                <?php echo $mensajeExito; ?>
            </div>
        <?php endif; ?>

    <div style="position: absolute; top: 40%; left: 50%; transform: translate(-50%, -50%); background-color:#429fe6; height: 50%; width: 80%; margin: 0, 30, 0, 0; "
        class="principal">

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label style="font-family: georgia; font-size: 20px;" for="proceso">PROCESO</label>
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
                <label style="font-family: georgia; font-size: 20px;" for="certificacion">CERTIFICACION</label>
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
                $consultaProceso = "SELECT descripcion FROM certificacion";
                $resultadoProceso = $conn->query($consultaProceso);

                // Verificar si se obtuvieron resultados
                if ($resultadoProceso->num_rows > 0) {
                    // Crear el combo box con los datos obtenidos
                    echo "<select name='certificacion'>";
                    while ($row = $resultadoProceso->fetch_assoc()) {
                        echo "<option value='" . $row["descripcion"] . "'>" . $row["descripcion"] . "</option>";
                    }
                    echo "</select>";
                } else {
                    echo "No se encontraron registros en la tabla 'certificacion'.";
                }
                ?>
            </div>
            <div class="form-group">
                <label style="font-family: georgia; font-size: 20px;" for="grupo">GRUPO</label>
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
                // Consulta para obtener los datos de la tabla "grupo"
                $consultaGrupo = "SELECT descripcion FROM grupo";
                $resultadoGrupo = $conn->query($consultaGrupo);

                // Verificar si se obtuvieron resultados
                if ($resultadoGrupo->num_rows > 0) {
                    // Crear el combo box con los datos obtenidos
                    echo "<select name='grupo'>";
                    while ($row = $resultadoGrupo->fetch_assoc()) {
                        echo "<option value='" . $row["descripcion"] . "'>" . $row["descripcion"] . "</option>";
                    }
                    echo "</select>";
                } else {
                    echo "No se encontraron registros en la tabla 'grupo'.";
                }
                ?>
            </div>
            <div class="form-group">
                <label style="font-family: georgia; font-size: 20px;" for="requisito">REQUISITO</label>
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
                $consultaProceso = "SELECT descripcion FROM requisito";
                $resultadoProceso = $conn->query($consultaProceso);

                // Verificar si se obtuvieron resultados
                if ($resultadoProceso->num_rows > 0) {
                    // Crear el combo box con los datos obtenidos
                    echo "<select name='requisito'>";
                    while ($row = $resultadoProceso->fetch_assoc()) {
                        echo "<option value='" . $row["descripcion"] . "'>" . $row["descripcion"] . "</option>";
                    }
                    echo "</select>";
                } else {
                    echo "No se encontraron registros en la tabla 'certificacion'.";
                }
                ?>
            </div>
            <br>
            <div class="form-group">
                <label style="font-family: georgia; font-size: 20px;" for="descripcion">DESCRIPCIÓN</label>
                <br>
                <textarea class="form-control" name="descripcion" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label style="font-family: georgia; font-size: 20px;" for="origen">ORIGEN</label>
                <br>
                <input type="text" class="form-control" name="origen" required>
            </div>
            <div class="form-group">
                <label style="font-family: georgia; font-size: 20px;" for="fecha-hallazgo">FECHA DEL
                    HALLAZGO</label>
                <br>
                <input type="date" class="form-control" name="fecha-hallazgo" required>
            </div>
            <button style="position: absolute; top:660px; left: 980px; " type="submit" class="btn btn-primary">REGISTRAR</button>
        </form>

    
    </div>

</body>
<div style="position: absolute; top:760px; left: 140px;">
    <button style="float: left; background-color: red" class="btn btn-primary"
        onclick="cerrarFormulario();">SALIR</button>
</div>


<script>
    function cerrarFormulario() {
        window.close(); // Cierra la ventana actual del navegador
        window.location.href = "bienvenida.php"; // Redirige al usuario al menú principal
    }

    // Código JavaScript para ocultar el mensaje de éxito después de unos segundos
    $(document).ready(function () {
        // Ocultar el mensaje de éxito después de 3 segundos (3000 ms)
        setTimeout(function () {
            $("#mensaje-exito").fadeOut("slow");
        }, 5000);
    });
</script>

</html>