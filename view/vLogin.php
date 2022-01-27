<header class="tituloaplicacion">
    <p class="tituloh1"><img src="../207DWESAplicaccionFinalAlberto2022/webroot/css/img/logotipo.png" class="imagelogo" alt="IconoWebImitada" /></p><p class="tituloh2">Login</p>
</header>
<main>
    <form name="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form" id="formulariologin">
        <fieldset>
            <p class="tituloiniciarsesion">Iniciar sesión<p>
            <ul>
                <!--Campo Usuario OBLIGATORIO -->
                <li>
                    <div>
                        <label for="CodUsuario"><p class="pUsuario">Usuario*</p></label>
                        <input name="CodUsuario" id="CodUsuario" type="text" value="<?php echo isset($_REQUEST['CodUsuario']) ? $_REQUEST['CodUsuario'] : null; ?>">
                        <p class="mensajeError"><?php echo $aErrores['codUsuario'] ?></p>
                    </div>
                </li>
                <!--Campo Password OBLIGATORIO-->
                <li>
                    <div>
                        <label for="Password"><p class="pPassword">Password*</p></label>
                        <input name="Password" id="Password" type="password" value="<?php echo isset($_REQUEST['Password']) ? $_REQUEST['Password'] : null; ?>">
                        <p class="mensajeError"><?php echo $aErrores['password'] ?></p>
                    </div>
                </li>
                <!--Campo Botones Entrar y Volver y registrarse-->
                <li>
                    <input type="submit" value="ENTRAR" name="entrar" class="entrar"/>
                    <span class="linebreak">O</span>
                    <input type="submit" value="registrarse" name="registrarse" class="registrarse"/>
                    <input type="submit" value="VOLVER" name="volver" class="volver"/>
                </li>
            </ul>
        </fieldset>
    </form>
</main>