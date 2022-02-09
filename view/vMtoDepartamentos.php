<header class="tituloaplicacion">
    <p class="tituloh1"><img src="../207DWESAplicaccionFinalAlberto2022/webroot/css/img/logotipo.png" class="imagelogo" alt="IconoWebImitada" /></p><p class="tituloh2">Mto Departamentos</p>
</header>
<form class="buttonback">
    <input type="submit" value="VOLVER" name="volverdepartamentos" class="volverdetalle"/>
</form>
<div class="cajadepartamentos">
    <form name="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form">
        <fieldset class="fieldsetdepartamentos">
            <p class="titulometodepartamentos">  MtoDepartamentos 
                <input class="botonesdepartamentos" id="add" type="submit" name="add" value="Añadir"/>
                <input class="botonesdepartamentos" id="export" type="submit" name="export" value="Exportar"/>
                <input class="botonesdepartamentos" id="import" type="submit" name="import" value="Importar"/>
            </p>
            <ul>
                <!--Campo Alfabetico DescDepartamento OBLIGATORIO para realizar la busqueda-->
                <li>
                    <div>
                        <label for="descDepartamento"><a class="pBuscarDepartamento">Buscar por descripcion de departamento</a></label>
                        <input name="descDepartamento" id="descDepartamento" type="text" value="<?php echo isset($_REQUEST['descDepartamento']) ? $_REQUEST['descDepartamento'] : '';  ?>" placeholder="Introduzca la descripcion">
                        <!--Campo Boton Enviar-->
                        <input class="enviar" id="enviar" type="submit" name="enviar" value="Buscar"/>
                        <p class="mensajeErrorDepartamento"><?php echo $aErrores['descDepartamento'] ?></p>
                    </div>
                </li>
            </ul>
        </fieldset>
    </form>
</div>
<div class="cajadepartamentos">
    <table class="tabladepartamentos">
        <tr>
            <th>CodDepartamento</th>
            <th>DescDepartamento</th>
            <th>FechaBaja</th>
            <th>VolumenNegocio</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="botonestabla"><a><img src="../207DWESAplicaccionFinalAlberto2022/webroot/css/img/lapiz.png" class="imagenboton" alt="Lapiz" /></a></td>
            <td class="botonestabla"><img src="../207DWESAplicaccionFinalAlberto2022/webroot/css/img/ojo.png" class="imagenboton" alt="Ojo" /></td>
            <td class="botonestabla"><img src="../207DWESAplicaccionFinalAlberto2022/webroot/css/img/papelera.png" class="imagenboton" alt="Papelera" /></td>
        </tr>
    </table>
</div>