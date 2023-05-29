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

// Establecer la codificación de caracteres
$conn->set_charset("utf8");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["descripcion"]) && isset($_POST["categoria"]) && isset($_POST["codificacion"])) {
        // Crear un nuevo proceso
        $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
        $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : '';
        $codificacion = isset($_POST['codificacion']) ? $_POST['codificacion'] : '';

        $query = "INSERT INTO tabla4 (descripcion, categoria, codificacion) 
        VALUES (?, ?, ?)";

        $stmt = $conn->prepare($query);
        if (!$stmt) {
            echo "Error al preparar la consulta: " . $conn->error;
            exit();
        }
        $stmt->bind_param("sss", $descripcion, $categoria, $codificacion);

        if ($stmt->execute()) {
            header("Location: tabla4.php");
            exit();
        } else {
            echo "Error al agregar el proceso: " . $stmt->error;
        }
    } elseif (isset($_POST["edit_id"]) && isset($_POST["edit_descripcion"]) && isset($_POST["edit_categoria"]) && isset($_POST["edit_codificacion"])) {
        // Actualizar un proceso existente
        $id = $_POST["edit_id"];
        $descripcion = $_POST["edit_descripcion"];
        $categoria = $_POST["edit_categoria"];
        $codificacion = $_POST["edit_codificacion"];

        $query = "UPDATE tabla4 SET descripcion=?, categoria=?, codificacion=? WHERE id=?";

        $stmt = $conn->prepare($query);
        if (!$stmt) {
            echo "Error al preparar la consulta: " . $conn->error;
            exit();
        }
        $stmt->bind_param("sssi", $descripcion, $categoria, $codificacion, $id);

        if ($stmt->execute()) {
            header("Location: tabla4.php");
            exit();
        } else {
            echo "Error al actualizar el proceso: " . $stmt->error;
        }
    } elseif (isset($_POST["delete_id"])) {
        // Eliminar un proceso
        $id = $_POST["delete_id"];

        $query = "DELETE FROM tabla4 WHERE id=?";

        $stmt = $conn->prepare($query);
        if (!$stmt) {
            echo "Error al preparar la consulta: " . $conn->error;
            exit();
        }
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            header("Location: tabla4.php");
            exit();
        } else {
            echo "Error al eliminar el proceso: " . $stmt->error;
        }
    }
}

// Cierra la conexión a la base de datos
$conn->close();
?>
