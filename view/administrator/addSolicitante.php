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
      
      <div>
      <h2>Añadir nuevo Solicitante</h2>
        <form method="post" action="index.php?c=personal&a=addSolicitante">

            <input type="radio" id="programa" name="dependency" value="program">
            <label for="program">Programa Academico</label><br>
            <input type="radio" id="departamento" name="dependency" value="department">
            <label for="department">Departamento</label><br>
            <input type="radio" id="facultad" name="dependency" value="facultad">
            <label for="facultad">Facultad</label>
            <br>


            <?php
                foreach($data["correo"] as $correo){
                    echo "<input type='text' name='correo' value='".$correo["email"]."' readonly />";
                } 
            ?>


            <select id="selectPrograma" name="idProgram" style="display: none;">
                <option>Elija el Programa Academico</option>
                <?php
                    foreach($data["programas"] as $programa){
                        echo "<option value='".$programa['id']."'>".$programa['name']."</option>";
                    } 
                ?>
            </select>

            <select id="selectDepartamento" style="display: none;">
                <option value="">Elija el Departamento</option>
            </select>

            <select id="selectFacultad" style="display: none;">
                <option value="">Elija la Facultad</option>
            </select>
            
            <select id="state" name="state" style="display: none;">
                <option value="Inactivo">Estado .. </option>
                <option value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>
            </select>
            
            <br>
            <input type="submit" value="Añadir" />

        </form>
      </div>
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