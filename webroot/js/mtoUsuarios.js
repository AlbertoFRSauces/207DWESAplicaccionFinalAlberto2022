var botonBuscar = document.getElementById("buscar");

loadJSONDoc();

botonBuscar.addEventListener("click", function () {
    loadJSONDoc();
});

function loadJSONDoc() {
    var descripcionUsuario = document.getElementById("descUsuario").value;
    var filas = document.getElementById("usuarios");
    var divErrorBuscar = document.getElementById("divBuscar");
    var xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        if (this.readyState == 4 && this.status == 200) {
            objetoJSON = JSON.parse(xhttp.responseText);
            var aUsuarios = objetoJSON.usuarios;
            filas.innerHTML = "";
            for (var i = 0; i < aUsuarios.length; i++) {
                if (objetoJSON.usuarios[i].result == "unsuccessful") {
                    error = objetoJSON.usuarios[i].mensajeError;
                    nuevoElementoError = document.createElement("p");
                    nuevoElementoError.innerHTML = error;
                    nuevoElementoError.classList.add("mensajeErrorUsuario");
                    divErrorBuscar.appendChild(nuevoElementoError);
                } else {
                    codigo = objetoJSON.usuarios[i].codUsuario;
                    descripcion = objetoJSON.usuarios[i].descUsuario;
                    conexiones = objetoJSON.usuarios[i].numconexiones;
                    ultimaconexion = objetoJSON.usuarios[i].fechaHoraUltimaConexion;
                    let oFecha = new Date(ultimaconexion * 1000);
                    ultimaConexionMostrar = `${oFecha.getDate()}/${oFecha.getMonth() + 1}/${oFecha.getFullYear()} ${oFecha.getHours()}:${oFecha.getMinutes()}:${oFecha.getSeconds()}`;
                    perfil = objetoJSON.usuarios[i].perfil;
                    imagen = objetoJSON.usuarios[i].imagenUsuario;
                    nuevoElemento = document.createElement("tr");
                    nuevoElementoCodigo = document.createElement("td");
                    nuevoElementoDescripcion = document.createElement("td");
                    nuevoElementoConexiones = document.createElement("td");
                    nuevoElementoUltimaconexion = document.createElement("td");
                    nuevoElementoPerfil = document.createElement("td");
                    nuevoElementoImagen = document.createElement("td");
                    nuevoElementoCodigo.setAttribute("id", "eliminar");
                    nuevoElementoDescripcion.setAttribute("id", "eliminar");
                    nuevoElementoConexiones.setAttribute("id", "eliminar");
                    nuevoElementoUltimaconexion.setAttribute("id", "eliminar");
                    nuevoElementoPerfil.setAttribute("id", "eliminar");
                    nuevoElementoImagen.setAttribute("id", "eliminar");
                    nuevoElementoCodigo.innerHTML = codigo;
                    nuevoElementoDescripcion.innerHTML = descripcion;
                    nuevoElementoConexiones.innerHTML = conexiones;
                    nuevoElementoUltimaconexion.innerHTML = ultimaConexionMostrar;
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
    //Clase
    //xhttp.open("GET", `http://daw207.sauces.local/207DWESAplicaccionFinalAlberto2022/api/buscarUsuarioPorDesc.php?descUsuario=${descripcionUsuario}`, true);
    //1&1
    xhttp.open("GET", `https://daw207.ieslossauces.es/207DWESAplicaccionFinalAlberto2022/api/buscarUsuarioPorDesc.php?descUsuario=${descripcionUsuario}`, true);
    //Casa
    //xhttp.open("GET", `http://192.168.1.107/207DWESAplicaccionFinalAlberto2022/api/buscarUsuarioPorDesc.php?descUsuario=${descripcionUsuario}`, true);
    xhttp.send();
}