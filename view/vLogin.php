<article class="titulopagina">
    <h2>Login</h2>
</article>
<main>
    <form name="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form" id="formulariologin">
        <fieldset>
            <p>Iniciar sesión<p>
            <ul>
                <!--Campo Usuario OBLIGATORIO -->
                <li>
                    <div>
                        <label for="CodUsuario"><strong>Usuario*</strong></label>
                        <input name="CodUsuario" id="CodUsuario" type="text" value="<?php echo isset($_REQUEST['CodUsuario']) ? $_REQUEST['CodUsuario'] : null; ?>">
                        <p class="mensajeError"><?php echo $aErrores['codUsuario'] ?></p>
                    </div>
                </li>
                <!--Campo Password OBLIGATORIO-->
                <li>
                    <div>
                        <label for="Password"><strong>Password*</strong></label>
                        <input name="Password" id="Password" type="password" value="<?php echo isset($_REQUEST['Password']) ? $_REQUEST['Password'] : null; ?>">
                        <p class="mensajeError"><?php echo $aErrores['password'] ?></p>
                    </div>
                </li>
                <!--Campo Botones Entrar y Volver y registrarse-->
                <li>
                    <input type="submit" value="ENTRAR" name="entrar" class="entrar"/>
                    <input type="submit" value="VOLVER" name="volver" class="volver"/>
                    <input type="submit" value="registrarse" name="registrarse" class="registrarse"/>
                </li>
            </ul>
        </fieldset>
    </form>
</main>