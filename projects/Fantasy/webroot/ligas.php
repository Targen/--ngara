<?php
        require_once 'include/config.php';
        require_once 'include/dbconn/user.php';
        require_once 'include/UIFacade.php';

        require 'include/pre.php';
?>
<h2>Mis ligas</h2>
<?php   foreach (UIFacade::ligas() as $l) { ?>
<div>
        <h3><a href="#"><?php echo $l['liga']->get('nombre'); ?></a></h3>
        <p><strong>Creador:</strong> <a href="#"><?php echo $l['usuario']->get('username'); ?></a></p>
        <form action="Datos_Eq.php" method="post">
                <input type="hidden" name="id" value="<?php echo $l['liga']->get('id'); ?>"/>
                <input type="submit" name=""   value="Invitar"  />
                <input type="submit" name=""   value="Modificar"/>
                <input type="submit" name=""   value="Eliminar" />
        </form>
</div>
<?php   } ?>
<h2><a href="ligas_publicas.php">Ver ligas públicas</a></h2>
<h2><a href="ligas_privadas.php">Ver ligas privadas</a></h2>
<form action="liga_publica_insert.php">
        <input name="" type="submit" value="Crear liga pública" />
</form>
<form action="liga_privada_insert.php">
        <input name="" type="submit" value="Crear liga privada" />
</form>
<?php   require 'include/post.html'; ?>
