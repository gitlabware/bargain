<?php //debug($datosProducto); ?>
<style>
    img{        
        max-height: 15%;
    }
</style>
<table class="table table-bordered">
  <tr>
    <th colspan="2" scope="row">Nombre</th>
    <td colspan="2"><?php echo $datosProducto['Producto']['nombre']; ?></td>
  </tr>
  <tr>
    <th colspan="2" scope="row">Resumen</th>
    <td colspan="2"><?php echo substr($datosProducto['Producto']['resumen'], 0, 80); ?>...</td>
  </tr>
  <tr>
    <th colspan="2" scope="row">Descripcion</th>
    <td colspan="2"><?php echo substr($datosProducto['Producto']['descripcion'], 0, 150); ?>...</td>
  </tr>
  <tr>
    <th scope="row">Precio</th>
    <td><?php echo $datosProducto['Producto']['precio']; ?> $us</td>
    <td>Estado</td>
    <td><?php echo $datosProducto['Producto']['estado']; ?></td>
  </tr>
  <tr>
    <th scope="row">Categoria</th>
    <td><?php echo $datosProducto['Categoria']['nombre']; ?></td>
    <td>Marca</td>
    <td><?php echo $datosProducto['Marca']['nombre']; ?></td>
  </tr>
</table>
<table class="table table-bordered">
    <tr>
        <?php foreach($imagenesProducto as $ip): ?>
        <td><img src="<?php echo $this->webroot; ?>files/img/<?php echo $ip['Imagene']['imagen']; ?>"></td>
        <?php endforeach; ?>
    </tr>
</table>