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
                            <p>Ejemplos de codigos de moneda disponibles: EUR: Euro, USD: Dolar, FJD: Dólar fiyiano, FKP: Libra malvinense ,GBP: Libra esterlina, JPY: Yen, LBP: Libra libanesa, MXN: Peso Mexicano, GIP: Libra de Gibraltar, CZK: Corona Checa, CNY: Yuan Chino, UYU: Peso Uruguayo, etc...</p>
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
                <p class="pInformacion">Permite obtener el tiempo actual de la provincia. El formato del campo es una lista desplegable con las provincias en la cual hay que elegir una. La informacion se trata con codigos de provincia.</p>
            <ul>
                <!--Campo buscarInput OBLIGATORIO-->
                <li>
                    <div class="imageninformacion">
                        <label for="buscarInput"><p class="pProvincia">Código Provincia*<a href="https://www.el-tiempo.net/api" target="_blank"><img src="../207DWESAplicaccionFinalAlberto2022/webroot/css/img/i.png" class="imageinfo" alt="IconoInfo" title="Documentacion api el tiempo"/></a></p></label>
                        <select required name="buscarInput" id="CodProvincia">
                            <option value="">Elige Provincia</option>
                            <option value="01">Álava/Araba</option>
                            <option value="02">Albacete</option>
                            <option value="03">Alicante</option>
                            <option value="04">Almería</option>
                            <option value="33">Asturias</option>
                            <option value="05">Ávila</option>
                            <option value="06">Badajoz</option>
                            <option value="08">Barcelona</option>
                            <option value="09">Burgos</option>
                            <option value="48">Bizkaia</option>
                            <option value="10">Cáceres</option>
                            <option value="11">Cádiz</option>
                            <option value="12">Castellón</option>
                            <option value="39">Cantabria</option>
                            <option value="13">Ciudad Real</option>
                            <option value="14">Córdoba</option>
                            <option value="51">Ceuta</option>
                            <option value="16">Cuenca</option>
                            <option value="17">Gerona/Girona</option>
                            <option value="18">Granada</option>
                            <option value="19">Guadalajara</option>
                            <option value="20">Guipúzcoa/Gipuzkoa</option>
                            <option value="21">Huelva</option>
                            <option value="22">Huesca</option>
                            <option value="23">Jaén</option>
                            <option value="15">La Coruña/A Coruña</option>
                            <option value="26">La Rioja</option>
                            <option value="35">Las Palmas</option>
                            <option value="24">León</option>
                            <option value="25">Lérida/Lleida</option>
                            <option value="27">Lugo</option>
                            <option value="28">Madrid</option>
                            <option value="29">Málaga</option>
                            <option value="52">Melilla</option>
                            <option value="30">Murcia</option>
                            <option value="31">Navarra</option>
                            <option value="32">Orense/Ourense</option>
                            <option value="34">Palencia</option>
                            <option value="36">Pontevedra</option>
                            <option value="37">Salamanca</option>
                            <option value="40">Segovia</option>
                            <option value="41">Sevilla</option>
                            <option value="42">Soria</option>
                            <option value="43">Tarragona</option>
                            <option value="38">Tenerife</option>
                            <option value="44">Teruel</option>
                            <option value="45">Toledo</option>
                            <option value="46">Valencia</option>
                            <option value="47">Valladolid</option>
                            <option value="51">Vizcaya/Bizkaia</option>
                            <option value="49">Zamora</option>
                            <option value="50">Zaragoza</option>
                        </select>
                        <p class="mensajeErrorRest"><?php echo $aErroresTiempo['eBuscarInput'] ?></p>
                        <p class="mensajeErrorRest"><?php echo $aErroresTiempo['eResultado'] ?></p>
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
