<!DOCTYPE html>
<html>

<head>
<link rel="icon" type="png" href="img/logo .png">
    <title>CRUD con Bootstrap y PHP - Empleados</title>
    <!-- Agrega los enlaces a los estilos de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div style="background-color: #429fe6;">
            <h2 style="text-align: center; font-family: georgia;">CRUD DE TABLA EMPLEADOS</h2>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombres</th>
                    <th>Especialidades</th>
                    <th>Celular</th>
                    <th>Usuario</th>
                    <th>Password</th>
                    <th>Firma</th>
                    <th>Email1</th>
                    <th>Email2</th>
                    <th>Dirección</th>
                    <th>CV</th>
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
                $query = "SELECT * FROM empleados";
                $result = mysqli_query($conn, $query);

                // Itera sobre los registros y muestra los datos en la tabla
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['nombres'] . "</td>";
                    echo "<td>" . $row['especialidades'] . "</td>";
                    echo "<td>" . $row['celular'] . "</td>";
                    echo "<td>" . $row['usuario'] . "</td>";
                    echo "<td>" . $row['password'] . "</td>";
                    echo "<td>" . $row['firma'] . "</td>";
                    echo "<td>" . $row['email1'] . "</td>";
                    echo "<td>" . $row['email2'] . "</td>";
                    echo "<td>" . $row['direccion'] . "</td>";
                    echo "<td>" . $row['hoja_de_vida'] . "</td>";
                    echo "<td>";
                    echo "<a href='#' class='btn btn-primary edit-btn' data-toggle='modal' data-target='#editModal' data-id='" . $row['id'] . "' data-nombres='" . $row['nombres'] . "' data-especialidades='" . $row['especialidades'] . "' data-celular='" . $row['celular'] . "' data-usuario='" . $row['usuario'] . "' data-password='" . $row['password'] . "' data-firma='" . $row['firma'] . "' data-email1='" . $row['email1'] . "' data-email2='" . $row['email2'] . "' data-direccion='" . $row['direccion'] . "' data-hoja_de_vida='" . $row['hoja_de_vida'] . "'>Editar</a>";
                    echo "<a href='#' class='btn btn-danger delete-btn' data-toggle='modal' data-target='#deleteUserModal' data-id='" . $row['id'] . "' data-nombres='" . $row['nombres'] . "' data-especialidades='" . $row['especialidades'] . "' data-celular='" . $row['celular'] . "' data-usuario='" . $row['usuario'] . "' data-password='" . $row['password'] . "' data-firma='" . $row['firma'] . "' data-email1='" . $row['email1'] . "' data-email2='" . $row['email2'] . "' data-direccion='" . $row['direccion'] . "' data-hoja_de_vida='" . $row['hoja_de_vida'] . "'>Eliminar</a>";

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
                    <h5 class="modal-title" id="addModalLabel">Agregar Empleado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="conexionTabla2.php" method="POST">
                        <div class="form-group">
                            <label for="nombres">Nombres:</label>
                            <input type="text" class="form-control" id="nombres" name="nombres" required>
                        </div>
                        <div class="form-group">
                            <label for="especialidades">Especialidades:</label>
                            <input type="text" class="form-control" id="especialidades" name="especialidades" required>
                        </div>
                        <div class="form-group">
                            <label for="celular">Celular:</label>
                            <input type="text" class="form-control" id="celular" name="celular" required>
                        </div>
                        <div class="form-group">
                            <label for="usuario">Usuario:</label>
                            <input type="text" class="form-control" id="usuario" name="usuario" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="firma">Firma:</label>
                            <input type="text" class="form-control" id="firma" name="firma" required>
                        </div>
                        <div class="form-group">
                            <label for="email1">Email1:</label>
                            <input type="email" class="form-control" id="email1" name="email1" required>
                        </div>
                        <div class="form-group">
                            <label for="email2">Email2:</label>
                            <input type="email" class="form-control" id="email2" name="email2">
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección:</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" required>
                        </div>
                        <div class="form-group">
                            <label for="hoja_de_vida">Hoja de Vida:</label>
                            <input type="text" class="form-control" id="hoja_de_vida" name="hoja_de_vida" required>
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
                    <h5 class="modal-title" id="editModalLabel">Editar Empleado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="conexionTabla2.php" method="POST">
                        <div class="form-group">
                            <label for="edit_nombres">Nombres:</label>
                            <input type="text" class="form-control" id="edit_nombres" name="edit_nombres" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_especialidades">Especialidades:</label>
                            <input type="text" class="form-control" id="edit_especialidades" name="edit_especialidades"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="edit_celular">Celular:</label>
                            <input type="text" class="form-control" id="edit_celular" name="edit_celular" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_usuario">Usuario:</label>
                            <input type="text" class="form-control" id="edit_usuario" name="edit_usuario" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_password">Password:</label>
                            <input type="password" class="form-control" id="edit_password" name="edit_password"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="edit_firma">Firma:</label>
                            <input type="text" class="form-control" id="edit_firma" name="edit_firma" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_email1">Email1:</label>
                            <input type="email" class="form-control" id="edit_email1" name="edit_email1" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_email2">Email2:</label>
                            <input type="email" class="form-control" id="edit_email2" name="edit_email2">
                        </div>
                        <div class="form-group">
                            <label for="edit_direccion">Dirección:</label>
                            <input type="text" class="form-control" id="edit_direccion" name="edit_direccion" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_hoja_de_vida">Hoja de Vida:</label>
                            <input type="text" class="form-control" id="edit_hoja_de_vida" name="edit_hoja_de_vida"
                                required>
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
                    <h5 class="modal-title" id="deleteUserModalLabel">Eliminar Empleado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>¿Estás seguro de que quieres eliminar al empleado?</h4>
                    <p id="delete_nombres"></p>
                </div>
                <div class="modal-footer">
                    <form action="delete2.php" method="POST">
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
            var nombres = $(this).data('nombres');
            var especialidades = $(this).data('especialidades');
            var celular = $(this).data('celular');
            var usuario = $(this).data('usuario');
            var password = $(this).data('password');
            var firma = $(this).data('firma');
            var email1 = $(this).data('email1');
            var email2 = $(this).data('email2');
            var direccion = $(this).data('direccion');
            var hoja_de_vida = $(this).data('hoja_de_vida');

            $('#edit_id').val(id);
            $('#edit_nombres').val(nombres);
            $('#edit_especialidades').val(especialidades);
            $('#edit_celular').val(celular);
            $('#edit_usuario').val(usuario);
            $('#edit_password').val(password);
            $('#edit_firma').val(firma);
            $('#edit_email1').val(email1);
            $('#edit_email2').val(email2);
            $('#edit_direccion').val(direccion);
            $('#edit_hoja_de_vida').val(hoja_de_vida);
        });

        // Evento al hacer clic en el botón de eliminar
        $('.delete-btn').click(function () {
            var id = $(this).data('id');
            var nombres = $(this).data('nombres');
            $('#delete_id').val(id);
            $('#delete_nombres').text(nombres);
        });
        function cerrarFormulario() {
            window.close(); // Cierra la ventana actual del navegador
            window.location.href = "bienvenida.php"; // Redirige al usuario al menú principal
        }
    </script>

</body>

</html>