<!-- <ul >
    <li ><a id="message" href="index.php?c=message&a=administrador">Mensajeria</a></li>
    <li ><a id="documentos" href="index.php?c=documento&a=administrador">Documentos</a></li>
    <li ><a id="estados" href="index.php?c=estado&a=administrador">Estados</a></li>
    <li ><a id="personal" href="index.php?c=personal&a=administrador">Personal</a></li>
    <li ><a id="consultas" href="index.php?c=consulta&a=administrador">Consultas</a></li>
</ul> -->

<nav class="navbar navbar-expand-lg" id="menu">
    <button style="background: #dc3545;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" >
        <span class="navbartext" style="color:white; font-size: 15px; float:left;">MENU</span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li><a id="message" href="index.php?c=message&a=administrador&id=<?php echo $_SESSION['id']; ?>">Mensajeria</a></li>
            <li><a id="documentos" href="index.php?c=documento&a=administrador">Documentos</a></li>
            <li><a id="estados" href="index.php?c=estado&a=administrador">Estados</a></li>
            <li><a id="personal" href="index.php?c=personal&a=administrador">Personal</a></li>
            <li><a id="consultas" href="index.php?c=consulta&a=administrador">Consultas</a></li>
        </ul>
    </div>
</nav>