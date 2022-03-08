<header class="tituloaplicacion">
    <p class="tituloh1"><img src="../207DWESAplicaccionFinalAlberto2022/webroot/css/img/logotipo.png" class="imagelogo" alt="IconoWebImitada" /></p><p class="tituloh2">Mto Usuarios</p>
</header>
<form class="buttonback">
    <input type="submit" value="VOLVER" name="volverusuarios" class="volverdetalle"/>
</form>
<div class="cajadepartamentos">
    <form name="formulario" class="form">
        <fieldset class="fieldsetusuarios">
            <p class="titulometodepartamentos">MtoUsuarios 
                <input class="botonesdepartamentos" id="add" type="submit" name="add" value="Añadir"/>
                <input class="botonesdepartamentos" id="export" type="submit" name="export" value="Exportar"/>
                <input class="botonesdepartamentos" id="import" type="submit" name="import" value="Importar"/>
            </p>
            <ul>
                <!--Campo Alfabetico DescDepartamento OPCIONAL para realizar la busqueda-->
                <li>
                    <div id="divBuscar">
                        <label for="descUsuario"><a class="pBuscarDepartamento">Buscar por descripcion de usuario</a></label>
                        <input name="descUsuario" id="descUsuario" class="descUsuarioBuscar" type="text" placeholder="Introduzca la descripcion">
                        <input id="buscar" type="button" value="Buscar"/>
                    </div>
                </li>
            </ul>
        </fieldset>
    </form>
</div>
<div class="cajadepartamentos">
    <table id="tablausuarios" class="tablausuarios"> 
        <tr>
            <th>Código</th>
            <th>Descripción</th>
            <th>Conexiones</th>
            <th>Última Conexion</th>
            <th>Perfil</th>
            <th>Imagen</th>
        </tr>
        <tbody id="usuarios">
            
        </tbody>
    </table>
</div>
<script  src="webroot/js/mtoUsuarios.js">
</script>

