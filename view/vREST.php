<header class="tituloaplicacion">
    <p class="tituloh1"><img src="../207DWESAplicaccionFinalAlberto2022/webroot/css/img/logotipo.png" class="imagelogo" alt="IconoWebImitada" /></p><p class="tituloh2">REST</p>
</header>
<!--
<nav>
    <input type="checkbox" name="cMoneda" id="cMoneda" value="formularioconversor"/>
    <label for="cMoneda">Conversor Moneda</label><br/>
    <input type="checkbox" name="cProvincia" id="cProvincia" value="formularioprovincia"/>
    <label for="cProvincia">Tiempo provincia</label><br/>
    <input type="checkbox" name="cDepartamento" id="cDepartamento" value="formulariodepartamento"/>
    <label for="cDepartamento">Informacion Departamento</label><br/>
</nav>
-->
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
                    <select required name="miDivisa" id="CodDivisa">
                        <option value="">Elige Moneda</option>
                        <option value="EUR">Euro</option>
                        <option value="USD">Dolar</option>
                        <option value="FJD">Dólar fiyiano</option>
                        <option value="FKP">Libra malvinense</option>
                        <option value="GBP">Libra esterlina</option>
                        <option value="JPY">Yen</option>
                        <option value="LBP">Libra libanesa</option>
                        <option value="MXN">Peso Mexicano</option>
                        <option value="GIP">Libra de Gibraltar</option>
                        <option value="CZK">Corona Checa</option>
                        <option value="CNY">Yuan Chino</option>
                        <option value="UYU">Peso Uruguayo</option>
                        <option value="AED">Dírham</option>
                        <option value="AFN">Afgani</option>
                        <option value="ALL">Lek</option>
                        <option value="AMD">Dram armenio</option>
                        <option value="ANG">Florín antillano neerlandés</option>
                        <option value="AOA">Kwanza</option>
                        <option value="BSD">Dólar bahameño</option>
                        <option value="BTN">Ngultrum</option>
                        <option value="BWP">Pula</option>
                        <option value="COP">Peso colombiano</option>
                        <option value="CRC">Colón costarricense</option>
                        <option value="FJD">Dólar fiyiano</option>
                        <option value="FKP">Libra malvinense</option>
                        <option value="HKD">Dólar de Hong Kong</option>
                        <option value="HTG">Gourde</option>
                        <option value="ISK">Corona islandesa</option>
                        <option value="JMD">Dólar jamaiquino</option>
                        <option value="LSL">Loti</option>
                        <option value="LYD">Dinar libio</option>
                        <option value="MRU">Uguiya</option>
                        <option value="MUR">Rupia de Mauricio</option>
                        <option value="QAR">Rial catarí</option>
                        <option value="TRY">Lira turca</option>
                        <option value="UAH">Grivna</option>
                        <option value="VES">Bolívar soberano</option>
                    </select>
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
                    <select required name="otraDivisa" id="CodPasar">
                        <option value="">Elige Moneda</option>
                        <option value="EUR">Euro</option>
                        <option value="USD">Dolar</option>
                        <option value="FJD">Dólar fiyiano</option>
                        <option value="FKP">Libra malvinense</option>
                        <option value="GBP">Libra esterlina</option>
                        <option value="JPY">Yen</option>
                        <option value="LBP">Libra libanesa</option>
                        <option value="MXN">Peso Mexicano</option>
                        <option value="GIP">Libra de Gibraltar</option>
                        <option value="CZK">Corona Checa</option>
                        <option value="CNY">Yuan Chino</option>
                        <option value="UYU">Peso Uruguayo</option>
                        <option value="AED">Dírham</option>
                        <option value="AFN">Afgani</option>
                        <option value="ALL">Lek</option>
                        <option value="AMD">Dram armenio</option>
                        <option value="ANG">Florín antillano neerlandés</option>
                        <option value="AOA">Kwanza</option>
                        <option value="BSD">Dólar bahameño</option>
                        <option value="BTN">Ngultrum</option>
                        <option value="BWP">Pula</option>
                        <option value="COP">Peso colombiano</option>
                        <option value="CRC">Colón costarricense</option>
                        <option value="FJD">Dólar fiyiano</option>
                        <option value="FKP">Libra malvinense</option>
                        <option value="HKD">Dólar de Hong Kong</option>
                        <option value="HTG">Gourde</option>
                        <option value="ISK">Corona islandesa</option>
                        <option value="JMD">Dólar jamaiquino</option>
                        <option value="LSL">Loti</option>
                        <option value="LYD">Dinar libio</option>
                        <option value="MRU">Uguiya</option>
                        <option value="MUR">Rupia de Mauricio</option>
                        <option value="QAR">Rial catarí</option>
                        <option value="TRY">Lira turca</option>
                        <option value="UAH">Grivna</option>
                        <option value="VES">Bolívar soberano</option>
                    </select>
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
            <span class="tituloRest">Provincia:</span> <?php echo $nombreProvincia; //Devuelve el titulo de la provincia. ?>
        </p>
        <p class="mensajeRest">
            <span class="tituloRest">ID Provincia:</span> <?php echo $idProvincia; //Devuelve el id de la provincia. ?>
        </p>
        <p class="mensajeRest">
            <span class="tituloRest">Descripcion:</span> <?php echo $descripcionProvincia; //Devuelve la descripcion de la provincia. ?>
        </p>
        <p class="mensajeRest">
            <span class="tituloRest">Tiempo:</span> <?php echo $tiempoProvincia; //Devuelve el tiempo de la provincia. ?>
        </p>
        <p class="mensajeRest">
            <span class="tituloRest">Temperatura maxima:</span> <?php echo $temmaximaProvincia; //Devuelve la temperatura maxima de la provincia. ?> °C
            <br>
            <span class="tituloRest">Temperatura minima:</span> <?php echo $temminimaProvincia; //Devuelve la temperatura minima de la provincia. ?> °C
        </p>
    <?php } ?>
</div>
<form name="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form" id="formulariodepartamento">
    <fieldset>
        <p class="tituloiniciarsesion">Buscar Departamento Propio<p>
        <p class="pInformacion">Permite buscar la informacion de un departamento pasando un codigo de departamento. El formato del campo es un codigo de departamento. La informacion se trata con codigos de departamento.</p>
        <ul>
            <!--Campo buscarInput OBLIGATORIO-->
            <li>
                <div class="imageninformacion">
                    <label for="codDepartamento"><p class="pProvincia">Código Departamento*<input type="submit" value="i" name="infoapirest" class="botoninfoapi" /></p></label>
                    <input name="codDepartamento" id="CodDepartamento" type="text" value="<?php echo isset($_REQUEST['codDepartamento']) ? $_REQUEST['codDepartamento'] : null; ?>" placeholder="Codigo de Departamento">
                    <p class="mensajeErrorRest"><?php echo $aErroresDepartamento['eBuscarDepartamento'] ?></p>
                    <p class="mensajeErrorRest"><?php echo $aErroresDepartamento['eResultado'] ?></p>
                </div>
            </li>
            <!--Campo Boton BUSCAR-->
            <li>
                <input type="submit" value="BUSCAR" name="buscarDepartamento" class="buscarDepartamento"/>
            </li>
        </ul>
    </fieldset>
</form>
<div class="mostrarDepartamento">
    <?php if ($aErroresDepartamento["eBuscarDepartamento"] == null && $aErroresDepartamento["eResultado"] == null && isset($_REQUEST["buscarDepartamento"]) && $oResultadoDep != null) { //Compruebo  que los campos del array de errores están vacíos y el usuario le ha dado al botón de enviar.?>
        <p class="mensajeRest">    
            <span class="tituloRest">Codigo:</span> <?php echo $aDepartamento['codDepartamento']; //Devuelve el codigo del departamento. ?>
        </p>
        <p class="mensajeRest">
            <span class="tituloRest">Descripcion:</span> <?php echo $aDepartamento['descDepartamento']; //Devuelve la descripcion del departamento. ?>
        </p>
        <p class="mensajeRest">
            <span class="tituloRest">Fecha de creacion:</span> <?php echo date('d/m/Y H:i:s', $aDepartamento['fechaCreacionDepartamento']); //Devuelve la fecha de creacion del departamento. ?>
        </p>
        <p class="mensajeRest">
            <span class="tituloRest">Volumen de negocio:</span> <?php echo $aDepartamento['volumenDeNegocio']; //Devuelve el volumen de negocio del departamento. ?>
        </p>
        <p class="mensajeRest">
            <span class="tituloRest">Fecha de baja:</span> <?php echo date('d/m/Y H:i:s', $aDepartamento['fechaBajaDepartamento']); //Devuelve la fecha de baja del departamento. ?>
        </p>
    <?php } ?>
</div>




<form name="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form" id="formulariodepartamentoajeno">
    <fieldset>
        <p class="tituloiniciarsesion">Buscar Departamento Ajeno<p>
        <p class="pInformacion">Permite buscar la informacion de un departamento pasando un codigo de departamento. El formato del campo es un codigo de departamento. La informacion se trata con codigos de departamento.</p>
        <ul>
            <!--Campo buscarInput OBLIGATORIO-->
            <li>
                <div class="imageninformacion">
                    <label for="codDepartamentoAjeno"><p class="pProvincia">Código Departamento*</p></label>
                    <input name="codDepartamentoAjeno" id="CodDepartamento" type="text" value="<?php echo isset($_REQUEST['codDepartamentoAjeno']) ? $_REQUEST['codDepartamentoAjeno'] : null; ?>" placeholder="Codigo de Departamento">
                    <p class="mensajeErrorRest"><?php echo $aErroresDepartamentoAjeno['eBuscarDepartamento'] ?></p>
                    <p class="mensajeErrorRest"><?php echo $aErroresDepartamentoAjeno['eResultado'] ?></p>
                </div>
            </li>
            <!--Campo Boton BUSCAR-->
            <li>
                <input type="submit" value="BUSCAR" name="buscarDepartamentoAjeno" class="buscarDepartamento"/>
            </li>
        </ul>
    </fieldset>
</form>
<div class="mostrarDepartamento">
    <?php if ($aErroresDepartamentoAjeno["eBuscarDepartamento"] == null && $aErroresDepartamentoAjeno["eResultado"] == null && isset($_REQUEST["buscarDepartamentoAjeno"]) && $oResultadoDepAjeno != null) { //Compruebo  que los campos del array de errores están vacíos y el usuario le ha dado al botón de enviar.?>
        <p class="mensajeRest">    
            <span class="tituloRest">Codigo:</span> <?php echo $aDepartamentoAjeno['codDepartamento']; //Devuelve el codigo del departamento. ?>
        </p>
        <p class="mensajeRest">
            <span class="tituloRest">Descripcion:</span> <?php echo $aDepartamentoAjeno['descDepartamento']; //Devuelve la descripcion del departamento. ?>
        </p>
        <p class="mensajeRest">
            <span class="tituloRest">Fecha de creacion:</span> <?php echo date('d/m/Y H:i:s', $aDepartamentoAjeno['fechaCreacionDepartamento']); //Devuelve la fecha de creacion del departamento. ?>
        </p>
        <p class="mensajeRest">
            <span class="tituloRest">Volumen de negocio:</span> <?php echo $aDepartamentoAjeno['volumenDeNegocio']; //Devuelve el volumen de negocio del departamento. ?>
        </p>
        <p class="mensajeRest">
            <span class="tituloRest">Fecha de baja:</span> <?php echo date('d/m/Y H:i:s', $aDepartamentoAjeno['fechaBajaDepartamento']); //Devuelve la fecha de baja del departamento. ?>
        </p>
    <?php } ?>
</div>








<script>
    var verMoneda = document.getElementById("formularioconversor");
    var verProvincia = document.getElementById("formularioprovincia");
    var verDepartamento = document.getElementById("formulariodepartamento");
    var botonMoneda = document.getElementById("cMoneda");
    var botonProvincia = document.getElementById("cProvincia");
    var botonDepartamento = document.getElementById("cDepartamento");
    botonMoneda.addEventListener("change", function (evento) {
        if (this.checked) {
            verMoneda.style.display = "block";
            window.addEventListener("load", function (evento) {
                verMoneda.style.display = "block";
            });
        } else {
            verMoneda.style.display = "none";
        }
    });

    botonProvincia.addEventListener("change", function (evento) {
        if (this.checked) {
            verProvincia.style.display = "block";
        } else {
            verProvincia.style.display = "none";
        }
    });
    botonDepartamento.addEventListener("change", function (evento) {
        if (this.checked) {
            verDepartamento.style.display = "block";
        } else {
            verDepartamento.style.display = "none";
        }
    });
</script>
