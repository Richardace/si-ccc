<div id="grid-container">
    <div id="informacion">
        <div id="fecha">
        <!-- Cargar Reloj -->
        </div>
        <br>
    </div>
    <div id="control">
        <div id="opciones">
            <div class="container">

                <input type="checkbox" id="toggle">

                <label for="toggle" class="button"><?php echo $_SESSION['name']; ?> &nbsp<span class="flecha-down"></span></label>

                <nav class="controlMenu">
                    <ul>
                        <a href="config/logoutEvaluador.php">Cerrar Sessión</a>
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
