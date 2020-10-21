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
  <link id="theme" rel="stylesheet" type="text/css" href="view/assets/css/estiloPestañasRegistro.css" />
  <link id="theme" rel="stylesheet" type="text/css" href="view/assets/css/style-registro.css" />

  <!-- JQuery-->
  <link rel="stylesheet" href="view/assets/js/jquery-ui/jquery-ui.min.css" />
  <link rel="stylesheet" href="view/assets/js/jquery-ui/jquery-ui.structure.min.css" />
  <link rel="stylesheet" href="view/assets/js/jquery-ui/jquery-ui.theme.min.css" />
  <script type="text/javascript" src="view/assets/js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="view/assets/js/jquery-2-2-1.min.js"></script>
  <script type="text/javascript" src="view/assets/js/jquery-ui/jquery-ui.min.js"></script>

  <!-- Moment JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.28.0/moment.min.js"
    integrity="sha512-Q1f3TS3vSt1jQ8AwP2OuenztnLU6LwxgyyYOG1jgMW/cbEMHps/3wjvnl1P3WTrF3chJUWEoxDUEjMxDV8pujg=="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.28.0/locale/es.min.js"
    integrity="sha512-/HmEBBS8qan4uG3ClUfdNMUOprD0g4BNcJnOBh153mBMs16U92xULl8QS9A37/vLW17epcNp0t0fDOYWjpG73Q=="
    crossorigin="anonymous"></script>

  <!-- Mis Scripts-->
  <script type="text/javascript" src="view/assets/js/personal.js"></script>

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
      <div class="wrap">

        <ul class="tabs">
          <li><a href="#tab1"><span class="fa fa-home"></span><span class="tab-text">Directores de Programa</span></a></li>
          <li><a href="#tab2"><span class="fa fa-group"></span><span class="tab-text">Evaluadores</span></a></li>
          <li><a href="#tab3"><span class="fa fa-group"></span><span class="tab-text">Administradores</span></a></li>
          <li><a href="#tab4"><span class="fa fa-group"></span><span class="tab-text">Correos Institucionales</span></a></li>

        </ul>

        <div class="secciones">

          <article id="tab1">
            
            <div>
              <div class="btn-agregarUsuario">
                <a id="lanzarRegistroDirector" href="#">
                  <img src="view/assets/img/agregar-usuario.png" alt="Agregar Director de Programa"
                    title="Crear Nuevo Director de Programa">
                </a>
              </div>
              <div class="btn-agregarExcel">
                <a href="" target="_blank">
                  <img src="view/assets/img/añadir-excel.png" alt="Agregar Directores desde Excel"
                    title="Añadir lista de Directores">
                </a>
              </div>
            </div>

            <div id="popup" title="Registro de Director de Programa" style="display:none">

            </div>


            <div class="wrapper">
              <br>
              <label class="textoRadioButton">FILTRAR POR: &nbsp;</label>
              <input type="radio" name="filtro" id="codigo" value="0"> <span class="textoRadioButton">CODIGO </span>
              &nbsp; &nbsp;
              <input type="radio" name="filtro" id="dependencia" value="1"> <span class="textoRadioButton">DEPENDENCIA
              </span> &nbsp; &nbsp;
              <input type="radio" name="filtro" id="nombre" value="2"> <span class="textoRadioButton">NOMBRE </span>
              &nbsp; &nbsp; &nbsp;

              <input type="text" id="myInput" placeholder="Buscar ...">

              <select class="textoSelectActivo" style="float: right;" type="text" id="mySelect"
                placeholder="Buscar ...">
                <option class="textoSelectActivo" value="Activo">Activo </option>
                <option class="textoSelectActivo" value="Inactivo">Inactivo</option>
              </select>

              <!-- INICIO TABLA -->

              <table id="myTable" class="table table-hover">
                <thead>
                  <tr class="header">
                    <th>Codigo</th>
                    <th>DEPENDENCIA</th>
                    <th>Nombre y Apellido</th>
                    <th>correo</th>
                    <th>fecha de registro</th>
                    <th>ESTADO</th>
                    <th>OPCIONES</th>
                  </tr>

                </thead>

                <tr>
                  <h1 id="respuesta">
                  </h1>
                </tr>

                <tbody>
                  <tr>
                    <td>0021541</td>
                    <td>INGENIERIA DE SISTEMAS</td>
                    <td>Richard Acevedo</td>
                    <td>richardalexanderar@ufps.edu.co</td>
                    <td>26-08-2020 1:45 P.M.</td>
                    <td>Activo</td>
                    <td>
                      <center>
                        <button id="iconoVer">
                          <img src="view/assets/img/ver.png">
                        </button>
                        &nbsp &nbsp
                        <button id="iconoEditar">
                          <img src="view/assets/img/editar.png">
                        </button>
                      </center>
                    </td>
                  </tr>
                </tbody>



              </table>
              
              <br>

              <nav id="paginacion">
                <ul class="pagination pagination-lg pager" id="myPager">



                </ul>
              </nav>


              <!-- FIN TABLA -->

            </div>
          </article>

          <article id="tab2">
            
          <div>
              <div class="btn-agregarUsuario">
                <a id="lanzarRegistroDirector" href="#">
                  <img src="view/assets/img/agregar-usuario.png" alt="Agregar Director de Programa"
                    title="Crear Nuevo Director de Programa">
                </a>
              </div>
              <div class="btn-agregarExcel">
                <a href="" target="_blank">
                  <img src="view/assets/img/añadir-excel.png" alt="Agregar Directores desde Excel"
                    title="Añadir lista de Directores">
                </a>
              </div>
            </div>

            <div id="popup" title="Registro de Director de Programa" style="display:none">

            </div>


            <div class="wrapper">
              <br>
              <label class="textoRadioButton">FILTRAR POR: &nbsp;</label>
              <input type="radio" name="filtro" id="codigo" value="0"> <span class="textoRadioButton">CODIGO </span>
              &nbsp; &nbsp;
              <input type="radio" name="filtro" id="dependencia" value="1"> <span class="textoRadioButton">DEPENDENCIA
              </span> &nbsp; &nbsp;
              <input type="radio" name="filtro" id="nombre" value="2"> <span class="textoRadioButton">NOMBRE </span>
              &nbsp; &nbsp; &nbsp;

              <input type="text" id="myInput" placeholder="Buscar ...">

              <select class="textoSelectActivo" style="float: right;" type="text" id="mySelect"
                placeholder="Buscar ...">
                <option class="textoSelectActivo" value="Activo">Activo </option>
                <option class="textoSelectActivo" value="Inactivo">Inactivo</option>
              </select>


              <!-- INICIO TABLA -->

              

              <table id="myTable" class="table table-hover">
                <thead>
                  <tr class="header">
                    <th>Codigo</th>
                    <th>DEPENDENCIA</th>
                    <th>Nombre y Apellido</th>
                    <th>correo</th>
                    <th>fecha de registro</th>
                    <th>ESTADO</th>
                    <th>OPCIONES</th>
                  </tr>

                </thead>

                <tr>
                  <h1 id="respuesta">
                  </h1>
                </tr>

                <tbody>
                  <tr>
                    <td>0021541</td>
                    <td>INGENIERIA DE SISTEMAS</td>
                    <td>Richard Acevedo</td>
                    <td>richardalexanderar@ufps.edu.co</td>
                    <td>26-08-2020 1:45 P.M.</td>
                    <td>Activo</td>
                    <td>
                      <center>
                        <button id="iconoVer">
                          <img src="view/assets/img/ver.png">
                        </button>
                        &nbsp &nbsp
                        <button id="iconoEditar">
                          <img src="view/assets/img/editar.png">
                        </button>
                      </center>
                    </td>
                  </tr>
                </tbody>

              </table>
              <br>

              <nav id="paginacion">
                <ul class="pagination pagination-lg pager" id="myPager">



                </ul>
              </nav>


              <!-- FIN TABLA -->

            </div>
          </article>
          <article id="tab3">
          <div>
              <div class="btn-agregarUsuario">
                <a id="lanzarRegistroDirector" href="#">
                  <img src="view/assets/img/agregar-usuario.png" alt="Agregar Director de Programa"
                    title="Crear Nuevo Director de Programa">
                </a>
              </div>
              <div class="btn-agregarExcel">
                <a href="" target="_blank">
                  <img src="view/assets/img/añadir-excel.png" alt="Agregar Directores desde Excel"
                    title="Añadir lista de Directores">
                </a>
              </div>
            </div>

            <div id="popup" title="Registro de Director de Programa" style="display:none">

            </div>


            <div class="wrapper">
              <br>
              <label class="textoRadioButton">FILTRAR POR: &nbsp;</label>
              <input type="radio" name="filtro" id="codigo" value="0"> <span class="textoRadioButton">CODIGO </span>
              &nbsp; &nbsp;
              <input type="radio" name="filtro" id="dependencia" value="1"> <span class="textoRadioButton">DEPENDENCIA
              </span> &nbsp; &nbsp;
              <input type="radio" name="filtro" id="nombre" value="2"> <span class="textoRadioButton">NOMBRE </span>
              &nbsp; &nbsp; &nbsp;

              <input type="text" id="myInput" placeholder="Buscar ...">

              <select class="textoSelectActivo" style="float: right;" type="text" id="mySelect"
                placeholder="Buscar ...">
                <option class="textoSelectActivo" value="Activo">Activo </option>
                <option class="textoSelectActivo" value="Inactivo">Inactivo</option>
              </select>

              <!-- INICIO TABLA -->

              

              <table id="myTable" class="table table-hover">
                <thead>
                  <tr class="header">
                    <th>Codigo</th>
                    <th>Nombre y Apellido</th>
                    <th>correo</th>
                    <th>fecha de registro</th>
                    <th>ESTADO</th>
                    <th>OPCIONES</th>
                  </tr>

                </thead>

                <tr>
                  <h1 id="respuesta">
                  </h1>
                </tr>

                <tbody>
                  <tr>
                    <td>0021541</td>
                    <td>Richard Acevedo</td>
                    <td>richardalexanderar@ufps.edu.co</td>
                    <td>26-08-2020 1:45 P.M.</td>
                    <td>Activo</td>
                    <td>
                      <center>
                        <button id="iconoVer">
                          <img src="view/assets/img/ver.png">
                        </button>
                        &nbsp &nbsp
                        <button id="iconoEditar">
                          <img src="view/assets/img/editar.png">
                        </button>
                      </center>
                    </td>
                  </tr>
                </tbody>

              </table>

              <br>

              <nav id="paginacion">
                <ul class="pagination pagination-lg pager" id="myPager">

                </ul>
              </nav>


              <!-- FIN TABLA -->

            </div>
          </article>
          <article id="tab4">
            <div>
              <div class="btn-agregarUsuario">
                <a id="lanzarRegistroCorreo" >
                  <img src="view/assets/img/agregar-usuario.png" alt="Agregar Correo"
                    title="Añadir nuevo Correo">
                </a>
              </div>
              <div class="btn-agregarExcel">
                <a href="" target="_blank">
                  <img src="view/assets/img/añadir-excel.png" alt="Carga masiva de Correos"
                    title="Carga masiva de Correos">
                </a>
              </div>
            </div>

            <div id="popupCorreo" class="simple" title="Registro de Correos" style="display:none">
                <form id="formNewCorreo" action="index.php?c=user&a=addCorreo" method="post"> 
                  <center><input type="email" name="email" placeholder="Nuevo Correo" />
                  <center><input type="submit" value="Agregar" />
                </form>
            </div>


            <div class="wrapper">
              <br>
              
              <input style="float: right;" type="text" id="myInput" placeholder="Buscar Correo...">



              <!-- INICIO TABLA -->

              <table id="myTable" class="table table-hover">
                <thead>
                  <tr class="header">
                    <th>id</th>
                    <th>Correo Institucional</th>
                    <th>OPCIONES</th>
                  </tr>

                </thead>

                <tr>
                  <h1 id="respuesta">
                  </h1>
                </tr>


                <tbody>
                  <?php 
                  
                  if($data["correos"] != NULL){
                    foreach($data["correos"] as $correo) {
                      echo "<tr>";
                      echo "<td>".$correo["id"]."</td>";
                      echo "<td>".$correo["email"]."</td>";
  
                      echo "<td><a href='index.php?c=user&a=eliminarCorreo&id=".$correo["id"]."'><span id='iconoEliminar'><img src='view/assets/img/eliminar.png' title='Eliminar'></span></a></td>";
  
                      echo "</tr>";
                    }
                  }else{
                    echo "<td>No hay Correos Registrados</td>";
                  }
                  
                  ?>
                </tbody>

              </table>
              
              <br>

              <nav id="paginacion">
                <ul class="pagination pagination-lg pager" id="myPager">

                </ul>
              </nav>


              <!-- FIN TABLA -->

            </div>
          </article>
        </div>
      </div>
      <div class="clearfix"></div>
    </section>
  </section>

  <script type="text/javascript" src="view/assets/js/paginacion.js"></script>


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