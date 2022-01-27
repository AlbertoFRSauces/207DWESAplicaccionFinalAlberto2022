<header class="tituloaplicacion">
    <p class="tituloh1"><img src="../207DWESAplicaccionFinalAlberto2022/webroot/css/img/logotipo.png" class="imagelogo" alt="IconoWebImitada" /></p><p class="tituloh2">Cambiar Password</p>
</header>
<form name="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="formCambiarPassword">
    <fieldset>
        <p class="tituloCambiarPassword">Cambiar Contraseña<p>
        <ul>
            <!--Campo Password Actual OBLIGATORIO-->
            <li>
                <div>
                    <label for="PasswordActual"><p class="pPassword">Password Actual*</p></label>
                    <input name="PasswordActual" id="PasswordActual" type="password" value="<?php echo isset($_REQUEST['PasswordActual']) ? $_REQUEST['PasswordActual'] : null; ?>" 
                           placeholder="Introduzca la password actual">
                    <p class="mensajeError"><?php echo $aErrores['passwordActual'] ?></p>
                </div>
            </li>
            <!--Campo Password Nueva OBLIGATORIO-->
            <li>
                <div>
                    <label for="PasswordNueva"><p class="pPassword">Nueva Password*</p></label>
                    <input name="PasswordNueva" id="PasswordNueva" type="password" value="<?php echo isset($_REQUEST['PasswordNueva']) ? $_REQUEST['PasswordNueva'] : null; ?>" 
                           placeholder="Introduzca la password nueva">
                    <p class="mensajeError"><?php echo $aErrores['passwordNueva'] ?></p>
                </div>
            </li>
            <!--Campo Password Nueva Repetir OBLIGATORIO-->
            <li>
                <div>
                    <label for="RepetirPasswordNueva"><p class="pPassword">Repetir Nueva Password*</p></label>
                    <input name="RepetirPasswordNueva" id="RepetirPasswordNueva" type="password" value="<?php echo isset($_REQUEST['RepetirPasswordNueva']) ? $_REQUEST['RepetirPasswordNueva'] : null; ?>" 
                           placeholder="Introduzca la password de nuevo">
                    <p class="mensajeError"><?php echo $aErrores['passwordRepetir'] ?></p>
                </div>
            </li>

            <!--Campo Botones Aceptar, Cancelar y Eliminar Cuenta-->
            <li>
                <input type="submit" value="ACEPTAR" name="aceptar" class="aceptar"/>
                <input type="submit" value="CANCELAR" name="cancelar" class="cancelarperfil"/>
            </li>
        </ul>
    </fieldset>
</form>

