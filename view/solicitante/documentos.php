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

  <!-- JQuery-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">

  <!-- Slider -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>

  <!-- Moment JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.28.0/moment.min.js"
    integrity="sha512-Q1f3TS3vSt1jQ8AwP2OuenztnLU6LwxgyyYOG1jgMW/cbEMHps/3wjvnl1P3WTrF3chJUWEoxDUEjMxDV8pujg=="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.28.0/locale/es.min.js"
    integrity="sha512-/HmEBBS8qan4uG3ClUfdNMUOprD0g4BNcJnOBh153mBMs16U92xULl8QS9A37/vLW17epcNp0t0fDOYWjpG73Q=="
    crossorigin="anonymous"></script>

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
      
      <div class="tituloDocumento">
          <h2>Documentos pendientes de revisión</h2>
      </div>

        <!-- INICIO TABLA -->

        <div class="wrap">
          <div class="wrapper">
  
            <input type="text" id="myInput" placeholder="Search for names..">
  
            <table id="myTable">
              <tr class="header">
                <!-- <th style="width:60%;">Name</th>
                <th style="width:40%;">Country</th> -->
                <th>No RADICADO</th>
                <th>DEPENDENCIA</th>
                <th>FECHA DE RECIBIDO</th>
                <th>TIPO DE DOCUMENTO</th>
                <th>DESTINO</th>
                <th>ESTADO</th>
                <th>OPCIONES</th>
              </tr>
  
              <tr>
              
                <h1 id="respuesta">
                  
                </h1>
              
              </tr>
              
              <tr>
                <td>0021541</td>
                <td>INGENIERIA DE SISTEMAS</td>
                <td>26-08-2020 1:45 P.M.</td>
                <td>Registro Calificado</td>
                <td>Consejo Academico</td>
                <td>Pendiente por Revisar</td>
                <td>
                  <center>
                    <button id="iconoVer">
                      <img src="view/assets/img/ver.png">
                    </button>
                  </center>
                </td>
              </tr>
  
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