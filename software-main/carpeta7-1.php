<!DOCTYPE html>
<html>

<head>
<link rel="icon" type="png" href="img/logo .png">
    <title>Formulario Acciones Correctivas y Preventivas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <div style="background-color: #429fe6;">
            <h2 style="text-align: center; font-family: georgia; ">ACCIONES CORRECTIVAS Y PREVENTIVAS
            </h2>


        </div>

        <div class="form-group">
            <label for="detalle">Detalle Cierre de SAPC's y SACP's:</label>
            <textarea class="form-control" id="detalle" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="verificacion">Verificación de Implementación de las Acciones Preventivas y Correctivas:</label>
            <select class="form-control" id="verificacion">
                <option>Seleccionar</option>
                <option>Implementado</option>
                <option>No Implementado</option>
            </select>
        </div>

        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="fechaImplementacion">
                <label class="form-check-label" for="fechaImplementacion">
                    Fecha de Implementación
                </label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Fecha Implementación:</span>
                    </div>
                    <input type="date" class="form-control" id="fechaImplementacion">
                </div>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="fechaProgramaCierre">
                <label class="form-check-label" for="fechaProgramaCierre">
                    Fecha Programada de Cierre
                </label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Fecha Cierre:</span>
                    </div>
                    <input type="date" class="form-control" id="fechaCierre">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="estado">Estado:</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="estado" id="pendiente" value="pendiente">
                <label class="form-check-label" for="pendiente">Pendiente</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="estado" id="cerrado" value="cerrado">
                <label class="form-check-label" for="cerrado">Cerrado</label>
            </div>
        </div>

        <div class="form-group">
            <label for="buscadorArchivos">Buscar Archivos:</label>
            <input type="text" class="form-control" id="buscadorArchivos">
        </div>

        <button type="button" class="btn btn-primary">Actualizar</button>

        <hr>

        <div class="form-group">
            <label for="detalleEficacia">Detalle de Eficacia de las SACP's:</label>
            <textarea class="form-control" id="detalleEficacia" rows="3"></textarea>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="fechaCierre">
            <label class="form-check-label" for="fechaCierre">
                Fecha de Cierre
            </label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Fecha Cierre:</span>
                </div>
                <input type="date" class="form-control" id="fechaCierre">
            </div>
        </div>

        <div class="form-group">
            <label for="eficaciaFecha">Fecha:</label>
            <select class="form-control" id="eficaciaFecha">
                <option>Seleccionar</option>
                <option>Fecha 1</option>
                <option>Fecha 2</option>
            </select>
        </div>

        <div class="form-group">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="eficacia" id="si" value="si">
                <label class="form-check-label" for="si">Sí</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="eficacia" id="no" value="no">
                <label class="form-check-label" for="no">No</label>
            </div>
        </div>
        <button type="button" class="btn btn-primary">Actualizar</button>

        <hr>
        <div class="form-group">
            <label for="detalleSolicitud">Detalle de Solicitud Seleccionado:</label>
            <input type="text" class="form-control" id="acciones" placeholder="Acciones">
            <input type="text" class="form-control" id="recursos" placeholder="Recursos">
            <select class="form-control" id="responsable">
                <option>Seleccionar</option>
                <option>Responsable 1</option>
                <option>Responsable 2</option>
            </select>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Fecha Límite:</span>
                </div>
                <input type="date" class="form-control" id="fechaLimite">
            </div>
            <input type="text" class="form-control" id="descripcion"
                placeholder="Descripción de la no conformidad o potencial no conformidad">
            <input type="text" class="form-control" id="analisisCausal" placeholder="Conclusión de análisis causal">
        </div>
        <button type="button" class="btn btn-primary">Salir</button>

    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>