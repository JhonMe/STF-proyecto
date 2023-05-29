<?php
// Establecer la conexión con la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usuarios";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// ...

// ...
$conn->set_charset("utf8"); // Establecer la codificación de caracteres
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["empleado"]) && isset($_POST["cargo"]) && isset($_POST["proceso"])) {
        // Crear un nuevo empleado
        $empleado = isset($_POST['empleado']) ? $_POST['empleado'] : '';
        $cargo = isset($_POST['cargo']) ? $_POST['cargo'] : '';
        $proceso = isset($_POST['proceso']) ? $_POST['proceso'] : '';

        $query = "INSERT INTO tabla3 (empleado, cargo, proceso) 
        VALUES (?, ?, ?)";

        $stmt = $conn->prepare($query);
        if (!$stmt) {
            echo "Error al preparar la consulta: " . $conn->error;
            exit();
        }
        $stmt->bind_param("sss", $empleado, $cargo, $proceso);

        if ($stmt->execute()) {
            header("Location: tabla3.php");
            exit();
        } else {
            echo "Error al agregar el empleado: " . $stmt->error;
        }
    } elseif (isset($_POST["edit_id"]) && isset($_POST["edit_empleado"]) && isset($_POST["edit_cargo"]) && isset($_POST["edit_proceso"])) {
        // Actualizar un empleado existente
        $id = $_POST["edit_id"];
        $empleado = $_POST["edit_empleado"];
        $cargo = $_POST["edit_cargo"];
        $proceso = $_POST["edit_proceso"];

        $query = "UPDATE tabla3 SET empleado=?, cargo=?, proceso=? WHERE id=?";

        $stmt = $conn->prepare($query);
        if (!$stmt) {
            echo "Error al preparar la consulta: " . $conn->error;
            exit();
        }
        $stmt->bind_param("sssi", $empleado, $cargo, $proceso, $id);

        if ($stmt->execute()) {
            header("Location: tabla3.php");
            exit();
        } else {
            echo "Error al actualizar el empleado: " . $stmt->error;
        }
    }
}



// ...


// ...


// Cierra la conexión a la base de datos
$conn->close();
?>
