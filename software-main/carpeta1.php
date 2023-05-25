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
    function goback() {
        window.location.href = "http://localhost.bienvenida.php";
    }
</script>
<style>
    body {
        background-color: #429fe6;
        background-image: linear-gradient(45deg, #4EACF5, #4C6BFC, #27D9F5);
        background-size: 200% 200%;
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
        body {
            background-color: #429fe6;
        }

        .form-group,
        .form1 {
            display: inline-block;
            vertical-align: top;
            
        }


        .form-container {
            border: 8px solid;
            transition: border-color 0.5s ease;
        }

        .form-container.color-1 {
            border-color: red;
        }

        .form-container.color-2 {
            border-color: blue;
        }

        .form-container.color-3 {
            border-color: green;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var formContainer = document.querySelector(".form-container");
            var colors = ["color-1", "color-2", "color-3"];
            var currentIndex = 0;

            setInterval(function () {
                formContainer.classList.remove(colors[currentIndex]);
                currentIndex = (currentIndex + 1) % colors.length;
                formContainer.classList.add(colors[currentIndex]);
            }, 3000);
        });
    </script>
</style>

<body>

    <div style="background-color: #429fe6;">
    
        <h2 style="text-align: center; font-family: georgia; ">REGISTRO DEL PODUCTO NO CONFORME Y NO CONFORMIDADES</h2>


    </div>
    <!-- Mensaje de éxito -->
    <?php if (isset($mensajeExito)): ?>
        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: yellow; color: black; padding: 30px; z-index: 9999;"
            class="alert alert-success mt-3" id="mensaje-exito" role="alert">
            <?php echo $mensajeExito; ?>
        </div>
    <?php endif; ?>

    <div class="formulario">


        <div style="position: absolute; top: 30%; left: 50%; transform: translate(-50%, -50%); background-color: #C4C4C4; height: 40%; width: 80%; margin: 0, 30, 0, 0; "
            class="principal">


            <form class="cuerpo" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label style="font-family: georgia; font-size: 20px;">SELECIONE EL ESTADO</label>
                <div class="form-group" style="display: flex; align-items: center; justify-content: center; ">

                    <div style="width: 400px;" class="form-check">
                        <input class="form-check-input" type="radio" name="estado" id="no-conforme" value="no-conforme">
                        <label class="form-check-label" for="no-conforme">No conforme</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="estado" id="conforme" value="conforme">
                        <label class="form-check-label" for="conforme">Conforme</label>
                    </div>
                </div>
                <div class="form-group">
                    <label style="font-family: georgia; font-size: 20px;" for="tipo">SELECIONE EL TIPO</label>
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
                <br>
                <div style="position: absolute; top: 170%; left: 50%; transform: translate(-50%, -50%); background-color:#429fe6; height: 100%; width: 100%; margin: 0, 30, 0, 0; "
                    class="principal1">
                    <div class="form-group">
                        <label style="font-family: georgia; font-size: 20px;" for="descripcion">DESCRIPCION DEL PRODUCTO
                            NO CONFORME/NO CONFORMADO</label>
                        <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                    </div>
                    <br>
                    <div class="form-group">
                        <label style="font-family: georgia; font-size: 20px;" for="accion-inmediata">ACCION
                            INMEDIATA</label>
                        <input class="form-control" type="text" id="accion-inmediata" name="accion-inmediata">
                    </div>
                    <div class="form-group">
                        <label style="font-family: georgia; font-size: 20px;" for="responsable"
                            for="responsable">SELECIONE EL RESPONSABLE</label>
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
                        <label style="font-family: georgia; font-size: 20px;" for="fecha-emision">FECHA DE EMISION
                        </label>
                        <input class="form-control" type="date" id="fecha-emision" name="fecha-emision">
                    </div>
                    <div class="form-group">
                        <label style="font-family: georgia; font-size: 20px;" for="alerta">ALERTA</label>
                        <input placeholder="DIAS ANTES" class="form-control" type="text" id="alerta" name="alerta">
                    </div>
                    <div class="form-group">
                        <label style="font-family: georgia; font-size: 20px;" for="fecha-limite">FECHA LIMITE</label>
                        <input class="form-control" type="date" id="fecha-limite" name="fecha-limite">
                    </div>
                    <div style="text-align: right;">
                        <button style="float: right;" class="btn btn-primary" class="btn btn-primary">REGISTRAR</button>
                    </div>

                </div>
            </form>

        </div>
    </div>


</body>
<div style="position: absolute; top: 980px; left: 140px;">
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