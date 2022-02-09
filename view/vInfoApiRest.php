<header class="tituloaplicacion">
    <p class="tituloh1"><img src="../207DWESAplicaccionFinalAlberto2022/webroot/css/img/logotipo.png" class="imagelogo" alt="IconoWebImitada" /></p><p class="tituloh2">Información API</p>
</header>
<form class="buttonback">
    <input type="submit" value="VOLVER" name="volverinforest" class="volverdetalle"/>
</form>
<div class="descripcionapipropia">
    <div class="descripcionapipropia2">
        <p class="tituloiniciarsesion">Informacion de uso de API Buscar Departamento<p>
        <p class="textoapipropia">
            <strong>Breve descripcion de la API:</strong>
            <br>
            Permite buscar la informacion de un departamento pasando un codigo de departamento. El formato del campo es un codigo de departamento de tres letras.
            <br>
            <strong>Enlace web de la API:</strong>
            <br>
            {$codDepartamento} = codigo de departamento. Ejemplo: BIO
            <br>
            <u><a href="http://daw207.ieslossauces.es/207DWESAplicaccionFinalAlberto2022/api/buscarDepartamento.php?codDepartamento={$codDepartamento}" class="enlaceapi" target="_blank">http://daw207.ieslossauces.es/207DWESAplicaccionFinalAlberto2022/api/buscarDepartamento.php?codDepartamento=<strong>{$codDepartamento}</strong></a></u>
            <br>
            <strong>Uso del valor 'result':</strong>
            <br>
            El resultado de la api contendra siempre un valor llamado 'result', este valor devolvera 'success' en caso de que el codigo de departamento pasado sea correcto. Si el codigo de departamento es incorrecto o surge cualquier otro error el valor de la variable sera 'unsuccessful'.
            <br>
            Si el campo es incorrecto, tambien contendra un valor llamado 'mensajeError' que devolvera el tipo de error que se ha producido.
            <br>
            <strong>Devolucion correcta:</strong>
            <br>
            Si el codigo introducido es correcto nos guardara la informacion en los valores correspondientes: 'codDepartamento', 'descDepartamento', 'fechaCreacionDepartamento', 'volumenDeNegocio', 'fechaBajaDepartamento' 
        </p>
    </div>
</div>
