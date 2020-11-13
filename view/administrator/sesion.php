<?php

session_start();

?>
<!DOCTYPE HTML>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <title>Proyecto con JavaScript</title>

  <!-- Estilos CSS -->
  <link rel="stylesheet" type="text/css" href="view/assets/css/style.css" />
  <link rel="stylesheet" type="text/css" href="view/assets/css/style-documentos.css" />
  <link rel="stylesheet" type="text/css" href="view/assets/css/style-registro.css" />

  <!-- Estilo css Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <!-- Scripts Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>


  <!-- JQuery-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">

  <!-- Slider -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>

  <!-- Moment JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.28.0/moment.min.js" integrity="sha512-Q1f3TS3vSt1jQ8AwP2OuenztnLU6LwxgyyYOG1jgMW/cbEMHps/3wjvnl1P3WTrF3chJUWEoxDUEjMxDV8pujg==" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.28.0/locale/es.min.js" integrity="sha512-/HmEBBS8qan4uG3ClUfdNMUOprD0g4BNcJnOBh153mBMs16U92xULl8QS9A37/vLW17epcNp0t0fDOYWjpG73Q==" crossorigin="anonymous"></script>

  <!-- Mis Scripts-->
  <script type="text/javascript" src="view/assets/js/main.js"></script>

</head>

<body>

  <section id="global">
    <!-- Cabecera -->
    <header>
      <?php
      include('header.php');
      ?>
    </header>



    <!-- Contenido -->
    <section id="content">

      <div style="background: rgb(226, 3, 26); height: 40px;" class="tituloDocumento">
        <h5 style="font-weight: bold; line-height: 42px; color:white;">SESIONES DEL COMITE CURRICULAR CENTRAL</h5>
      </div>

      <!-- INICIO TABLA -->

      <div style="margin-bottom: -40px;">
        <center>
          <div class="btn-agregarDocumento" style="display: inline-block;">
            <a style="cursor: pointer;" href="index.php?c=sesion&a=addSesionView">
              <img src="view/assets/img/calendario.png" style="width: 50px; height: 50px;" alt="Agregar Nueva Sesión" title="Agregar Nueva Sesión">
            </a>
          </div>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <div class="btn-agregarDocumento" style="display: inline-block;">
            <a style="cursor: pointer;" href="index.php?c=sesion&a=openUploadDocumentSesion">
              <img src="view/assets/img/add-file.png" style="width: 50px; height: 50px;" alt="Actualizar Documento de Sesion" title="Actualizar Documento de Sesion">
            </a>
          </div>
        </center>
      </div>

      <div class="wrap">
        <div class="wrapper">

<br>
          <table id="myTable">
            <thead>
              <tr class="header">

                <th>Fecha sesión</th>
                <th>fecha limite para documentos</th>
                <th>semestre</th>
                <th>año</th>
                <th>estado</th>
                <th>visibilidad</th>
                <th>
                  <center>OPCIONES</center>
                </th>
              </tr>
            </thead>
            <tr>
              <h1 id="respuesta"></h1>
            </tr>
            <tbody>
              <?php

              if ($data["sesiones"] != NULL) {
                foreach ($data["sesiones"] as $sesiones) {
                  $documentoID = $sesiones["id"];
                  echo "<tr>";

                  echo "<td>".$sesiones["fechaSesion"]."</td>";
                  echo "<td>".$sesiones["fechaLimite"]."</td>";
                  echo "<td>".$sesiones["semestre"]."</td>";
                  echo "<td>".$sesiones["anio"]."</td>";

                  if($sesiones["state"] == "Activo"){
                    echo "<td><a href='index.php?c=sesion&a=changeState&id=$documentoID'><span class='badge badge-success'>".$sesiones["state"]."</span></a></td>";
                  }else{
                    echo "<td><a href='index.php?c=sesion&a=changeState&id=$documentoID'><span class='badge badge-danger'>".$sesiones["state"]."</span></a></td>";
                  }

                  if($sesiones["stateView"] == "Visible"){
                    echo "<td><a href='index.php?c=sesion&a=changeStateView&id=$documentoID'><span class='badge badge-success'>".$sesiones["stateView"]."</span></a></td>";
                  }else{
                    echo "<td><a href='index.php?c=sesion&a=changeStateView&id=$documentoID'><span class='badge badge-danger'>".$sesiones["stateView"]."</span></a></td>";
                  }
                  
                  echo "<td><center>
                      <a href='index.php?c=sesion&a=updateSesionView&id=" . $sesiones["id"] . "'><span id='iconoVer'><img src='view/assets/img/editar.png' title='Consultar Documento'></span></a>&nbsp&nbsp&nbsp&nbsp        
                      
                            </td>";

                  echo "</tr>";
                }
              } else {
                echo "<td>No hay Sesiones en esta sección</td>";
              }

              ?>
            </tbody>
          </table>


        </div>
      </div>

      <!-- FIN TABLA -->

      <div class="clearfix"></div>
    </section>
  </section>

  <!-- Pie de Pagina -->
  <footer>
    <div class="part1Footer">
      Universidad Francisco de Paula Santander - Sede Cucuta
    </div>
    <div class="part2Footer">
      Vicerrectoria Academica - Comite Curricular Central - Todos los Derechos Reservados &copy;
    </div>


  </footer>

</body>

</html>