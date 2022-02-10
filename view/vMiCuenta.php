<header class="tituloaplicacion">
    <p class="tituloh1"><img src="../207DWESAplicaccionFinalAlberto2022/webroot/css/img/logotipo.png" class="imagelogo" alt="IconoWebImitada" /></p><p class="tituloh2">Editar Perfil</p>
</header>
<form name="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="formMiCuenta">
    <fieldset>
        <p class="tituloMiCuenta">Editar Perfil de Usuario<p>
        <ul>
            <!--Campo Usuario OBLIGATORIO -->
            <li>
                <div>
                    <label for="CodUsuario"><p class="pUsuario">Usuario</p></label>
                    <input name="CodUsuario" id="CodUsuario2" type="text" value="<?php echo $aUsuario['usuarioMiCuenta'] ?>" readonly disabled>
                </div>
            </li>
            <!--Campo Descripcion OBLIGATORIO-->
            <li>
                <div>
                    <label for="DescUsuario"><p class="pDescripcion">Descripcion*</p></label>
                    <input name="DescUsuario" id="DescUsuario2" type="text" value="<?php echo isset($_REQUEST['DescUsuario']) ? $_REQUEST['DescUsuario'] : $aUsuario['descripcionMiCuenta']; ?>" 
                           placeholder="Introduzca la descripcion">
                    <p class="mensajeError"><?php echo $aErrores['descUsuario'] ?></p>
                </div>
            </li>
            <!--Campo Perfil OBLIGATORIO-->
            <li>
                <div>
                    <label for="Perfil"><p class="pDescripcion">Tipo de perfil</p></label>
                    <input name="Perfil" id="NumConexiones2" type="text" value="<?php echo $aUsuario['perfilMiCuenta'] ?>" readonly disabled>
                </div>
            </li>
            <!--Campo Numero Conexiones OBLIGATORIO-->
            <li>
                <div>
                    <label for="NumConexiones"><p class="pDescripcion">Numero Conexiones</p></label>
                    <input name="NumConexiones" id="NumConexiones2" type="text" value="<?php echo $aUsuario['conexionesMiCuenta'] ?>" readonly disabled>
                </div>
            </li>
            <!--Campo Fecha Ultima Conexion OBLIGATORIO-->
            <li>
                <div>
                    <label for="FechaHoraUltimaConexion"><p class="pDescripcion">Fecha Ultima Conexion</p></label>
                    <input name="FechaHoraUltimaConexion" id="FechaHoraUltimaConexion2" type="text" value="<?php echo date('d/m/Y H:i:s', $aUsuario['ultimaconexionMiCuenta']) ?>" readonly disabled>
                </div>
            </li>
            <!--Campo Password OBLIGATORIO-->
            <li>
                <div>
                    <label for="Password"><p class="pPassword">Password</p></label>
                    <input name="Password" id="Password2" type="password" value="<?php echo $aUsuario['passwordMiCuenta'] ?>" readonly disabled>
                </div>
            </li>
            <!--Campo Imagen-->
            <li>
                <div>
                    <label for='imagenUsuario'><p class="pPassword">Imagen de usuario</p></label>
                    <input name='imagenUsuario' id='imagenUsuario' type='file' value="imagenUsuario"/>
                    <?php
                    if ($aUsuario['imagenUsuario']) {
                        ?>
                        <img src="data:image/gif;base64, <?php echo $aUsuario['imagenUsuario'] ?>" alt="Imagen de usuario" class="imageperfil">
                        <?php
                    } else {
                        ?>
                        <img src="../207DWESAplicaccionFinalAlberto2022/webroot/css/img/perfilusuario/perfilusuario.png" alt="imagen de usuario" class="imageperfil"/>
                        <?php
                    }
                    ?>
                    <div class="error"><?php echo $aErrores['imagenUsuario'] ?></div>
                </div>
            </li>
            <!--Campo Boton Cambiar Password-->
            <li>
                <input type="submit" value="ACEPTAR" name="aceptar" class="aceptar"/>
                <input type="submit" value="CANCELAR" name="cancelar" class="cancelarperfil"/>
                <span class="linebreak">O</span>
                <input type="submit" value="CAMBIAR PASSWORD" name="cambiarpassword" class="cambiarpassword"/>
                <input type="submit" value="ELIMINAR USUARIO" name="eliminarcuenta" class="eliminarcuenta"/>
            </li>
        </ul>
    </fieldset>
</form>

