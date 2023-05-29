<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["delete_id"])) {
        // Obtener el ID del empleado a eliminar
        $id = $_POST["delete_id"];

        // Realizar la consulta de eliminación
        $sql = "DELETE FROM tabla4 WHERE id = '$id'";

        if ($conn->query($sql) === TRUE) {
            // La eliminación se realizó correctamente
            header('Location: tabla4.php');
            exit();
        } else {
            // Hubo un error al eliminar el empleado
            echo "Error al eliminar el empleado: " . $conn->error;
        }
    
    }
}

// Cerrar la conexión
$conn->close();
?>
