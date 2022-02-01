<header class="tituloaplicacion">
    <p class="tituloh1"><img src="../207DWESAplicaccionFinalAlberto2022/webroot/css/img/logotipo.png" class="imagelogo" alt="IconoWebImitada" /></p><p class="tituloh2">REST</p>
</header>
<form class="buttonback">
    <input type="submit" value="Volver" name="volver" class="volverdetalle"/>
</form>
    <form name="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form" id="formularioconversor">
        <fieldset>
            <p class="tituloiniciarsesion">Valor de Moneda<p>
            
                <p class="pInformacion">Permite pasar la cantidad 1 de la divisa que le pases en el primer campo a otra divisa que le pases en el segundo campo. El formato del campo es con el codigo de la moneda, el cual esta formado por tres letras. Ejemplo: EUR a USD.</p>
            
                <ul>
                <!--Campo miDivisa OBLIGATORIO -->
                <li>
                    <div class="imageninformacion">
                        <label for="miDivisa"><p class="pDivisa">Divisa*<a href="https://www.exchangerate-api.com/docs/standard-requests" target="_blank"><img src="../207DWESAplicaccionFinalAlberto2022/webroot/css/img/i.png" class="imageinfo" alt="IconoInfo" title="Documentacion api conversor moneda"/></a></p></label>
                        <div class="vercomousar">
                            <p>Ejemplos de codigos de moneda disponibles: EUR: Euro, USD: Dolar, FJD: Dólar fiyiano, FKP: Libra malvinense ,GBP: Libra esterlina, JPY: Yen, LBP: Libra libanesa, MXN: Peso Mexicano, GIP: Libra de Gibraltar, CZK: Corona Checa, CNY: Yuan Chino, UYU: Peso Uruguayo, HUF: Forinto</p>
                        </div>
                        <input name="miDivisa" id="CodDivisa" type="text" value="<?php echo isset($_REQUEST['miDivisa']) ? $_REQUEST['miDivisa'] : null; ?>" placeholder="Codigo de Moneda">
                        <p class="mensajeErrorRest"><?php echo $aErrores['miDivisa'] ?></p>
                    </div>
                </li>
                <!--Campo Importe Conversion-->
                <li>
                    <div>
                        <label for="cantidad"><p class="pDivisa">Cantidad</p></label>
                        <input name="cantidad" id="Cantidad" type="text" value="1" readonly disabled>
                    </div>
                </li>
                <!--Campo otraDivisa OBLIGATORIO-->
                <li>
                    <div>
                        <label for="otraDivisa"><p class="pPasar">Pasar a*</p></label>
                        <input name="otraDivisa" id="CodPasar" type="text" value="<?php echo isset($_REQUEST['otraDivisa']) ? $_REQUEST['otraDivisa'] : null; ?>" placeholder="Codigo de Moneda">
                        <p class="mensajeErrorRest"><?php echo $aErrores['otraDivisa'] ?></p>
                    </div>
                </li>
                <!--Campo Resultado Conversion-->
                <li>
                    <div>
                        <label for="Resultado"><p class="pPasar">Resultado</p></label>
                        <input name="Resultado" id="Resultado" type="text" value="<?php echo $iDevolucion ?>" readonly disabled>
                    </div>
                </li>
                <!--Campo Boton CONVERTIR-->
                <li>
                    <input type="submit" value="CONVERTIR" name="convertir" class="convertir"/>
                </li>
            </ul>
        </fieldset>
    </form>
    <form name="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form" id="formularioprovincia">
        <fieldset>
            <p class="tituloiniciarsesion">Tiempo de provincia<p>
                <p class="pInformacion">Permite obtener el tiempo actual de la provincia. El formato del campo es con el codigo de la provincia, el cual esta formado por dos numeros. Ejemplo: 49.</p>
            <ul>
                <!--Campo buscarInput OBLIGATORIO-->
                <li>
                    <div class="imageninformacion">
                        <label for="buscarInput"><p class="pProvincia">Código Provincia*<a href="https://www.el-tiempo.net/api" target="_blank"><img src="../207DWESAplicaccionFinalAlberto2022/webroot/css/img/i.png" class="imageinfo" alt="IconoInfo" title="Documentacion api el tiempo"/></a></p></label>
                        <div class="vercomousar2">
                            <p>Ejemplos de codigos de provincia disponibles: 01: Álava, 02: Albacete, 03: Alicante, 04: Almería, 05: Ávila, 06: Badajoz, 07: Islas Baleares, 08: Barcelona, 09: Burgos, 10: Cáceres, 11: Cádiz</p>
                        </div>
                        <input name="buscarInput" id="CodProvincia" type="text" value="<?php echo isset($_REQUEST['buscarInput']) ? $_REQUEST['buscarInput'] : null; ?>" placeholder="Código de Provincia">
                        <p class="mensajeErrorRest"><?php echo $aErroresTiempo['eBuscarInput'] ?></p>
                    </div>
                </li>
                <!--Campo Boton BUSCAR-->
                <li>
                    <input type="submit" value="BUSCAR" name="buscar" class="buscar"/>
                </li>
            </ul>
        </fieldset>
    </form>
    <div class="mostrarTiempo">
        <?php if ($aErroresTiempo["eBuscarInput"] == null && isset($_REQUEST["buscar"]) && $oResultadoProv != null) { //Compruebo  que los campos del array de errores están vacíos y el usuario le ha dado al botón de enviar.?>
            <p class="mensajeRest">    
                <span class="tituloRest">Provincia:</span> <?php echo $nombreProvincia; //Devuelve el titulo de la provincia.?>
            </p>
            <p class="mensajeRest">
                <span class="tituloRest">ID Provincia:</span> <?php echo $idProvincia; //Devuelve el id de la provincia.?>
            </p>
            <p class="mensajeRest">
                <span class="tituloRest">Descripcion:</span> <?php echo $descripcionProvincia; //Devuelve la descripcion de la provincia.?>
            </p>
            <p class="mensajeRest">
                <span class="tituloRest">Tiempo:</span> <?php echo $tiempoProvincia; //Devuelve el tiempo de la provincia.?>
            </p>
            <p class="mensajeRest">
                <span class="tituloRest">Temperatura maxima:</span> <?php echo $temmaximaProvincia; //Devuelve la temperatura maxima de la provincia.?> °C
                <br>
                <span class="tituloRest">Temperatura minima:</span> <?php echo $temminimaProvincia; //Devuelve la temperatura minima de la provincia.?> °C
            </p>
        <?php } ?>
    </div>
