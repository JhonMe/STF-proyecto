<!DOCTYPE html>
<html>

<head>
    <title>CRUD con Bootstrap y PHP - Empleados</title>
    <!-- Agrega los enlaces a los estilos de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div style="background-color: #429fe6;">
            <h2 style="text-align: center; font-family: georgia;">CRUD DE TABLA EMPLEADOS-CARGO</h2>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Empleado</th>
                    <th>Cargo</th>
                    <th>Proceso</th>
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

                // Consulta los empleados
                $query = "SELECT * FROM tabla3";
                $result = mysqli_query($conn, $query);

                // Itera sobre los registros y muestra los datos en la tabla
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['empleado'] . "</td>";
                    echo "<td>" . $row['cargo'] . "</td>";
                    echo "<td>" . $row['proceso'] . "</td>";
                    echo "<td>";
                    echo "<a href='#' class='btn btn-primary edit-btn' data-toggle='modal' data-target='#editModal' data-id='" . $row['id'] . "' data-empleado='" . $row['empleado'] . "' data-cargo='" . $row['cargo'] . "' data-proceso='" . $row['proceso']. "'>Editar</a>";
                    echo "<a href='#' class='btn btn-danger delete-btn' data-toggle='modal' data-target='#deleteUserModal' data-id='" . $row['id'] . "' data-empleado='" . $row['empleado'] . "' data-cargo='" . $row['cargo'] . "' data-proceso='" . $row['proceso']. "'>Eliminar</a>";

                    echo "</td>";
                    echo "</tr>";
                }

                // Cierra la conexión a la base de datos
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>

    <!-- Modal para agregar empleado -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Agregar Dato</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="conexionTabla3.php" method="POST">
                        <div class="form-group">
                            <label for="empleado">Empleados:</label>
                            <input type="text" class="form-control" id="empleado" name="empleado" required>
                        </div>
                        <div class="form-group">
                            <label for="cargo">Cargo:</label>
                            <input type="text" class="form-control" id="cargo" name="cargo" required>
                        </div>
                        <div class="form-group">
                            <label for="proceso">Proceso:</label>
                            <input type="text" class="form-control" id="proceso" name="proceso" required>
                        </div> 
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal para editar empleado -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Editar Dato</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="conexionTabla3.php" method="POST">
                        <div class="form-group">
                            <label for="edit_empleado">Empleado:</label>
                            <input type="text" class="form-control" id="edit_empleado" name="edit_empleado" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_cargo">Cargo:</label>
                            <input type="text" class="form-control" id="edit_cargo" name="edit_cargo" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_proceso">Proceso:</label>
                            <input type="text" class="form-control" id="edit_proceso" name="edit_proceso" required>
                        </div>
                        
                        <input type="hidden" id="edit_id" name="edit_id">
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal para eliminar empleado -->
    <div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteUserModalLabel">Eliminar Dato</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>¿Estás seguro de que quieres eliminar al empleado?</h4>
                    <p id="delete_empleado"></p>
                </div>
                <div class="modal-footer">
                    <form action="delete3.php" method="POST">
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


    <!-- Agrega los enlaces a los scripts de jQuery y Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Script para manejar los eventos de editar y eliminar -->
    <script>
        // Evento al hacer clic en el botón de editar
        $('.edit-btn').click(function () {
            var id = $(this).data('id');
            var empleado = $(this).data('empleado');
            var cargo = $(this).data('cargo');
            var proceso = $(this).data('proceso');

            $('#edit_id').val(id);
            $('#edit_empleado').val(empleado);
            $('#edit_cargo').val(cargo);
            $('#edit_proceso').val(proceso);
            
        });

        // Evento al hacer clic en el botón de eliminar
        $('.delete-btn').click(function () {
            var id = $(this).data('id');
            var empleado = $(this).data('empleado');
            $('#delete_id').val(id);
            $('#delete_empleado').text(empleado);
        });
        function cerrarFormulario() {
            window.close(); // Cierra la ventana actual del navegador
            window.location.href = "bienvenida.php"; // Redirige al usuario al menú principal
        }
    </script>
</body>

</html>
