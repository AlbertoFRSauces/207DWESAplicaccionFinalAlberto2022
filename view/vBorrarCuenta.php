<header class="tituloaplicacion">
    <p class="tituloh1"><img src="../207DWESAplicaccionFinalAlberto2022/webroot/css/img/logotipo.png" class="imagelogo" alt="IconoWebImitada" /></p><p class="tituloh2">Borrar Cuenta</p>
</header>
<form name="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="formMiCuenta">
    <fieldset>
        <ul>
            <!--Campo Usuario OBLIGATORIO -->
            <li>
                <div>
                    <label for="CodUsuario"><p class="pUsuario">Usuario</p></label>
                    <input name="CodUsuario" id="CodUsuario2" type="text" value="<?php echo $usuarioMiCuenta ?>" readonly disabled>
                </div>
            </li>
            <!--Campo Descripcion OBLIGATORIO-->
            <li>
                <div>
                    <label for="DescUsuario"><p class="pDescripcion">Descripcion*</p></label>
                    <input name="DescUsuario" id="DescUsuario2" type="text" value="<?php echo $descripcionMiCuenta ?>" readonly disabled>
                </div>
            </li>
            <!--Campo Numero Conexiones OBLIGATORIO-->
            <li>
                <div>
                    <label for="NumConexiones"><p class="pDescripcion">Numero Conexiones</p></label>
                    <input name="NumConexiones" id="NumConexiones2" type="text" value="<?php echo $conexionesMiCuenta ?>" readonly disabled>
                </div>
            </li>
            <!--Campo Fecha Ultima Conexion OBLIGATORIO-->
            <li>
                <div>
                    <label for="FechaHoraUltimaConexion"><p class="pDescripcion">Fecha Ultima Conexion</p></label>
                    <input name="FechaHoraUltimaConexion" id="FechaHoraUltimaConexion2" type="text" value="<?php echo date('d/m/Y H:i:s', $ultimaconexionMiCuenta) ?>" readonly disabled>
                </div>
            </li>
            <!--Campo Password OBLIGATORIO-->
            <li>
                <div>
                    <label for="Password"><p class="pPassword">Password</p></label>
                    <input name="Password" id="Password2" type="password" value="<?php echo $passwordMiCuenta ?>" readonly disabled>
                </div>
            </li>
            <!--Campo Botones Aceptar, Cancelar y Eliminar Cuenta-->
            <p class="tituloMiCuentaEliminar">Estas seguro de que quieres eliminar tu cuenta?<p>
            <li>
                <input type="submit" value="ACEPTAR" name="aceptar" class="aceptar"/>
                <input type="submit" value="CANCELAR" name="cancelar" class="cancelarperfil"/>
            </li>
        </ul>
    </fieldset>
</form>

