<header class="tituloaplicacion">
    <p class="tituloh1"><img src="../207DWESAplicaccionFinalAlberto2022/webroot/css/img/logotipo.png" class="imagelogo" alt="IconoWebImitada" /></p><p class="tituloh2">Inicio Privado</p>
</header>
    <h1 class="usuario"><?php echo "Bienvenid@ " . $sDescUsuario ?></h1>
    <h3 class="conexiones"><?php echo "Esta es la " . $iNumConexiones . " vez que te conectas!" ?></h3>
    <h3 class="conexiones"><?php 
        if (!empty($sFechaHoraUltimaConexionAnterior)) { 
            echo "La ultima vez que te conectastes fue " . date('d/m/Y H:i:s', $sFechaHoraUltimaConexionAnterior);     
        }?>
    </h3>
<form class="formularioPrograma" method="post">
    <input type="submit" value="CERRAR SESION" name="cerrarsesion" class="cerrarsesion"/>
    <input type="submit" value="EDITAR PERFIL" name="editarperfil" class="editarperfil"/>
    <input type="submit" value="MTO DEPARTAMENTOS" name="mtodepartamentos" class="mtoDepartamentos"/>
    <input type="submit" value="DETALLE" name="detalle" class="detalle"/>
    <input type="submit" value="REST" name="rest" class="rest"/>
</form>
