<?php if ($yaEsta == 1): ?>
    <h2>Ya estas registrado con el correo : <?php echo $consultaCorreo['User']['email']; ?></h2>
    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo $this->Html->url(array('controller'=>'productos', 'action'=>'tienda')); ?>" class="btn large color2 pull-right" type="submit">Cerrar</a>
        </div>
    </div>
<?php else: ?>
    <h2>Gracias por registrarte <?php echo $datosUsuario['User']['email']; ?></h2>
    <h4>En breve te habilitamos para que puedas acceder a nuestro sitio</h4>
<?php endif; ?>
