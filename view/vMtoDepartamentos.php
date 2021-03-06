<header class="tituloaplicacion">
    <p class="tituloh1"><img src="../207DWESAplicaccionFinalAlberto2022/webroot/css/img/logotipo.png" class="imagelogo" alt="IconoWebImitada" /></p><p class="tituloh2">Mto Departamentos</p>
</header>
<form class="buttonback">
    <input type="submit" value="VOLVER" name="volverdepartamentos" class="volverdetalle"/>
</form>
<div class="cajadepartamentos">
    <form name="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="departamentosFormulario" class="form">
        <fieldset class="fieldsetdepartamentos">
            <p class="titulometodepartamentos">MtoDepartamentos 
                <input class="botonesdepartamentos" id="add" type="submit" name="add" value="Añadir"/>
                <input class="botonesdepartamentos" id="export" type="submit" name="export" value="Exportar"/>
                <input class="botonesdepartamentos" id="import" type="submit" name="import" value="Importar"/>
            </p>
            <ul>
                <!--Campo Alfabetico DescDepartamento OPCIONAL para realizar la busqueda-->
                <li>
                    <div>
                        <label for="descDepartamento"><a class="pBuscarDepartamento">Buscar por descripcion de departamento</a></label>
                        <input name="descDepartamento" id="descDepartamento" type="text" value="<?php echo $_SESSION['criterioBusquedaDepartamentos']['descripcionBuscada'] ?? ''; ?>" placeholder="Introduzca la descripcion">
                        <input id="buscar" type="submit" name="buscar" value="Buscar"/>
                        <p class="mensajeErrorDepartamento"><?php echo $aErrores['descBuscarDepartamento'] ?></p>
                    </div>
                </li>
                <!--Campo de tipo radio OBLIGATORIO para realizar un filtrado-->
                <li>
                    <div>
                        <a class="pBuscarDepartamento">Estado: </a>
                        <input name="estado" id="tipoDepartamentoTodos" type="radio" value="todos" <?php echo isset($_SESSION['criterioBusquedaDepartamentos']['estado']) ? ($_SESSION['criterioBusquedaDepartamentos']['estado'] == ESTADO_TODOS ? 'checked' : '') : 'checked'; ?>/>
                        <label for="tipoDepartamentoTodos"><a class="rFiltrarDepartamento">Todos</a></label>
                        <input name="estado" id="tipoDepartamentoAltas" type="radio" value="altas" <?php echo isset($_SESSION['criterioBusquedaDepartamentos']['estado']) ? ($_SESSION['criterioBusquedaDepartamentos']['estado'] == ESTADO_ALTAS ? 'checked' : '') : ''; ?> />
                        <label for="tipoDepartamentoAltas"><a class="rFiltrarDepartamento">Altas</a></label>
                        <input name="estado" id="tipoDepartamentoBajas" type="radio" value="bajas" <?php echo isset($_SESSION['criterioBusquedaDepartamentos']['estado']) ? ($_SESSION['criterioBusquedaDepartamentos']['estado'] == ESTADO_BAJAS ? 'checked' : '') : ''; ?> />
                        <label for="tipoDepartamentoBajas"><a class="rFiltrarDepartamento">Bajas</a></label>
                    </div>
                </li>
            </ul>
        </fieldset>
    </form>
</div>
<div class="cajadepartamentos">
    <table class="tabladepartamentos">
        <?php
        if ($aDepartamentosVista != null) {
            ?>
            <tr>
                <th>Código</th>
                <th>Descripción</th>
                <th>Fecha de alta</th>
                <th>Volumen de negocio</th>
                <th>Fecha de baja</th>
                <th>Acciones</th>
            </tr>
            <?php
        }
        if ($aDepartamentosVista) {
            foreach ($aDepartamentosVista as $aDepartamento) {
                ?>
                <tr>
                    <td><?php echo $aDepartamento['codDepartamento']; ?></td>
                    <td><?php echo $aDepartamento['descDepartamento']; ?></td>
                    <td><?php echo $aDepartamento['fechaAlta']; ?></td>
                    <td><?php echo $aDepartamento['volumenNegocio']; ?></td>
                    <td><?php echo $aDepartamento['fechaBaja']; ?></td>
                    <td class="botonestabla">
                        <button type="submit" form="departamentosFormulario" name="modificar" value="<?php echo $aDepartamento['codDepartamento']; ?>" class="modificardepartamento">
                            <img src="../207DWESAplicaccionFinalAlberto2022/webroot/css/img/lapiz.png" class="imagenboton" alt="Lapiz" />
                        </button>
                        <button type="submit" form="departamentosFormulario" name="dardebaja" value="<?php echo $aDepartamento['codDepartamento']; ?>" class="dardebajadepartamento">
                            <img src="../207DWESAplicaccionFinalAlberto2022/webroot/css/img/flechaabajo.png" class="imagenboton" alt="Dar de baja" />
                        </button>
                        <button type="submit" form="departamentosFormulario" name="eliminar" value="<?php echo $aDepartamento['codDepartamento']; ?>" class="eliminardepartamento">
                            <img src="../207DWESAplicaccionFinalAlberto2022/webroot/css/img/papelera.png" class="imagenboton" alt="Eliminar" />
                        </button>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
    </table>
</div>
<div class="cajadepartamentosdos">
    <button type="submit" form="departamentosFormulario" name="paginaPrimera" value="paginaPrimera" class="botonespaginado">
        <img src="../207DWESAplicaccionFinalAlberto2022/webroot/css/img/primerapagina.png" class="primerapagina" alt="primera página">
    </button>
    <button type="submit" form="departamentosFormulario" name="paginaAnterior" value="paginaAnterior" class="botonespaginado">
        <img src="../207DWESAplicaccionFinalAlberto2022/webroot/css/img/paginaanterior.png" class="primerapagina" alt="página anterior">
    </button>
    <div id="numPagina"><?php echo $_SESSION['numPaginacionDepartamentos'];?> / <?php echo ceil($iDepartamentosTotales);?></div>
    <button type="submit" form="departamentosFormulario" name="paginaSiguiente" value="paginaSiguiente" class="botonespaginado">
        <img src="../207DWESAplicaccionFinalAlberto2022/webroot/css/img/paginasiguiente.png" class="primerapagina" alt="página siguiente">
    </button>
    <button type="submit" form="departamentosFormulario" name="paginaUltima" value="paginaUltima" class="botonespaginado">
        <img src="../207DWESAplicaccionFinalAlberto2022/webroot/css/img/ultimapagina.png" class="primerapagina" alt="última página">
    </button>
</div>