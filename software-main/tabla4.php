<!DOCTYPE html>
<html>

<head>
<link rel="icon" type="png" href="img/logo .png">
    <title>CRUD con Bootstrap y PHP - Procesos</title>
    <!-- Agrega los enlaces a los estilos de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div style="background-color: #429fe6;">
            <h2 style="text-align: center; font-family: georgia;">CRUD DE TABLA DE PROCESOS</h2>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Categoría</th>
                    <th>Codificación</th>
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

                // Consulta los procesos
                $query = "SELECT * FROM tabla4";
                $result = mysqli_query($conn, $query);

                // Itera sobre los registros y muestra los datos en la tabla
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['descripcion'] . "</td>";
                    echo "<td>" . $row['categoria'] . "</td>";
                    echo "<td>" . $row['codificacion'] . "</td>";
                    echo "<td>";
                    echo "<a href='#' class='btn btn-primary edit-btn' data-toggle='modal' data-target='#editModal' data-id='" . $row['id'] . "' data-descripcion='" . $row['descripcion'] . "' data-categoria='" . $row['categoria'] . "' data-codificacion='" . $row['codificacion'] . "'>Editar</a>";
                    echo "<a href='#' class='btn btn-danger delete-btn' data-toggle='modal' data-target='#deleteUserModal' data-id='" . $row['id'] . "' data-descripcion='" . $row['descripcion'] . "' data-categoria='" . $row['categoria'] . "' data-codificacion='" . $row['codificacion'] . "'>Eliminar</a>";
                    echo "</td>";
                    echo "</tr>";
                }

                // Cierra la conexión a la base de datos
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>

    <!-- Modal para agregar proceso -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Agregar Proceso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="conexionTabla4.php" method="POST">
                        <div class="form-group">
                            <label for="descripcion">Descripción:</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                        </div>
                        <div class="form-group">
                            <label for="categoria">Categoría:</label>
                            <input type="text" class="form-control" id="categoria" name="categoria" required>
                        </div>
                        <div class="form-group">
                            <label for="codificacion">Codificación:</label>
                            <input type="text" class="form-control" id="codificacion" name="codificacion" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal para editar proceso -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Editar Proceso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="conexionTabla4.php" method="POST">
                        <div class="form-group">
                            <label for="edit_descripcion">Descripción:</label>
                            <input type="text" class="form-control" id="edit_descripcion" name="edit_descripcion" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_categoria">Categoría:</label>
                            <input type="text" class="form-control" id="edit_categoria" name="edit_categoria" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_codificacion">Codificación:</label>
                            <input type="text" class="form-control" id="edit_codificacion" name="edit_codificacion" required>
                        </div>

                        <input type="hidden" id="edit_id" name="edit_id">
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal para eliminar proceso -->
    <div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteUserModalLabel">Eliminar Proceso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>¿Estás seguro de que quieres eliminar el proceso?</h4>
                    <p id="delete_proceso"></p>
                </div>
                <div class="modal-footer">
                    <form action="delete4.php" method="POST">
                        <input type="hidden" id="delete_id" name="delete_id">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div style="position: absolute; top: 100%; left: 10%;">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
            Agregar Cargo
        </button>

    </div>
    <div style="position: absolute; top: 100%; left: 20%;">
        <button style="float: left; background-color: red" class="btn btn-primary"
            onclick="cerrarFormulario();">SALIR</button>
    </div>

    <!-- Agrega los scripts de Bootstrap y jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Script personalizado para manejar la edición y eliminación de procesos -->
    <script>
        $(document).ready(function () {
            // Configura el modal de edición cuando se hace clic en el botón "Editar"
            $(".edit-btn").click(function () {
                var id = $(this).data('id');
                var descripcion = $(this).data('descripcion');
                var categoria = $(this).data('categoria');
                var codificacion = $(this).data('codificacion');

                $("#edit_id").val(id);
                $("#edit_descripcion").val(descripcion);
                $("#edit_categoria").val(categoria);
                $("#edit_codificacion").val(codificacion);
            });

            // Configura el modal de eliminación cuando se hace clic en el botón "Eliminar"
            $(".delete-btn").click(function () {
                var id = $(this).data('id');
                var descripcion = $(this).data('descripcion');

                $("#delete_id").val(id);
                $("#delete_proceso").text("Descripción: " + descripcion);
            });
        });
        function cerrarFormulario() {
            window.close(); // Cierra la ventana actual del navegador
            window.location.href = "bienvenida.php"; // Redirige al usuario al menú principal
        }
    </script>

</body>

</html>
