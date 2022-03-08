<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Alberto Fernandez Ramirez">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="index, follow">
        <meta name="application-name" content="Final">
        <meta name="description" content="Aplicacion Final">
        <link href="../207DWESAplicaccionFinalAlberto2022/webroot/css/estiloejercicio.css" rel="stylesheet" type="text/css">
        <link rel="icon" href="../207DWESAplicaccionFinalAlberto2022/webroot/css/img/home.png" type="image/x-icon">
        <title>Aplicacion Final Alberto</title>
        <script>
            window.addEventListener("load", reloj);
            function reloj() {
                function moverReloj(){
                    var lista = document.getElementById("div1");
                    lista.innerHTML="";
                    var fechaActual = new Date();
                    var hora = fechaActual.getHours();
                    var minuto = fechaActual.getMinutes();
                    var segundo = fechaActual.getSeconds();
                    var primerahora = parseInt(hora/10);
                    var segundahora = parseInt(hora%10);
                    var primeraminuto = parseInt(minuto/10) ;
                    var segundaminuto = parseInt(minuto%10);
                    var primerasegundo = parseInt(segundo/10);
                    var segundasegundo = parseInt(segundo%10);
                    var dospuntos = 104;
                    var mostrarHora = crearImagen(primerahora) + crearImagen(segundahora)  + crearImagen(dospuntos) + crearImagen(primeraminuto) + crearImagen(segundaminuto) + crearImagen(dospuntos) + crearImagen(primerasegundo) + crearImagen(segundasegundo);
                    var lista = document.getElementById("div1");
                    var nuevoElemento = document.createElement("div");
                    nuevoElemento.innerHTML=mostrarHora;
                    setTimeout(moverReloj, 1000);
                }

                function crearImagen(numero) {
                    var img = document.createElement("img");
                    img.setAttribute("src",`../207DWESAplicaccionFinalAlberto2022/webroot/css/img/reloj/${numero}.png`);
                    img.width="25";
                    img.height="25";
                    img.alt = `${numero}`;
                    var src = document.getElementById("div1");
                    src.appendChild(img);
                }
                setTimeout(moverReloj, 1000);
            }
            
            //Funcion para mostrar un mensaje de confirmacion antes de eliminar el departamento
            function confirmarEliminar(){
                var respuesta = confirm("¿Estas seguro que quieres eliminar el departamento?");
                if(respuesta == true){
                    return true;
                }else{
                    return false;
                }
            }
            
            //Funcion para mostrar un mensaje de confirmacion antes de dar de baja el departamento
            function confirmarDarDeBaja(){
                var respuesta = confirm("¿Estas seguro que quieres dar de baja el departamento?");
                if(respuesta == true){
                    return true;
                }else{
                    return false;
                }
            }
        </script>
    </head>
    <body>
        
        <?php require_once $vistas[$_SESSION['paginaEnCurso']];?>
        
        <footer class="piepagina">
            <div class="divTecnologias">
                <a href="../207DWESAplicaccionFinalAlberto2022/doc/index.html" target="_blank">
                    <img src="../207DWESAplicaccionFinalAlberto2022/webroot/css/img/phpdoc.png" class="imagephpdoc" alt="IconoPHPDOC" title="Documentacion phpDoc"/>
                </a>
                <a href="https://www.tesla.com/es_ES" target="_blank">
                    <img src="../207DWESAplicaccionFinalAlberto2022/webroot/css/img/webimitada.png" class="imagewebimitada" alt="IconoWebImitada" title="Web imitada"/>
                </a>
                <form method="post" class="formularioTecnologias">
                    <button type="submit" name="tecnologias" value="tecnologias" class="tecnologias">
                        <img src="../207DWESAplicaccionFinalAlberto2022/webroot/css/img/tecnologias.png" class="imagetecnologias" alt="IconoTecnologias" title="Tecnologias y herramientas usadas"/>
                    </button>
                </form>
                <a href="../207DWESAplicaccionFinalAlberto2022/webroot/rss.xml" target="_blank">
                    <img src="../207DWESAplicaccionFinalAlberto2022/webroot/css/img/rss.png" class="imagerss" alt="IconoRSS" title="RSS"/>
                </a>
                <a href="../207DWESAplicaccionFinalAlberto2022/webroot/css/pdf/curriculumweb.pdf" target="_blank">
                    <img src="../207DWESAplicaccionFinalAlberto2022/webroot/css/img/cv.png" class="imagecv" alt="IconoCV" title="Curriculum Vitae"/>
                </a>
                <a href="https://github.com/AlbertoFRSauces/207DWESAplicaccionFinalAlberto2022" target="_blank">
                    <img src="../207DWESAplicaccionFinalAlberto2022/webroot/css/img/github.png" class="imagegithub" alt="IconoGitHub" title="Repositorio GitHub"/>
                </a>
            </div>
            <p><a class="miweb" href="http://daw207.ieslossauces.es/index.php">Alberto Fernández Ramírez</a><a>&nbsp;&copy;</a> 2022 &nbsp;&nbsp;Release 4.1 &nbsp;&nbsp;Ultima actualización: 08/03/2022</p>
        </footer>
    </body>
</html>
