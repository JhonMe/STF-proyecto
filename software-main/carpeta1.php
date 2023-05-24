<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usuarios";

$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar la conexión
if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $tipos = isset($_POST['tipo']) ? $_POST['tipo'] : '';
    $proceso = isset($_POST['proceso']) ? $_POST['proceso'] : '';
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
    $accion_inmediata = isset($_POST['accion-inmediata']) ? $_POST['accion-inmediata'] : '';
    $responsable = isset($_POST['responsable']) ? $_POST['responsable'] : '';
    $fecha_emision = isset($_POST['fecha-emision']) ? $_POST['fecha-emision'] : '';
    $alerta = isset($_POST['alerta']) ? $_POST['alerta'] : '';
    $fecha_limite = isset($_POST['fecha-limite']) ? $_POST['fecha-limite'] : '';
    $estado = isset($_POST['estado']) ? $_POST['estado'] : '';

    $sql = "INSERT INTO inicio1 (tipo, proceso, descripcion, accion_inmediata, responsable, fecha_emision, alerta, fecha_limite, estado) 
    VALUES ('$tipos', '$proceso', '$descripcion', '$accion_inmediata', '$responsable', '$fecha_emision', '$alerta', '$fecha_limite', '$estado')";

    if ($conn->query($sql) === TRUE) {
        $mensajeExito = "¡LOS DATOS CORRECTAMENTE REGISTRADOS!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Consulta para obtener los datos de la tabla "tipo"
$consultaTipo = "SELECT descripcion FROM tipo";
$resultadoTipo = $conn->query($consultaTipo);

// Consulta para obtener los datos de la tabla "proceso"
$consultaProceso = "SELECT descripcion FROM proceso";
$resultadoProceso = $conn->query($consultaProceso);

// Consulta para obtener los datos de la tabla "responsable"
$consultaResponsable = "SELECT nombre FROM responsable";
$resultadoResponsable = $conn->query($consultaResponsable);

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Menú de Navegación con Bootstrap</title>
    <!-- Incluimos los estilos de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<script>
    $(document).ready(function () {
        // Cargar opciones para los select al cargar la página
        cargarOpciones('tipo', 'cargar_tipos.php');
        cargarOpciones('proceso', 'cargar_procesos.php');
        cargarOpciones('responsable', 'cargar_responsables.php');

        // Autocompletar campos al seleccionar una opción
        $('#tipo').change(function () {
            var tipoId = $(this).val();
            if (tipoId !== '') {
                autocompletarCampos(tipoId, 'tipo', 'cargar_datos_tipo.php');
            }
        });

        $('#proceso').change(function () {
            var procesoId = $(this).val();
            if (procesoId !== '') {
                autocompletarCampos(procesoId, 'proceso', 'cargar_datos_proceso.php');
            }
        });

        $('#responsable').change(function () {
            var responsableId = $(this).val();
            if (responsableId !== '') {
                autocompletarCampos(responsableId, 'responsable', 'cargar_datos_responsable.php');
            }
        });
    });

    function cargarOpciones(elementId, url) {
        $.ajax({
            url: url,
            type: 'GET',
            success: function (response) {
                $('#' + elementId).html(response);
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }

    function autocompletarCampos(itemId, itemType, url) {
        $.ajax({
            url: url,
            type: 'GET',
            data: {
                id: itemId,
                type: itemType
            },
            dataType: 'json',
            success: function (response) {
                $('#descripcion').val(response.descripcion);
                $('#accion-inmediata').val(response.accion_inmediata);
                $('#estado').val(response.estado);
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }

    function goback() {
        window.history.back();
    }
</script>
<style>
    body {
        background-color: #f0ebf2;
    }
</style>

<body>

    <div style="background-color: #429fe6;">
        <h2 style="text-align: center; color: white; padding: 20px;">FORMULARIO DE REGISTRO</h2>
    </div>

    <div class="container mt-5">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="tipo">Tipo:</label>
                <select class="form-control" id="tipo" name="tipo">
                    <?php
                    if ($resultadoTipo->num_rows > 0) {
                        while ($row = $resultadoTipo->fetch_assoc()) {
                            echo "<option value='" . $row['descripcion'] . "'>" . $row['descripcion'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="proceso">Proceso:</label>
                <select class="form-control" id="proceso" name="proceso">
                    <?php
                    if ($resultadoProceso->num_rows > 0) {
                        while ($row = $resultadoProceso->fetch_assoc()) {
                            echo "<option value='" . $row['descripcion'] . "'>" . $row['descripcion'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="accion-inmediata">Acción Inmediata:</label>
                <textarea class="form-control" id="accion-inmediata" name="accion-inmediata" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="responsable">Responsable:</label>
                <select class="form-control" id="responsable" name="responsable">
                    <?php
                    if ($resultadoResponsable->num_rows > 0) {
                        while ($row = $resultadoResponsable->fetch_assoc()) {
                            echo "<option value='" . $row['nombre'] . "'>" . $row['nombre'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="fecha-emision">Fecha de Emisión:</label>
                <input type="date" class="form-control" id="fecha-emision" name="fecha-emision">
            </div>
            <div class="form-group">
                <label for="alerta">Alerta:</label>
                <input type="text" class="form-control" id="alerta" name="alerta">
            </div>
            <div class="form-group">
                <label for="fecha-limite">Fecha Límite:</label>
                <input type="date" class="form-control" id="fecha-limite" name="fecha-limite">
            </div>
            <div class="form-group">
                <label for="estado">Estado:</label>
                <input type="text" class="form-control" id="estado" name="estado">
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
            <button type="button" class="btn btn-secondary" onclick="goback()">Volver</button>
        </form>
        <?php
        if (isset($mensajeExito)) {
            echo "<div class='alert alert-success mt-3'>" . $mensajeExito . "</div>";
        }
        if (isset($mensajeError)) {
            echo "<div class='alert alert-danger mt-3'>" . $mensajeError . "</div>";
        }
        ?>
    </div>

    <script>
        function goback() {
            window.history.back();
        }
    </script>
</body>

</html>
</code></pre>

