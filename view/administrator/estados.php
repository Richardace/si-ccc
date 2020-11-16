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
  <link id="theme" rel="stylesheet" type="text/css" href="view/assets/css/style-estados.css" />
  <link rel="stylesheet" type="text/css" href="view/assets/css/style-documentos.css" />
  <link id="theme" rel="stylesheet" type="text/css" href="view/assets/css/estiloPestañasRegistro.css" />
  <link id="theme" rel="stylesheet" type="text/css" href="view/assets/css/style-registro.css" />

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

      <div class="card">
        <div class="card-header" style="color: white; font-weight: bold; background: #dc3545;">
          <CENTER>DOCUMENTOS RECIBIDOS</CENTER>
        </div>
        <div class="card-body">

          <!-- INICIO TABLA -->

          <div class="wrap">
            <div class="wrapper">

              <!-- ACORDEON PRINCIPAL -->

              <div id="accordion">

                <?php

                if ($data['documentos'] != NULL) {
                  $head = 1;
                  foreach ($data['documentos'] as $sesiones) {
                    $titleMemory = $sesiones['anio'].$sesiones['semestre'];

                    echo "
                        <div class='card'>
                          <div class='card-header principal' id='heading$head'>
                              <h5 class='mb-0'>
                                  <button class='btn btn-link collapsed' data-toggle='collapse' data-target='#semestre$head' aria-expanded='false' style='width: 100%; color: black; font-weight: bold; text-decoration: none; margin-left: 50%; transform: translateX(-50%);'>
                                  $sesiones[anio] - $sesiones[semestre]
                                  </button>
                              </h5>
                          </div>
                          
                          <div id='semestre$head' class='collapse' aria-labelledby='heading$head' data-parent='#accordion'>
                              <div class='card-body'>";

                                $head2 = 1;
                                foreach ($data[$titleMemory] as $periodo) {

                                  $titleMemoryPeriodo = $sesiones['anio'].$sesiones['semestre'].$periodo['id'];
                                  $apoyoTitulo = $sesiones['anio'].$sesiones['semestre'];


                                  echo "
                                  
                                    <div id='accordion$apoyoTitulo'>
                                      <div class='card'>
                                          <div class='card-header' id='heading$apoyoTitulo$head2' style='background: white;'>
                                            <h5 class='mb-0'>
                                                <button class='btn btn-link collapsed' data-toggle='collapse' data-target='#semestre$apoyoTitulo$head2' aria-expanded='false' style='width: 100%; color: red; font-weight: bold; text-decoration: none;'>
                                                SESIÓN CON FECHA: $periodo[fechaSesion]
                                                </button>
                                            </h5>
                                          </div>

                                          <div id='semestre$apoyoTitulo$head2' class='collapse' aria-labelledby='heading$apoyoTitulo$head2' data-parent='#accordion$apoyoTitulo'>
                                              <div class='card-body'>";


                                              if ($data[$titleMemoryPeriodo] != NULL) {

                                                echo "
                                                  
                                                  <table id='myTable'>
                                                    <thead>
                                                        <tr class='header'>

                                                            <th>N° de Radicado</th>
                                                            <th>Solicitante</th>
                                                            <th>Fecha de Registro</th>
                                                            <th>Titulo</th>
                                                            <th>estado</th>
                                                            <th>
                                                              <center>OPCIONES</center>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>";

                                                foreach ($data[$titleMemoryPeriodo] as $documentos) {
                                                  

                                                      $documentoID = $documentos['id'];
                                                      echo '<tr>';
                                                      if ($documentos['radicado'] == 0) {
                                                        echo '<td>Pendiente</td>';
                                                      } else {
                                                        echo "<td><span class='badge badge-warning'>$documentos[radicado]</span></td>";
                                                      }

                                                      echo "<td>$documentos[fullName]</td>";
                                                      echo "<td>$documentos[dateRegister]</td>";
                                                      echo "<td>$documentos[title]</td>";
                                                      echo "<td>$documentos[state]</td>";
                                                  
                                                      echo "<td><center>
                                                            <a href='index.php?c=documento&a=viewDocumentAdministrador&id=$documentos[id]'><span id='iconoVer'><img src='view/assets/img/ver.png' title='Consultar Documento'></span></a>&nbsp&nbsp&nbsp&nbsp        
                                                            </center></td></tr>";



                                                  


                                                }
                                                echo "

                                                    </tbody>
                                                  </table>
                                                  
                                                  ";
                                              }else{
                                                echo "No hay Documentos para esta Sesión";
                                              }


                                  echo "
                                              </div>
                                          </div>
                                      </div>                                  
                                    </div>
                                  
                                  
                                  ";

                                  
                                  $head2++;

                                }

                    echo "
                              </div>
                          </div>
                        </div>

                        ";
                      $head++;
                  }
                } else {
                  echo "
                  <div class='card-header' id='headingThree style=background: red;'><h5 class='mb-0'><button class='btn btn-link collapsed' data-toggle='collapse' data-target='#collapseThree' aria-expanded='false' aria-controls='collapseThree style=color: white; font-weight: bold; text-decoration: none;'>NO HAY SESIONES REGISTRADAS</button></h5></div>";
                }
                ?>
              </div>
              <!-- FIN ACORDEON PRINCIPAL  -->


            </div>
          </div>
          <!-- FIN TABLA -->
        </div>
        <div class="card-footer text-muted" style="color: white; font-weight: bold; background:#dc3545;"></div>
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


  </footer>

</body>

</html>