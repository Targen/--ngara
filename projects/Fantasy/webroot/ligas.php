<?php
        require_once 'include/config.php';
        require_once 'include/dbconn/user.php';
        require_once 'include/UIFacade.php';

        require      'include/pre.php';
?>
<div id="contenido_interno">
        <div id="Layer1" style="width:580px; height:500px; overflow: scroll;">
                <h2>Ligas</h2>
<?php   foreach (UIFacade::ligas() as $l) { ?>
                <div class="alcanceLiga">
                        <form class="Fila" action="Datos_Eq.php" method="post" >
                                <input type="hidden" name="id" value="<?php echo $e->get('id'); ?>"/>
                                <div class="datos">
                                        <div>Nombre:  <?php echo $l['liga'   ]->get('nombre'         ); ?></div>
                                        <div>Creador: <?php echo $l['usuario']->get('nombre completo'); ?> (<?php echo $l['usuario']->get('username'); ?>)</div>
                                </div>
                        </form>
                </div>
<?php   } ?>
                <a href="crear_liga_privada.php">Crear liga privada</a>
        </div>
</div>
<?php require('include/post.html'); ?>
