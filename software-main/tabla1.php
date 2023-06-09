<!DOCTYPE html>
<html>

<head>
<link rel="icon" type="png" href="img/logo .png">
    <title>CRUD con Bootstrap y PHP</title>
    <!-- Agrega los enlaces a los estilos de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div style="background-color: #429fe6;">
            <h2 style="text-align: center; font-family: georgia; ">CRUD DE TABLA CARGO</h2>


        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>ID Cargo</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
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
                $query = "SELECT * FROM cargos";
                $result = mysqli_query($conn, $query);

                // Itera sobre los registros y muestra los datos en la tabla
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['idcargo'] . "</td>";
                    echo "<td>" . $row['descripcion'] . "</td>";
                    echo "<td>";
                    echo "<a href='#' class='btn btn-primary edit-btn' data-toggle='modal' data-target='#editModal' data-idcargo='" . $row['idcargo'] . "' data-descripcion='" . $row['descripcion'] . "'>Editar</a>";
                    echo "<a href='#' class='btn btn-danger delete-btn' data-toggle='modal' data-target='#deleteUserModal' data-idcargo='" . $row['idcargo'] . "' data-descripcion='" . $row['descripcion'] . "'>Eliminar</a>";

                    echo "</td>";
                    echo "</tr>";
                }

                // Cierra la conexión a la base de datos
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>

    <!-- Modal para agregar cargo -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Agregar Cargo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="conexionTabla1.php" method="POST">
                        <div class="form-group">
                            <label for="descripcion">Descripción:</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para editar cargo -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Editar Cargo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="conexionTabla1.php" method="POST">
                        <div class="form-group">
                            <label for="edit_descripcion">Descripción:</label>
                            <input type="text" class="form-control" id="edit_descripcion" name="edit_descripcion"
                                required>
                        </div>
                        <input type="hidden" id="edit_idcargo" name="edit_idcargo">
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de confirmación para eliminar cargo -->
    <div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteUserModalLabel">Eliminar Cargo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro de que deseas eliminar este cargo?</p>
                </div>
                <div class="modal-footer">
                    <form action="delete1.php" method="POST">
                        <input type="hidden" id="delete_user_id" name="delete_user_id">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div style="text-align: center;"class="row mt-3">
        <div class="col">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                Agregar Cargo
            </button>
        </div>
        <div class="col">
            <button style="float: left; background-color: red" class="btn btn-primary"
                onclick="cerrarFormulario();">Salir</button>
        </div>
    </div>



        <!-- Scripts de Bootstrap -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

        <!-- Script para obtener los datos del cargo seleccionado y abrir el modal de edición -->
        <script>
            $(document).on("click", ".edit-btn", function () {
                var idcargo = $(this).data('idcargo');
                var descripcion = $(this).data('descripcion');
                $("#edit_idcargo").val(idcargo);
                $("#edit_descripcion").val(descripcion);
                $("#editModal").modal("show");
            });


            // Función para cargar el ID del cargo a eliminar en el formulario de eliminación
            $('.delete-btn').on('click', function () {
                var idcargo = $(this).data('idcargo');
                $('#delete_user_id').val(idcargo);
            });

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


</body>

</html>