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

// Obtener los valores del formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
$proceso = isset($_POST['proceso']) ? $_POST['proceso'] : '';
$direccion = isset($_POST['proceso']) ? $_POST['proceso'] : '';
$parte = isset($_POST['parte']) ? $_POST['parte'] : '';
$seleccion = isset($_POST['seleccion']) ? $_POST['seleccion'] : '';
$externo = isset($_POST['externo']) ? $_POST['externo'] : '';
$cargo = isset($_POST['cargo']) ? $_POST['cargo'] : '';
$nombres = isset($_POST['nombres']) ? $_POST['nombres'] : '';
$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
$correo = isset($_POST['correo']) ? $_POST['correo'] : '';
$clasificacion = isset($_POST['clasificacion']) ? $_POST['clasificacion'] : '';
$comentario_descripcion = isset($_POST['comentario_decripcion']) ? $_POST['comentario_decripcion'] : '';

// Insertar los datos en la tabla
$sql = "INSERT INTO inicio3 (proceso, direccion, parte, seleccion, externo, cargo, nombres, telefono, correo, clasificacion, comentario_descripcion)
        VALUES ('$proceso', '$direccion', '$parte', '$seleccion', '$externo', '$cargo', '$nombres', '$telefono', '$correo', '$clasificacion', '$comentario_descripcion')";

if ($conn->query($sql) === TRUE) {
    $mensajeExito = "¡LOS DATOS CORECTAMENTE REGISTRADOS!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

// Cerrar la conexión
$conn->close();
?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Registro de Hallazgos</title>
</head>
<style>
    body {
        background-color: #f0ebf2;
    }
</style>

<body>

    <div style="background-color: #429fe6;">
        <h2 style="text-align: center; font-family: georgia">REGISTRO DE QUEJAS Y RECLAMOS</h2>
    </div>
    <!-- Mensaje de éxito -->
    <?php if (isset($mensajeExito)): ?>
            <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: yellow; color: black; padding: 30px; z-index: 9999;" class="alert alert-success mt-3" id="mensaje-exito" role="alert">
                <?php echo $mensajeExito; ?>
            </div>
        <?php endif; ?>

    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color:#429fe6; height: 85%; width: 80%; margin: 0, 30, 0, 0; "
        class="principal">

        <form class="cuerpo" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label style="font-family: georgia; font-size: 20px;" for="proceso" for="proceso">SELECIONE EL
                    PROCESO
                </label>
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
                <label style="font-family: georgia; font-size: 20px;" for="proceso" for="direccion">SELECIONE LA
                    DIRECCION/ COMISION DE RELACION
                </label>
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
                    $consultaProceso = "SELECT descripcion FROM direccion";
                    $resultadoProceso = $conn->query($consultaProceso);

                    // Verificar si se obtuvieron resultados
                    if ($resultadoProceso->num_rows > 0) {
                    // Crear el combo box con los datos obtenidos
                    echo "<select name='direccion'>";
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
                <label style="font-family: georgia; font-size: 20px;" for="proceso" for="parte">SOY PARTE DEL
                    PROCESO</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="parte" id="parte-1" value="si">
                    <label class="form-check-label" for="parte-1">
                        SI
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="parte" id="parte-2" value="no">
                    <label class="form-check-label" for="parte-2">
                        NO
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label style="font-family: georgia; font-size: 20px;" for="proceso" for="seleccion">SELECCION</label>
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
                    $consultaProceso = "SELECT descripcion FROM seleccion";
                    $resultadoProceso = $conn->query($consultaProceso);

                    // Verificar si se obtuvieron resultados
                    if ($resultadoProceso->num_rows > 0) {
                    // Crear el combo box con los datos obtenidos
                    echo "<select name='seleccion'>";
                        while ($row = $resultadoProceso->fetch_assoc()) {
                        echo "<option value='" . $row["descripcion"] . "'>" . $row["descripcion"] . "</option>";
                        }
                        echo "</select>";
                    } else {
                    echo "No se encontraron registros en la tabla 'seleccion'.";
                    }
                ?>
            </div>
            <div class="form-group">
                <label style="font-family: georgia; font-size: 20px;" for="proceso" for="externo">SOY EXTERNO</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="externo" id="externo-1" value="si">
                    <label class="form-check-label" for="externo-1">
                        SI
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="externo" id="externo-2" value="no">
                    <label class="form-check-label" for="externo-2">
                        NO
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label style="font-family: georgia; font-size: 20px;" for="cargo" for="cargo">CARGO</label>
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
                    $consultaProceso = "SELECT descripcion FROM cargo";
                    $resultadoProceso = $conn->query($consultaProceso);

                    // Verificar si se obtuvieron resultados
                    if ($resultadoProceso->num_rows > 0) {
                    // Crear el combo box con los datos obtenidos
                    echo "<select name='seleccion1'>";
                        while ($row = $resultadoProceso->fetch_assoc()) {
                        echo "<option value='" . $row["descripcion"] . "'>" . $row["descripcion"] . "</option>";
                        }
                        echo "</select>";
                    } else {
                    echo "No se encontraron registros en la tabla 'cargo'.";
                    }
                ?>
            </div>

            <div
                style="position: absolute; top: 150%; left: 50%; transform: translate(-50%, -50%); background-color:#e4d6c7; height: 95%; width: 90%; margin: 0, 30, 0, 0; ">


                <h4>DETALLE INFORMATIVO</h4>
                <div class="form-group">
                    <label style="font-family: georgia; font-size: 20px;" for="proceso" for="nombres">NOMBRES Y
                        APELLIDOS(*Opcional)</label>
                    <input type="text" class="form-control" id="nombres" name="nombres"
                        placeholder="Ingrese sus nombres y apellidos">
                </div>
                <div class="form-group">
                    <label style="font-family: georgia; font-size: 20px;" for="proceso" for="telefono">N°
                        TELEFÓNICO(*Opcional)</label>
                    <input type="text" class="form-control" id="telefono" name="telefono"
                        placeholder="Ingrese su número telefónico">
                </div>
                <div class="form-group">
                    <label style="font-family: georgia; font-size: 20px;" for="proceso" for="correo">CORREO
                        ELECTRÓNICO(*Opcional)</label>
                    <input type="email" class="form-control" id="correo" name="correo"
                        placeholder="Ingrese su correo electrónico">
                </div>
                <div class="form-group">
                    <h5>CLASIFICACIÓN</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="clasificacion" id="quejas" value="quejas">
                        <label style="font-family: georgia; font-size: 20px;" class="form-check-label" for="quejas">
                            QUEJAS
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="clasificacion" id="reclamos" value="reclamos">
                        <label style="font-family: georgia; font-size: 20px;" class="form-check-label" for="reclamos">
                            RECLAMOS
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="clasificacion" id="sugerencias"
                            value="sugerencias">
                        <label style="font-family: georgia; font-size: 20px;" class="form-check-label"
                            for="sugerencias">
                            SUGERENCIAS
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="clasificacion" id="felicitaciones"
                            value="felicitaciones">
                        <label style="font-family: georgia; font-size: 20px;" class="form-check-label"
                            for="felicitaciones">
                            FELICITACIONES
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label style="font-family: georgia; font-size: 20px;" for="proceso" for="comentario_descripcion">DESCRIPCION DEL
                        COMENTARIO</label>
                    <textarea class="form-control" id="comentario_descripcion" name="comentario_descripcion" rows="3"></textarea>
                </div>
                <div style="text-align: right;">
                <button style="position: absolute; top:660px; left: 850px; " type="submit" class="btn btn-primary">REGISTRAR</button>
                </div>

            </div>

        </form>
    </div>

</body>
<div style="position: absolute; top:1280px; left: 180px;">
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