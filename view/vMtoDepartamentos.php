<header class="tituloaplicacion">
    <p class="tituloh1"><img src="../207DWESAplicaccionFinalAlberto2022/webroot/css/img/logotipo.png" class="imagelogo" alt="IconoWebImitada" /></p><p class="tituloh2">Mto Departamentos</p>
</header>
<form class="buttonback">
    <input type="submit" value="VOLVER" name="volverdepartamentos" class="volverdetalle"/>
</form>
<div class="cajadepartamentos">
    <form name="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form">
        <fieldset class="fieldsetdepartamentos">
            <p class="titulometodepartamentos">  MtoDepartamentos 
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
            </ul>
        </fieldset>
    </form>
</div>
<div class="cajadepartamentos">
    <table class="tabladepartamentos">
        <?php
        if ($aErrores['descBuscarDepartamento'] == null){
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
        ?>
        <?php
        if ($aDepartamentosVista && $aErrores['descBuscarDepartamento'] == null) {
            foreach ($aDepartamentosVista as $aDepartamento) {
                ?>
                <tr>
                    <td><?php echo $aDepartamento['codDepartamento'];?></td>
                    <td><?php echo $aDepartamento['descDepartamento'];?></td>
                    <td><?php echo $aDepartamento['fechaAlta'];?></td>
                    <td><?php echo $aDepartamento['volumenNegocio'];?></td>
                    <td><?php echo $aDepartamento['fechaBaja'];?></td>
                    <td class="botonestabla">
                        <img src="../207DWESAplicaccionFinalAlberto2022/webroot/css/img/lapiz.png" class="imagenboton" alt="Lapiz" />
                        <img src="../207DWESAplicaccionFinalAlberto2022/webroot/css/img/ojo.png" class="imagenboton" alt="Ojo" />
                        <img src="../207DWESAplicaccionFinalAlberto2022/webroot/css/img/papelera.png" class="imagenboton" alt="Papelera" />
                    </td>
                </tr>
                <?php
            }
        }
        ?>
    </table>
</div>