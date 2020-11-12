<?php
  
//  session_start();

?>
<!DOCTYPE HTML>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <title>Proyecto con JavaScript</title>

  <!-- Estilos CSS -->
  <link rel="stylesheet" type="text/css" href="view/assets/css/style.css" />
  <link rel="stylesheet" type="text/css" href="view/assets/css/style-index.css" />
  <link rel="stylesheet" type="text/css" href="view/assets/css/estiloPestañasMensajeria.css" />

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


      <div class="btn-agregar">
        <a href="index.php?&c=message&a=viewNewMessageAdministrador">
          <img src="view/assets/img/agregar.png" alt="Agregar Mensaje" title="Crear Nuevo Mensaje">
        </a>
      </div>
      <div class="wrap">

        <ul class="tabs">
          <li><a href="#tab1"><span class="fa fa-home"></span><span class="tab-text">Mensajes Recibidos</span></a></li>
          <li><a href="#tab2"><span class="fa fa-group"></span><span class="tab-text">Mensajes Enviados</span></a></li>
        </ul>

        <div class="secciones">
          <article id="tab1">
            <div class="wrapper">

              <!-- INICIO TABLA -->

              <input type="text" id="myInput" placeholder="Search for names..">

              <table id="myTable">
                <tr class="header">

                  <th>ORIGEN</th>
                  <th>ASUNTO</th>
                  <th>FECHA DE RECIBIDO</th>
                  <th>ESTADO</th>
                  <th>OPCIONES</th>
                </tr>

                <tr>
                  <h1 id="respuesta">

                  </h1>

                </tr>

                <tr>
                  <td>INGENIERIA DE SISTEMAS</td>
                  <td>Registro Calificado</td>
                  <td>26-08-2020 1:45 P.M.</td>
                  <td>Leido</td>
                  <td>
                    <center>
                      <button id="iconoVer">
                        <img src="view/assets/img/ver.png">
                      </button>
                    </center>
                  </td>
                </tr>

              </table>

              <!-- FIN TABLA -->

            </div>
          </article>
          <article id="tab2">
            <!-- INICIO TABLA -->
            <div class="wrapper" id="mensajes">

              <!-- INICIO TABLA -->

              
              <table id="myTable">
                <tr class="header">

                  <th>DESTINO</th>
                  <th>ASUNTO</th>
                  <th>FECHA DE ENVIADO</th>
                  <th>ESTADO</th>
                  <th>OPCIONES</th>
                </tr>

                <tr>
                  <h1 id="respuesta"></h1>
                </tr>
                <tbody>
               <?php
               
              

              //Metodo creado para listar mensaje ->Prueba
              if ($data["mensajes"] != NULL) {
                foreach ($data["mensajes"] as $mensajes) {

                  $variableID = $mensajes["user_id_destiny"];

                  echo "<tr>";
                  echo "<td>" . $mensajes["user_id_destiny"] . "</td>";
                  echo "<td>" . $mensajes["description"] . "</td>";
                  echo "<td>" . $mensajes["title"] . "</td>";
                 
                 if($mensajes["state"] == "Leido"){
                    echo "<td><span class='badge badge-success'>Leido</span></td>";
                  }else{
                 echo "<td>" . $mensajes["state"] . "</td>";
                  }

                  echo "<td><center>
                    <a href='index.php?c=message&a=verMensaje&id=$variableID'><button id='iconoVer'><img src='view/assets/img/ver.png'></button></a>
                    </td>";

                  echo "</tr>";
                }
              } else {
                echo "<td>No hay Mensajes Leido para Mostrar</td>";
              }

?>

</tbody>
               <!-- <tr>
                  <td>INGENIERIA DE SISTEMAS</td>
                  <td>Registro Calificado</td>
                  <td>26-08-2020 1:45 P.M.</td>
                  <td>Leido</td>
                  <td>
                    <center>
                      <button id="iconoVer">
                        <img src="view/assets/img/ver.png">
                      </button>
                    </center>
                  </td>
                </tr> -->

              </table>

              <!-- FIN TABLA -->

            </div>
          </article>
        </div>
      </div>
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

    <script type="text/javascript" src="view/assets/js/localStorage.js"></script>
  </footer>

</body>

</html>