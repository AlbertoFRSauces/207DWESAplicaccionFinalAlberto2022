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
                        <input id="buscar" type="submit" value="Buscar"/>
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
    </table>
</div>
<script>
    var botonBuscar = document.getElementById("buscar");
    
    loadJSONDoc();
    
    botonBuscar.addEventListener("click", function(evento){
        loadJSONDoc();
    });
    
    function loadJSONDoc() {
        var descripcionUsuario = document.getElementById("descUsuario").value;
        var filas = document.getElementById("tablausuarios");
        var divErrorBuscar = document.getElementById("divBuscar");
        var xhttp = new XMLHttpRequest();
        xhttp.onload = function () {
            if (this.readyState == 4 && this.status == 200) {
                objetoJSON = JSON.parse(xhttp.responseText);
                var aUsuarios = objetoJSON.usuarios;
                for(var i=0;i<aUsuarios.length;i++){
                    if(objetoJSON.usuarios[i].result == "unsuccessful"){
                        error = objetoJSON.usuarios[i].mensajeError;
                        nuevoElementoError = document.createElement("p");
                        nuevoElementoError.innerHTML = error;
                        nuevoElementoError.classList.add("mensajeErrorUsuario");
                        divErrorBuscar.appendChild(nuevoElementoError);
                    }else{
                        codigo = objetoJSON.usuarios[i].codUsuario;
                        descripcion = objetoJSON.usuarios[i].descUsuario;
                        conexiones = objetoJSON.usuarios[i].numconexiones;
                        ultimaconexion = objetoJSON.usuarios[i].fechaHoraUltimaConexion;
                        perfil = objetoJSON.usuarios[i].perfil;
                        imagen = objetoJSON.usuarios[i].imagenUsuario;
                        nuevoElemento = document.createElement("tr");
                        nuevoElementoCodigo = document.createElement("td");
                        nuevoElementoDescripcion = document.createElement("td");
                        nuevoElementoConexiones = document.createElement("td");
                        nuevoElementoUltimaconexion = document.createElement("td");
                        nuevoElementoPerfil = document.createElement("td");
                        nuevoElementoImagen = document.createElement("td");
                        nuevoElementoCodigo.innerHTML = codigo;
                        nuevoElementoDescripcion.innerHTML = descripcion;
                        nuevoElementoConexiones.innerHTML = conexiones;
                        nuevoElementoUltimaconexion.innerHTML = ultimaconexion;
                        nuevoElementoPerfil.innerHTML = perfil;
                        nuevoElementoImagen.innerHTML = imagen;
                        nuevoElemento.appendChild(nuevoElementoCodigo);
                        nuevoElemento.appendChild(nuevoElementoDescripcion);
                        nuevoElemento.appendChild(nuevoElementoConexiones);
                        nuevoElemento.appendChild(nuevoElementoUltimaconexion);
                        nuevoElemento.appendChild(nuevoElementoPerfil);
                        nuevoElemento.appendChild(nuevoElementoImagen);
                        filas.appendChild(nuevoElemento);
                    }
                }
            }
        }
        xhttp.open("GET", `https://daw207.ieslossauces.es/207DWESAplicaccionFinalAlberto2022/api/buscarUsuarioPorDesc.php?descUsuario=${descripcionUsuario}`, true);
        xhttp.send();
    }
</script>

