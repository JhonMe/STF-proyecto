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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["descripcion"])) {
        // Crear un nuevo cargo
        $descripcion = $_POST["descripcion"];

        $query = "INSERT INTO cargos (descripcion) VALUES ('$descripcion')";

        if ($conn->query($query) === TRUE) {
            header("Location: tabla1.php");
            exit();
        } else {
            echo "Error al agregar el cargo: " . $conn->error;
        }
    } elseif (isset($_POST["edit_idcargo"]) && isset($_POST["edit_descripcion"])) {
        // Actualizar un cargo existente
        $idcargo = $_POST["edit_idcargo"];
        $descripcion = $_POST["edit_descripcion"];

        $query = "UPDATE cargos SET descripcion='$descripcion' WHERE idcargo='$idcargo'";

        if ($conn->query($query) === TRUE) {
            header("Location: tabla1.php");
            exit();
        } else {
            echo "Error al actualizar el cargo: " . $conn->error;
        }
    }
}

// Cierra la conexión a la base de datos
$conn->close();
?>
