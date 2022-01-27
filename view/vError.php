<header class="tituloaplicacion">
    <h1 class="tituloh1"><img src="../207DWESAplicaccionFinalAlberto2022/webroot/css/img/logotipo.png" class="imagelogo" alt="IconoWebImitada" /></h1><h2 class="tituloh2">Error</h2>
</header>
<form class="buttonback">
    <input type="submit" value="VOLVER" name="volvererror" class="volverdetalle"/>
</form>
<h3 class="tituloerror">Se ha producido el siguiente error:</h3>
<table class="tablaerror">
    <tr>
        <th>Codigo</td>
        <td><?php echo $sCodError ?></td>
    </tr>
    <tr>
        <th>Descripcion</th>
        <td><?php echo $sDescError ?></td>
    </tr>
    <tr>
        <th>Archivo</th>
        <td><?php echo $sArchivoError ?></td>
    </tr>
    <tr>
        <th>Línea</th>
        <td><?php echo $iLineaError ?></td>
    </tr>
</table>




