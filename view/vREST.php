<header class="tituloaplicacion">
    <p class="tituloh1"><img src="../207DWESAplicaccionFinalAlberto2022/webroot/css/img/logotipo.png" class="imagelogo" alt="IconoWebImitada" /></p><p class="tituloh2">REST</p>
</header>
<form class="buttonback">
    <input type="submit" value="Volver" name="volver" class="volverdetalle"/>
</form>
<main>
    <form name="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form" id="formularioconversor">
        <fieldset>
            <p class="tituloiniciarsesion">Valor de Moneda<p>
            <ul>
                <!--Campo Usuario OBLIGATORIO -->
                <li>
                    <div>
                        <label for="MiDivisa"><p class="pDivisa">Divisa*<img src="../207DWESAplicaccionFinalAlberto2022/webroot/css/img/i.png" id="imageinfo" alt="IconoInfo" title="EUR, USD, JPY, GBP, AUD, CAD, CHF"/></p></label>
                        <input name="MiDivisa" id="CodDivisa" type="text" value="<?php echo isset($_REQUEST['MiDivisa']) ? $_REQUEST['MiDivisa'] : null; ?>" placeholder="Codigo de Moneda">
                        <p class="mensajeError"><?php echo $aErrores['miDivisa'] ?></p>
                    </div>
                </li>
                <!--Campo Importe Conversion-->
                <li>
                    <div>
                        <label for="Cantidad"><p class="pDivisa">Cantidad</p></label>
                        <input name="Cantidad" id="Cantidad" type="text" value="1" readonly disabled>
                    </div>
                </li>
                <!--Campo Password OBLIGATORIO-->
                <li>
                    <div>
                        <label for="OtraDivisa"><p class="pPasar">Pasar a*</p></label>
                        <input name="OtraDivisa" id="CodPasar" type="text" value="<?php echo isset($_REQUEST['OtraDivisa']) ? $_REQUEST['OtraDivisa'] : null; ?>" placeholder="Codigo de Moneda">
                        <p class="mensajeError"><?php echo $aErrores['otraDivisa'] ?></p>
                    </div>
                </li>
                <!--Campo Resultado Conversion-->
                <li>
                    <div>
                        <label for="Resultado"><p class="pPasar">Resultado</p></label>
                        <input name="Resultado" id="Resultado" type="text" value="<?php echo $fDevolucion ?>" readonly disabled>
                    </div>
                </li>
                <!--Campo Boton CONVERTIR-->
                <li>
                    <input type="submit" value="CONVERTIR" name="convertir" class="convertir"/>
                </li>
            </ul>
        </fieldset>
    </form>
</main>