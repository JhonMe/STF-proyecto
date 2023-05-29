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
    if (isset($_POST["nombres"]) && isset($_POST["especialidades"]) && isset($_POST["celular"]) && isset($_POST["usuario"]) && isset($_POST["password"]) && isset($_POST["firma"]) && isset($_POST["email1"]) && isset($_POST["email2"]) && isset($_POST["direccion"]) && isset($_POST["hoja_de_vida"])) {
        // Crear un nuevo empleado
        $nombres = isset($_POST['nombres']) ? $_POST['nombres'] : '';
        $especialidades = isset($_POST['especialidades']) ? $_POST['especialidades'] : '';
        $celular = isset($_POST['celular']) ? $_POST['celular'] : '';
        $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $firma = isset($_POST['firma']) ? $_POST['firma'] : '';
        $email1 = isset($_POST['email1']) ? $_POST['email1'] : '';
        $email2 = isset($_POST['email2']) ? $_POST['email2'] : '';
        $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : '';
        $hoja_de_vida = isset($_POST['hoja_de_vida']) ? $_POST['hoja_de_vida'] : '';

        $query = "INSERT INTO empleados (nombres, especialidades, celular, usuario, password, firma, email1, email2, direccion, hoja_de_vida) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($query);
        if (!$stmt) {
            echo "Error al preparar la consulta: " . $conn->error;
            exit();
        }
        $stmt->bind_param("ssssssssss", $nombres, $especialidades, $celular, $usuario, $password, $firma, $email1, $email2, $direccion, $hoja_de_vida);

        if ($stmt->execute()) {
            header("Location: tabla2.php");
            exit();
        } else {
            echo "Error al agregar el empleado: " . $stmt->error;
        }
    } elseif (isset($_POST["edit_id"]) && isset($_POST["edit_nombres"]) && isset($_POST["edit_especialidades"]) && isset($_POST["edit_celular"]) && isset($_POST["edit_usuario"]) && isset($_POST["edit_password"]) && isset($_POST["edit_firma"]) && isset($_POST["edit_email1"]) && isset($_POST["edit_email2"]) && isset($_POST["edit_direccion"]) && isset($_POST["edit_hoja_de_vida"])) {
        // Actualizar un empleado existente
        $id = $_POST["edit_id"];
        $nombres = $_POST["edit_nombres"];
        $especialidades = $_POST["edit_especialidades"];
        $celular = $_POST["edit_celular"];
        $usuario = $_POST["edit_usuario"];
        $password = $_POST["edit_password"];
        $firma = $_POST["edit_firma"];
        $email1 = $_POST["edit_email1"];
        $email2 = $_POST["edit_email2"];
        $direccion = $_POST["edit_direccion"];
        $hoja_de_vida = $_POST["edit_hoja_de_vida"];

        $query = "UPDATE empleados SET nombres=?, especialidades=?, celular=?, usuario=?, password=?, firma=?, email1=?, email2=?, direccion=?, hoja_de_vida=? WHERE id=?";

        $stmt = $conn->prepare($query);
        if (!$stmt) {
            echo "Error al preparar la consulta: " . $conn->error;
            exit();
        }
        $stmt->bind_param("ssssssssssi", $nombres, $especialidades, $celular, $usuario, $password, $firma, $email1, $email2, $direccion, $hoja_de_vida, $id);

        if ($stmt->execute()) {
            header("Location: tabla2.php");
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
