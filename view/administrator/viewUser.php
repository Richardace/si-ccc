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

  <!-- Estilo css Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <!-- Scripts Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
  </script>


  <!-- JQuery-->
  <link rel="stylesheet" href="view/assets/js/jquery-ui/jquery-ui.min.css" />
  <link rel="stylesheet" href="view/assets/js/jquery-ui/jquery-ui.structure.min.css" />
  <link rel="stylesheet" href="view/assets/js/jquery-ui/jquery-ui.theme.min.css" />
  <script type="text/javascript" src="view/assets/js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="view/assets/js/jquery-2-2-1.min.js"></script>
  <script type="text/javascript" src="view/assets/js/jquery-ui/jquery-ui.min.js"></script>

  <!-- Moment JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.28.0/moment.min.js" integrity="sha512-Q1f3TS3vSt1jQ8AwP2OuenztnLU6LwxgyyYOG1jgMW/cbEMHps/3wjvnl1P3WTrF3chJUWEoxDUEjMxDV8pujg==" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.28.0/locale/es.min.js" integrity="sha512-/HmEBBS8qan4uG3ClUfdNMUOprD0g4BNcJnOBh153mBMs16U92xULl8QS9A37/vLW17epcNp0t0fDOYWjpG73Q==" crossorigin="anonymous"></script>

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

    <?php
    foreach ($data["usuario"] as $usuario) {
              
         $id=$usuario['id'];
         $firstName=$usuario['firstName'];
         $lastName= $usuario['lastName'];
         $email= $usuario['email'];
         $state= $usuario['state'];
         $rol_id=$usuario['rol_id'];
         
         if($rol_id==1){
            $rol_id=='administrador';
         }else if($rol_id==2){
            $rol_id=='solicitante';
         }else{
            $rol_id=='evaluador';
         }
         
         
        
        }
            
       $fullName= $firstName ." ".$lastName;     
    ?>
            

      <div class="card text-center">
        <div class="card-header" style="color: white; font-weight: bold; background:rgb(226, 3, 26); text-transform: uppercase;">
          VER INFORMACION DE <?php echo $fullName; ?>
        </div>
        <div class="card-body">

            <label>Nombre del Usuario </label>
            <input value="<?php echo $firstName; ?>">
<br>
            <label>Apellido del Usuario </label>
            <input value="<?php echo $lastName; ?>">

          <form method="post" action="index.php?c=personal&a=addSolicitante">
            <br>
            <input type="radio" id="programa" name="dependency" value="program">
            <label for="program">Programa Academico</label>&nbsp;&nbsp;&nbsp;
            <input type="radio" id="departamento" name="dependency" value="department">
            <label for="department">Departamento</label>&nbsp;&nbsp;&nbsp;
            <input type="radio" id="facultad" name="dependency" value="facultad">
            <label for="facultad">Facultad</label>
            <br>
            <br>

            <?php
            foreach ($data["correo"] as $correo) {
              echo " <label for='formGroupExampleInput'>Correo Electronico</label>";
              echo "<center><input type='text' style='width:40%;' name='correo' class='form-control' id='formGroupExampleInput' value='" . $correo["email"] . "' readonly>";
            }
            ?>
            <br>

            <div id="selectPrograma" style="display: none;">
              <label for="inputState">Elija el Programa Academico</label><br>
              <select id="selectPrograma" class="form-control" name="idProgram" style="width:40%;">
                <option>Elija el Programa Academico</option>
                <?php
                foreach ($data["programas"] as $programa) {
                  echo "<option value='" . $programa['id'] . "'>" . $programa['name'] . "</option>";
                }
                ?>
              </select>
            </div>

            <div id="selectDepartamento" style="display: none;">
              <label for="inputState">Elija el Departamento</label><br>
              <select class="form-control" name="idDepartamento" style="width:40%;">
                <option>Elija el Departamento</option>
                <?php
                foreach ($data["departamentos"] as $programa) {
                  echo "<option value='" . $programa['id'] . "'>" . $programa['name'] . "</option>";
                }
                ?>
              </select>
            </div>

            <div id="selectFacultad" style="display: none;">
              <label for="inputState">Elija el Departamento</label><br>
              <select class="form-control" name="idFacultad" style="width:40%;">
                <option>Elija la Facultad</option>
                <?php
                foreach ($data["facultades"] as $programa) {
                  echo "<option value='" . $programa['id'] . "'>" . $programa['name'] . "</option>";
                }
                ?>
              </select>
            </div>

            <br>

            <div id="state" style="display: none;">
              <label for="inputState">Seleccione el estado del usuario</label><br>
              <select name="state" style="width:40%;">
                <option value="Inactivo">Estado .. </option>
                <option value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>
              </select>
            </div>

            <br>

            <input id="agregar" type="submit" value="Añadir" class="btn btn-primary" style="background:rgb(226, 3, 26); border:none; color:white; display: none;" />

          </form>
        </div>
        <div class="card-footer text-muted" style="color: white; font-weight: bold; background:rgb(226, 3, 26);">

        </div>
      </div>
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