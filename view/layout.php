<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Alberto Fernandez Ramirez">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="index, follow">
        <meta name="application-name" content="Login y logout">
        <meta name="description" content="Control de acceso e identificación de un usuario">
        <link href="../207DWESLoginLogoutMulticapaPOO/webroot/css/estilo.css" rel="stylesheet" type="text/css">
        <link href="../207DWESLoginLogoutMulticapaPOO/webroot/css/estiloejercicio.css" rel="stylesheet" type="text/css">
        <link rel="icon" href="../207DWESLoginLogoutMulticapaPOO/webroot/css/img/home.png" type="image/x-icon">
        <title>Index Login y Logout Tema 5</title>
        <style>
            #div1{
                height: 50vh;
                width: 100vw;
                display: flex;
                align-items: center;
                justify-content: center;
            }
        </style>
    </head>
    
    <body>
        <header class="tituloaplicacion">
            <h1>207DWESLoginLogoutMulticapaPOO</h1>
        </header>
        
        <?php require_once $vistas[$_SESSION['paginaEnCurso']];?>
        
        <footer class="piepagina">
            <a href="../proyectoDWES/indexProyectoDWES.php"><img src="../207DWESLoginLogoutMulticapaPOO/webroot/css/img/atras.png" class="imageatras" alt="IconoAtras" /></a>
            <a href="https://github.com/AlbertoFRSauces/207DWESLoginLogoutMulticapaPOO" target="_blank"><img src="../207DWESLoginLogoutMulticapaPOO/webroot/css/img/github.png" class="imagegithub" alt="IconoGitHub" /></a>
            <p><a>&copy;</a><a href="http://daw207.ieslossauces.es/index.php">Alberto Fernández Ramírez</a> 29/09/2021 Todos los derechos reservados.</p>
            <p>Ultima actualización: 19/01/2022 22:27 - Release 2.0</p>
        </footer>
    </body>
</html>
