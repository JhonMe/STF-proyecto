<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Menú de Navegación con Bootstrap</title>
  <!-- Incluimos los estilos de Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<style>
  body {
    background-color: #429fe6;
    background-image: linear-gradient(45deg, #4EACF5, #4C6BFC, #27D9F5);
    background-size: 200% 200%;
    animation: gradientAnimation 10s ease infinite;
  }

  @keyframes gradientAnimation {
    0% {
      background-position: 0% 50%;
    }

    50% {
      background-position: 100% 50%;
    }

    100% {
      background-position: 0% 50%;
    }
  }
</style>

<body>

  <div>
    <h1 style="background-color: #429f; color: white; text-align: center; font-size: 30px; font-family: georgia; width:1800px; margin-left:100px;">
      CONTROL NO CONFORMIDADES
      PARA SISTEMA GESTION DE
      CALIDAD-CNC</h1>
  </div>
  <div style=" display: flex; height: 250px; width: 100%; background-color: transparent; top: 40%; left: 40%; transform: translate(-0%, -3%);">
    <div class="opccion">
      <a class="nav-link dropdown-toggle" style="color:black;font-family:georgia;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        OPERACIONES
      </a>
      <div style="background-color:transparent;" class="dropdown-menu" aria-labelledby="navbarDropdown">
        <nav class="navbar navbar-expand-lg navbar-light " style="background-color:transparent;">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div style="height: 120px; width: 100%; " class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li style="padding: 5px;" class="nav-item">
                <button style=" background-color: #efebe3; border-radius: 8px;">
                  <a class="nav-link" href="carpeta1.php">NO CONFORME/ NO CONFORMIDADES</a>
                </button>
              </li>

              <li style="padding: 5px;" class="nav-item">
                <button style=" background-color: #efebe3; border-radius: 8px;">
                  <a class="nav-link" href="carpeta2.php">HALLAZGO AUDITORIAS</a>
                </button>
              </li>

              <li style="padding: 5px;" class="nav-item">
                <button style=" background-color: #efebe3; border-radius: 8px;">
                  <a class="nav-link" href="carpeta3.php">QUEJAS/ SUGERENCIAS/ FELICIATCIONES</a>
                </button>
              </li>
              <br>
              <li style="padding: 5px;" class="nav-item">
                <button style=" background-color: #e4d6c7; border-radius: 8px;">
                  <a class="nav-link" href="carpeta4.php">BUZON DE QUEJAS/ RECLAMOS-SUGERENCIAS-FELICIATCIONES</a>
                </button>
              </li>

              <li style="padding: 5px;" class="nav-item">
                <button style=" background-color: #e4d6c7; border-radius: 8px;">
                  <a class="nav-link" href="carpeta5.php">HALLAZGO DE AUDITORIAS</a>
                </button>
              </li>

              <li style="padding: 5px;" class="nav-item">
                <button style=" background-color: #e4d6c7; border-radius: 8px;">
                  <a class="nav-link" href="carpeta6.php">REPORTE PRODUCTO NO CONFORME| NO CONFORMIDADES</a>
                </button>
              </li>

              <li style="padding: 5px;" class="nav-item">
                <button style=" background-color: #e4d6c7; border-radius: 8px;">
                  <a class="nav-link" href="carpeta7.php">CONTROL DE ACCIONES CORRECTIVAS| PREVENTIVAS</a>
                </button>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>

    <div class="opccion">
      <a style="color:black; font-family:georgia; " class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        TABLAS
      </a>
      <div style="background-color: transparent;"  class="dropdown-menu" aria-labelledby="navbarDropdown">
        <nav  class="navbar navbar-expand-lg navbar-light ">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div style="height: 120px; width: 100%;" class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li style="padding: 10px;" class="nav-item">
                <button style=" background-color: #efebe3; border-radius: 8px;">
                  <a class="nav-link" href="tabla1.php">CARGO</a>
                </button>
              </li>

              <li style="padding: 10px;" class="nav-item">
                <button style=" background-color: #efebe3; border-radius: 8px;">
                  <a class="nav-link" href="tabla2.php">EMPLEADO</a>
                </button>
              </li>

              <li style="padding: 10px;" class="nav-item">
                <button style=" background-color: #efebe3; border-radius: 8px;">
                  <a class="nav-link" href="tabla3.php">CARGO-EMPLEADO</a>
                </button>
              </li>
              <br>
              <li style="padding: 10px;" class="nav-item">
                <button style=" background-color: #e4d6c7; border-radius: 8px;">
                  <a class="nav-link" href="tabla4.php">PROCESO</a>
                </button>
              </li>

              <li style="padding: 10px;" class="nav-item">
                <button style=" background-color: #e4d6c7; border-radius: 8px;">
                  <a class="nav-link" href="tabla5.php">COLORES</a>
                </button>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </div>

  <header class="fondo">
    <div style="transform: translate(-0%, -2%)">
      <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); margin-top:270px; background-color:transparent;">
        <h1 style="color: white; font-size: 3rem; text-align: center;">
          <img src="img/robot.png" style="height: 400px;" class="hol" onmouseover="showMessage('¡Hola bienvenido a la pagina👌😁!')"></img>
          <h1 style="text-emphasis-color: black; font-size: 30px"> CONTROL NO CONFORMIDADES PARA SISTEMA GESTION DE CALIDAD-CNC</h1>
        </h1>
      </div>
    </div>
    <div id="messageContainer" style="display: none; position: absolute; background-color: white; padding: 10px;">
      <p id="message"></p>
    </div>
  </header>

  <script>
    function showMessage(message) {
      var messageElement = document.getElementById('message');
      messageElement.textContent = message;
      var messageContainer = document.getElementById('messageContainer');
      messageContainer.style.display = 'block';
      messageContainer.style.left = event.clientX + 'px';
      messageContainer.style.top = event.clientY + 'px';
    }
  </script>
  <!-- Incluimos los scripts de Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>