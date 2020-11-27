<div id="grid-container">
    <div id="informacion">
        <div id="fecha">
        <!-- Cargar Reloj -->
        </div>
        <div style="margin-top: 5px;">
            <?php 
            if($_SESSION['rol_id'] == 1){
                echo "<strong>ADMINISTRADOR</strong>";
            }else if($_SESSION['rol_id'] == 2){
                echo "<strong>SOLICITANTE</strong>";
            }else{
                echo "<strong>EVALUADOR</strong>";
            }
            ?>
        </div>

        <br>
    </div>
    <div id="control">
        <div id="opciones">
            <div class="container">

                <input type="checkbox" id="toggle">

                <label for="toggle" class="button"><?php echo $_SESSION['name']; ?> &nbsp;<span class="flecha-down"></span></label>

                <nav class="controlMenu">
                    <ul>
                        <a href="config/logout.php">Cerrar Sessión</a>
                        <a href="index.php?c=login&a=configuracionView&id=<?php echo $_SESSION['id']; ?>">Configuración</a>
                    </ul>
                </nav>

            </div>
        </div>
    </div>
</div>
<div id="slider">
    <div class="bxslider">
        <div><img src="view/assets/img/banner.png"></div>
    </div>
</div>
<div class="clearfix">

</div>

<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light" id="menu">
    <div class="collapse navbar-collapse">
        <?php
            //include('menu.php');
        ?>
        </div>
</nav> -->

<?php
            include('menu.php');
        ?>
