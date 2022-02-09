<header class="tituloaplicacion">
    <p class="tituloh1"><img src="../207DWESAplicaccionFinalAlberto2022/webroot/css/img/logotipo.png" class="imagelogo" alt="IconoWebImitada" /></p><p class="tituloh2">Inicio Privado</p>
    <form class="formularioPrograma2" method="post">
        <input type="submit" value="CERRAR SESION" name="cerrarsesion" class="cerrarsesion"/>
    </form>
</header>

<h1 class="usuario">
    <?php
// Si el usuario tiene imagen de usuario, la muestra. Si no, muestra una de las de por defecto.
if (!empty($sImagenUsuario)) {
    ?>
    <img src="../207DWESAplicaccionFinalAlberto2022/webroot/css/img/perfilusuario/<?php echo $sImagenUsuario ?>" alt="imagen de usuario" class="imageperfil">
<?php } else { ?>
    <img src="../207DWESAplicaccionFinalAlberto2022/webroot/css/img/perfilusuario/perfilusuario.png" alt="imagen de usuario" class="imageperfil"/>
<?php } 
?>
    <?php echo "Bienvenid@ " . $sDescUsuario ?></h1>
<h3 class="conexiones"><?php echo "Esta es la " . $iNumConexiones . " vez que te conectas!" ?></h3>
<h3 class="conexiones"><?php
    if (!empty($sFechaHoraUltimaConexionAnterior)) {
        echo "La ultima vez que te conectastes fue " . date('d/m/Y H:i:s', $sFechaHoraUltimaConexionAnterior);
    }
    ?>
</h3>
<form class="formularioPrograma1" method="post">
    <input type="submit" value="EDITAR PERFIL" name="editarperfil" class="editarperfil"/>
    <input type="submit" value="DETALLE" name="detalle" class="detalle"/>
    <input type="submit" value="REST" name="rest" class="rest"/>
<?php if ($sCodUsuario == 'admin'){ ?>
    <input type="submit" value="MTO CUESTIONES" name="mtocuestiones" class="mtoDepartamentos"/>
    <input type="submit" value="MTO USUARIOS" name="mtousuarios" class="mtoDepartamentos"/>
<?php } else{ ?>
    <input type="submit" value="MTO DEPARTAMENTOS" name="mtodepartamentos" class="mtoDepartamentos"/>
    <input type="submit" value="MTO OPINIONES" name="mtoopiniones" class="mtoDepartamentos"/>
<?php } ?>
</form>
<div id="camporeloj">
    <div id="div1"></div>
</div>