<header class="tituloaplicacion">
    <p class="tituloh1"><img src="../207DWESAplicaccionFinalAlberto2022/webroot/css/img/logotipo.png" class="imagelogo" alt="IconoWebImitada" /></p><p class="tituloh2">Registro</p>
</header>
<main>
    <form name="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="formRegistro">
        <fieldset>
            <p class="tituloRegistros">Registro nuevo usuario<p>
            <ul>
                <!--Campo Usuario OBLIGATORIO -->
                <li>
                    <div>
                        <label for="CodUsuario"><p class="pUsuario">Usuario*</p></label>
                        <input name="CodUsuario" id="CodUsuarioReg" type="text" value="<?php echo isset($_REQUEST['CodUsuario']) ? $_REQUEST['CodUsuario'] : null; ?>" 
                               placeholder="Introduzca el nombre de usuario">
                        <p class="mensajeError"><?php echo $aErrores['codUsuario'] ?></p>
                    </div>
                </li>
                <!--Campo Descripcion OBLIGATORIO-->
                <li>
                    <div>
                        <label for="DescUsuario"><p class="pDescripcion">Descripcion*</p></label>
                        <input name="DescUsuario" id="DescUsuario" type="text" value="<?php echo isset($_REQUEST['DescUsuario']) ? $_REQUEST['DescUsuario'] : null; ?>" 
                               placeholder="Introduzca la descripcion">
                        <p class="mensajeError"><?php echo $aErrores['descUsuario'] ?></p>
                    </div>
                </li>
                <!--Campo Password OBLIGATORIO-->
                <li>
                    <div>
                        <label for="Password"><p class="pPassword">Password*</p></label>
                        <input name="Password" id="PasswordReg" type="password" value="<?php echo isset($_REQUEST['Password']) ? $_REQUEST['Password'] : null; ?>" 
                               placeholder="Introduzca la password">
                        <p class="mensajeError"><?php echo $aErrores['password'] ?></p>
                    </div>
                </li>
                <!--Campo Password Repetir OBLIGATORIO-->
                <li>
                    <div>
                        <label for="RepetirPassword"><p class="pPassword">Repetir Password*</p></label>
                        <input name="RepetirPassword" id="RepetirPassword" type="password" value="<?php echo isset($_REQUEST['RepetirPassword']) ? $_REQUEST['RepetirPassword'] : null; ?>" 
                               placeholder="Introduzca la password de nuevo">
                        <p class="mensajeError"><?php echo $aErrores['repetirPassword'] ?></p>
                    </div>
                </li>
                <!--Campo Botones Crear y Cancelar-->
                <li>
                    <input type="submit" value="crear" name="crear" class="crear"/>
                    <span class="linebreak">O</span>
                    <input type="submit" value="CANCELAR" name="cancelar" class="cancelar"/>
                </li>
            </ul>
        </fieldset>
    </form>
</main>

