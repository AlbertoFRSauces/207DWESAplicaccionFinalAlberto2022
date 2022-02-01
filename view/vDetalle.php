<header class="tituloaplicacion">
    <p class="tituloh1"><img src="../207DWESAplicaccionFinalAlberto2022/webroot/css/img/logotipo.png" class="imagelogo" alt="IconoWebImitada" /></p><p class="tituloh2">Detalle</p>
</header>
<!–– Muestra del contenido de la variable $_SESSION con foreach()––>
<?php if (!empty($_SESSION)) { ?>
    <h2 class="titulovariable">$_SESSION</h2>
    <table class="tablavariable"><tr><th class="cajas">Clave</th><th class="cajas">Valor</th></tr>
        <?php foreach ($_SESSION as $clave => $valor) { ?>
            <tr>
                <td><strong><?php echo $clave ?></strong></td>
                <td><pre><?php print_r($valor) ?></pre></td>
            </tr>
            <?php
        }
        ?>
    </table>
    <br>
    <?php
}
?>

<!–– Muestra del contenido de la variable $_COOKIE con foreach()––>
<?php if (!empty($_COOKIE)) { ?>
    <h2 class="titulovariable">$_COOKIE</h2>
    <table class="tablavariable"><tr><th class="cajas">Clave</th><th class="cajas">Valor</th></tr>
        <?php foreach ($_COOKIE as $clave => $valor) { ?>
            <tr>
                <td><strong><?php echo $clave ?></strong></td>
                <td><?php echo $valor ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
    <br>
    <?php
}
?>

<!–– Muestra del contenido de la variable $_SERVER con foreach()––>
<?php if (!empty($_SERVER)) { ?>
    <h2 class="titulovariable">$_SERVER</h2>
    <table class="tablavariable"><tr><th class="cajas">Clave</th><th class="cajas">Valor</th></tr>
        <?php foreach ($_SERVER as $clave => $valor) { ?>
            <tr>
                <td><strong><?php echo $clave ?></strong></td>
                <td><?php echo $valor ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
    <br>
    <?php
}
?>
<h2 class="titulovariable">PHPINFO</h2>
<div>
<?php
phpinfo();
?>
</div>
<form class="buttonback">
    <input type="submit" value="Volver" name="volver" class="volverdetalle"/>
</form>
