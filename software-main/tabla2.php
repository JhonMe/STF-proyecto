<!DOCTYPE html>
<html>

<head>
    <title>CRUD con Bootstrap</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>CRUD con Bootstrap</h2>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">Agregar
            Usuario</button>
        <br><br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>clave</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Conexión a la base de datos
                $conn = mysqli_connect("localhost", "root", "", "usuarios");

                // Consulta de usuarios
                $query = "SELECT * FROM usuario_login";
                $result = mysqli_query($conn, $query);

                // Mostrar los usuarios en la tabla
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['usuario'] . "</td>";
                    echo "<td>" . $row['clave'] . "</td>";
                    echo "<td>
                            <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#editUserModal' data-id='" . $row['usuario'] . "' data-usuario='" . $row['clave'] . "'>Editar</button>
                            <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#deleteUserModal' data-id='" . $row['usuario'] . "'>Eliminar</button>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Modal Agregar Usuario -->
    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Agregar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="conexionTabla2.php" method="POST">
                        <div class="form-group">
                            <label>Usuario</label>
                            <input type="text" name="usuario" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Clave</label>
                            <input type "password" name="clave" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Editar Usuario -->
    <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header"><!DOCTYPE html>
<html>

<head>
    <title>CRUD con Bootstrap y PHP</title>
    <!-- Agrega los enlaces a los estilos de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>CRUD con Bootstrap y PHP</h2>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
            Agregar Cargo
        </button>
        <br><br>
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
                    echo "<a href='#' class='btn btn-danger ml-2 delete-button' data-toggle='modal' data-target='#deleteUserModal' data-idcargo='" . $row['idcargo'] . "'>Eliminar</a>";
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
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
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
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="form-group">
                            <input type="hidden" id="edit-idcargo" name="edit_idcargo">
                            <label for="edit-descripcion">Descripción:</label>
                            <input type="text" class="form-control" id="edit-descripcion" name="edit_descripcion"
                                required>
                        </div>
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
                    <form action="delete.php" method="POST">
                        <input type="hidden" id="delete-idcargo" name="delete_user_id">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Agrega los scripts de Bootstrap y jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
        // Función para cargar los datos del cargo a editar en el formulario de edición
        $('.edit-btn').on('click', function () {
            var idcargo = $(this).data('idcargo');
            var descripcion = $(this).data('descripcion');

            $('#edit-idcargo').val(idcargo);
            $('#edit-descripcion').val(descripcion);
        });

        // Función para cargar el ID del cargo a eliminar en el formulario de eliminación
        $('.delete-button').on('click', function () {
            var idcargo = $(this).data('idcargo');
            $('#delete-idcargo').val(idcargo);
        });
    </script>
</body>

</html>
                    <h5 class="modal-title" id="editUserModalLabel">Editar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="conexionTabla2.php" method="POST">
                        <input type="hidden" name="id" id="edit_user_id">
                        <div class="form-group">
                            <label>Usuario</label>
                            <input type="text" name="usuario" id="edit_user_usuario" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Clave</label>
                            <input type="password" name="clave" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Eliminar Usuario -->
    <div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteUserModalLabel">Eliminar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="delete.php" method="POST">
                        <p>¿Estás seguro de que quieres eliminar este usuario?</p>
                        <input type="hidden" name="id" id="delete_user_id">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
        // Obtener los datos del usuario seleccionado para editar
        $('#editUserModal').on('show.bs.modal1', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var usuario = button.data('usuario')
            var modal = $(this)
            modal.find('#edit_user_id').val(id)
            modal.find('#edit_user_usuario').val(usuario)
        })

        // Obtener el ID del usuario seleccionado para eliminar
        $('#deleteUserModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('#delete_user_id').val(id)
        })
    </script>
</body>

</html>